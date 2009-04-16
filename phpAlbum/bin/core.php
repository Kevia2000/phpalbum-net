<?php 
if(!defined("PHPALBUM_APP")){
	die("Direct access not permitted!");
}

//global variables
$pa_setup=Array();
$pa_quality=Array();
$pa_theme=Array();
$pa_lang=Array();
$pa_color_map=Array();
$pa_colors=Array();
$pa_keywords=Array();
$act_dir_sorting="default";
/*   header buffering   */
$pa_errors=Array();


require("bin/phptemplate/engine.php");
require("bin/phpdatabase.php");
require("bin/xml2array.php");
require("bin/cache.php");
require("bin/viewer.php");
require("bin/interact.php");
require("bin/fulltext.php");
require("bin/photonotes.php");
require("bin/utils.php");

function pa_initialize(){
	// changing umask due to security reasons.
	@umask(0077);
	// set time limit to unlimited if possible
	@set_time_limit(0);
	set_error_handler("pa_error_handler");
	return true;
}

function pa_start_database(){
	global $data_dir,$init_album_dir,$init_cache_dir,$init_ftp_server,$init_ftp_photos_dir;
	if(!is_dir($data_dir)){
		pa_put_error("Your data directory does not exists. <br/>Please check your config.php and correct the setting.");
		return false;
	}
	if(!pa_check_writable($data_dir)){
		pa_put_error("Your data directory is not writable for phpAlbum. <br/>Please change access rights so phpAlbum can create files in it.");
		return false;		
	}
	if(!db_startup_database("album",$data_dir)){
		if(!db_create_database("album",$data_dir)){
			pa_put_error("Unable to create Database, check if your data directory exists and is writable!");
		}
		require "install_db.php";
	}
	db_set_auto_commit(false);
	$pa_db_version=db_select_all("phpalbum_version");
	if(isset($pa_db_version[0]) && $pa_db_version[0]["version"]!=$phpalbum_version){
		require "upgrade_db.php";
	}
	return true;
}

function pa_get_parameters(){
	global $_GET,$_POST,$_COOKIE;
	global $cmd,$var1,$var2,$var3,$var4;
	global $pa_original_keywords,$pa_keywords_unsorted,$pa_keywords;
	
	$allowed_cmds=Array("album","search","phpinfo","thmb","imageorig","image","imageview",
						"ecardview","imageviewsearch","setup","delcache","logo","theme","themeimage",
						"antispampic","system_check","setquality","photonotes");
	
	if (!get_magic_quotes_gpc()) {
		//doing magic quotes manually, some servers does not have this setting
		foreach($_GET as $key=>$value){
			$_GET[$key]=addslashes($value);
		}
		foreach($_POST as $key=>$value){
			$_POST[$key]=addslashes($value);
		}
		foreach($_COOKIE as $key=>$value){
			$_COOKIE[$key]=addslashes($value);
		}
	
	}
	
	if(isset($_GET['cmd'])){
		$cmd=$_GET['cmd'];
	}
	if(isset($_GET['keyword'])){
		$pa_original_keywords=$_GET['keyword'];
	}
	if(isset($_GET['var1'])){
		$var1=stripslashes($_GET['var1']);
	}
	if(isset($_GET['var2'])){
		$var2=stripslashes($_GET['var2']);
	}
	if(isset($_GET['var3'])){
		$var3=stripslashes($_GET['var3']);
	}
	if(isset($_GET['var4'])){
		$var4=stripslashes($_GET['var4']);
	}
	
	
	if(isset($_POST['cmd'])){
		$cmd=$_POST['cmd'];
	}
	if(isset($_POST['keyword'])){
		$pa_original_keywords=$_POST['keyword'];
	}
	if(isset($_POST['var1'])){
		$var1=$_POST['var1'];
	}
	if(isset($_POST['var2'])){
		$var2=$_POST['var2'];
	}
	if(isset($_POST['var3'])){
		$var3=$_POST['var3'];
	}
	if(isset($_POST['var4'])){
		$var4=$_POST['var4'];
	}

	$pa_keywords=explode(" ",strtolower($_GET['keyword']));
	foreach($pa_keywords as $key=>$value){
		if(strlen(trim($value))==0){
				unset($pa_keywords[$key]);
		}
	}
	$pa_keywords_unsorted=$pa_keywords;
	sort($pa_keywords);
	
	if(!array_search($cmd,$allowed_cmds)){
		$cmd="album";
	}
}

function pa_execute_command(){
	global $cmd,$pa_grants,$pa_setup,$var1,$var2,$var3,$var4;
	
	if($cmd=="phpinfo"){
		if(isset($pa_grants["main"])){
			phpinfo();
		}else{
			theme_generate_error_page();
		}
	}else if($cmd=="album"){
			pa_write_log();
	        $cache_this_doc=generate_album($var1,$var3);	
	}else if($cmd=="search"){
		pa_write_log();
	        $cache_this_doc=generate_search($var1,$var3);	
	}else if($cmd=="thmb"){
	        generate_thumb($var1,$var3);	
	}else if($cmd=="image"){
			if(is_movie($var1) || is_audio($var1)){
				pa_write_log();
			}
	        $cache_this_doc=generate_image($var1,$quality);/* original photos, videos and audios should not be cached.*/
	}else if($cmd=="imageorig"){
		if(isset($pa_grants["imageorig"])){
			pa_write_log();
	        $cache_this_doc=generate_image($var1,$quality,true);/* original photos, videos and audios should not be cached.*/
		}else{
			theme_generate_error_page();
		}
	}else if($cmd=="imageview"){
		if(isset($pa_grants["imageview"])){
			pa_write_log();
			if(file_exists($pa_setup["album_dir"].$var1)){
				generate_image_view($var1,$quality,$var3);	
			}else{
				theme_generate_error_page();
			}
		}else{
			theme_generate_error_page();
		}
	}else if($cmd=="ecardview"){
		if(isset($pa_grants["imageview"])){
			pa_write_log();
			generate_ecard_view($var1);
		}else{
			theme_generate_error_page();
		}
	}else if($cmd=="imageviewsearch"){
		if(isset($pa_grants["imageview"])){
			pa_write_log();
	        generate_image_view($var1,$quality,$var3,true);	
		}else{
			theme_generate_error_page();
		}
	}else if($cmd=="setup"){
			require("bin/setup.php");
	        generate_setup_page();
	}else if($cmd=="system_check"){
	        generate_system_check();
	}else if($cmd=="delcache"){
	        delete_cache($pa_setup["cache_dir"]);
	        echo "Cache Deleted!";
	}else if($cmd=="theme"){
		generate_theme($var1);
	}else if($cmd=="logo"){
		theme_generate_logo();
	}else if($cmd=="antispampic"){
		header("Content-type: image/jpeg");
		pa_readfile($pa_setup["cache_dir"]."cp".$var1.".jpg");
		@unlink($pa_setup["cache_dir"]."cp".$var1.".jpg");
	}else if($cmd=="themeimage"){
		if(!isset($var3)){$var3=100;}//no scaling if not defined
		$cache_this_doc=theme_generate_theme_image($var1,$var2,$var3);
	}else if($cmd=="photonotes"){
		pa_apply_photonotes();
	}else if($cmd=="error"){
		theme_generate_error_page();
	}else{
		theme_generate_error_page();	
	}
}

function pa_terminate_with_errors(){
	global $pa_errors;
	echo "<html><body><table width=\"100%\"><tr><td align=center><table style=\"background-color:#FFCCCC;border: 2px solid black;\">";
	foreach($pa_errors as $err){
		echo "<tr><td><b><h3>".$err."</h3></b></td></tr>";
	}
	echo "</table></td></tr></table></body></html>";
}
function pa_put_error($err){
	global $pa_errors;
	$pa_errors[]=$err;
}

function pa_check_writable($dir){
     $file=fopen($dir."writablity_test","w");
     fclose($file);
     return $file;
}

function pa_error_handler($errno, $errmsg, $filename, $linenum, $vars)
{
   global $data_dir,$pa_setup;
   // timestamp for the error entry
   if(isset($pa_setup['error_logging_enabled'])){
   	if($pa_setup['error_logging_enabled']=="true"){
   		$dt = date("y/m/d H:i:s");

	   // define an assoc array of error string
	   // in reality the only entries we should
	   // consider are E_WARNING, E_NOTICE, E_USER_ERROR,
	   // E_USER_WARNING and E_USER_NOTICE
	   $errortype = array (
	               E_ERROR          => "Error",
	               E_WARNING        => "Warning",
	               E_PARSE          => "Parsing Error",
	               E_NOTICE          => "Notice",
	               E_CORE_ERROR      => "Core Error",
	               E_CORE_WARNING    => "Core Warning",
	               E_COMPILE_ERROR  => "Compile Error",
	               E_COMPILE_WARNING => "Compile Warning",
	               E_USER_ERROR      => "User Error",
	               E_USER_WARNING    => "User Warning",
	               E_USER_NOTICE    => "User Notice"
	               );
	   // set of errors for which a var trace will be saved
	   //$user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);
	   if($errno==E_NOTICE){
	   	return;
	   }
	   if(defined("E_STRICT")){
		   if($errno==E_STRICT){
		   	return;
		   }
	   }
	   $err = "\$phpalbum_Errors[]= Array(\"datetime\" => \"$dt\",";
	   $err .= "\"errornum\" => \"$errno\",";
	   $err .= "\"errortype\" => \"".$errortype[$errno]."\",";
	   $err .= "\"errormsg\" => \"$errmsg\",";
	   $err .= "\"scriptname\" => \"$filename\",";
	   $err .= "\"scriptlinenum\" => \"$linenum\"";
	   $err .= ");";
	   if(file_exists($data_dir."error.log")){
		   if(filesize($data_dir."error.log")>1024*1024*2){
		   		unlink($data_dir."error.log");
		   }
	   }
	   if(substr($errmsg,0,6)!="unlink"){
		   //ignore unlink errors - not important as it can happen
		   $ff=fopen($data_dir."error.log","a");
		   fwrite($ff,"<?php  ".$err." ?>\n");
		   fclose($ff);
	   }
	}
 }
}

function pa_read_settings(){
	global $pa_setup,$pa_theme,$pa_color_map,$pa_lang,$pa_colors;
	global $cmd,$pa_setup_texts,$mbstring;
	$rec=db_select_all("setup");
	$pa_setup=$rec[0];
	$rec=db_select_all("theme","name=='".$pa_setup["site_theme"]."'");
	if(count($rec)==0){
		//used new theme, never used before
		echo "error #001<br>";
	}
	$pa_theme=$rec[0];
	$rec=db_select_all("color_map","id==".$pa_theme["color_map"]);
	$pa_color_map=$rec[0];
	$pa_colors=$pa_color_map["colors"];
	require_once("language.php");
	pa_load_language($cmd);
}

function pa_check_cookies(){
	global $cmd,$var1,$var2,$var3,$var4,$userid,$userpassword,$pa_quality;
	if($cmd=="setquality"){
		if(!($rec=db_select_all("quality","id=='$var1'"))){
			//setted quality not found
			$rec=db_select_all("quality","default=='true'");
		}
			$pa_quality=$rec[0];
		setcookie("phpAlbum_quality",$pa_quality["id"],time()+60*60*24*365);
		$cmd=$var2;$var1=$var3;$var2="";$var3="";
		if(isset($var3)){ $var2=$var3;}
		if(isset($var4)){ $var3=$var4;}
	}else{
		if(isset($_COOKIE["phpAlbum_quality"])){
			if(!($rec=db_select_all("quality","id=='".$_COOKIE["phpAlbum_quality"]."'"))){
				//setted quality not found
				$rec=db_select_all("quality","default=='true'");
			}
		}else{
			$rec=db_select_all("quality","default=='true'");
		}
		$pa_quality=$rec[0];
	}
	//remove leading slashes
	while(substr($var1,0,1)=="/"){
		$var1=substr($var1,1);
	}

	//remove slashes on the end of var1
	while(substr($var1,-1)=="/"){
		$var1=substr($var1,0,-1);
	}
	
	if(strstr($var1,"..") || strstr($var1,"//")){
	  $var1="";
	  $var2="";
	  $var3="";
	  $cmd="error"; //will generate error page
	}
	if(isset($_GET["logout"])){
				setcookie("userid","",time()-60*60*24*365);
				setcookie("userpassword","",time()-60*60*24*365);
		
	}else{
		if(isset($_COOKIE['userid'])){
			$userid=$_COOKIE['userid'];
		}
		if(isset($_COOKIE['userpassword'])){
			$userpassword=$_COOKIE['userpassword'];
		}
	}
}

function pa_update_view_stats(){
	global $var1,$cmd;
	if($cmd=="image"){
		if(isset($_COOKIE['last_viewed_image'])){
			$last_viewed=$_COOKIE['last_viewed_image'];
		}else{
			$last_viewed="";
		}
		
		if($last_viewed!=$var1){
			 update_stats("imageview",$var1,"view");
			 setcookie("last_viewed_image",$var1);
		}
	}
}

function pa_check_username(){
	global $userid,$username,$userpassword,$pa_user,$comment_name,$comment_email;

	if(isset($_POST["p_username"])){
		$username=$_POST["p_username"];
		$userpassword=md5($_POST["p_userpassword"]);
		$rec=db_select_all("user","name=='".$username."' && password=='".$userpassword."'");
		if(isset($rec[0])){
			$pa_user=$rec[0];
			if(!isset($_POST["p_storepassword"])){
				setcookie("userid",$pa_user["id"]);
				setcookie("userpassword",$userpassword);
			}else{
				setcookie("userid",$pa_user["id"],time()+60*60*24*365);
				setcookie("userpassword",$userpassword,time()+60*60*24*365);
			}
		}else{
			$pa_user=Array("name"=>"guest","groups"=>Array("guest"=>"1"));
		}
	}else{
		$rec=db_select_all("user","id=='".$userid."' && password=='".$userpassword."'");
		if(isset($rec[0])){
			$pa_user=$rec[0];
			$comment_name=$pa_user["name"];
			$comment_email=$pa_user["email"];
		}else{
			$pa_user=Array("name"=>"guest","groups"=>Array("guest"=>"1"));
			$comment_name=$_COOKIE["comment_name"];
			$comment_email=$_COOKIE["comment_email"];
		}
	}
}

function pa_check_access(){
	global $cmd,$var1,$var2,$var3,$var4,$pa_dir_settings,$pa_grants,$pa_user;
	$where="";
	foreach($pa_user["groups"] as $key => $value){
		if($where ==""){
			$where = $where . "name=='".$key."'";
		}else{
			$where = $where . " || name=='".$key."'";
		}
	}
	$rec=db_select_all("group",$where);
	$pa_grants=Array();
	if(is_array($rec)){
	 foreach($rec as $record){
		if(is_array($record["grants"])){
			$pa_grants =array_merge($pa_grants,$record["grants"]);
		}
	 }
	}
	if(isset($pa_user["groups"]["superuser"])){
		return; // no security check, everything is visible for superusers
	}
	/*security check, either if it is disabled for actual user or it is not visible.*/
	/*if accessed trough direct link it will be redirected to show the root directory*/
	if($cmd=="album"){
		$pa_dir_settings = get_directory_settings($var1,0);
		if(!check_access_to_dir($var1) || $pa_dir_settings[0]["visibility"]=="false"){
	  		$var1=""; // show the root directory.
	  		$var2="";
	  		$var3="";
	  		$cmd="album";
	  		if(!check_access_to_dir($var1)){
	  			$cmd="error";
	  		}
	  		
		}
	}else if($cmd=="imageview" || $cmd=="thmb" || $cmd=="image"){
		$pa_dir_settings = get_directory_settings(dirname($var1),0);
		if(!check_access_to_dir(dirname($var1)) || $pa_dir_settings[0]["visibility"]=="false"){
	  		$var1=""; // show the root directory.
	  		$var2="";
	  		$var3="";
	  		$cmd="album";
	  		if(!check_access_to_dir($var1)){
	  			$cmd="error";
	  		}
		}
	}
	
	if($cmd=="photonotes" && !isset($pa_grants["photonotes"])){
		$cmd="error";
	}
}

function pa_clean_up_and_scan_dir(){
	//TODO: make the interval configurable in setup	
	if($pa_setup["last_dir_scan"]<time()-24*60*60 && is_dir($pa_setup["album_dir"])){
		scan_photos_directories("");
		delete_old_ecards();
		delete_old_anitspam();
	}
}
function pa_write_debug($msg){
	global $pa_setup,$cmd,$var1,$passwd,$pa_user;
	$file_log=fopen($pa_setup["cache_dir"].$pa_setup["logs_filename"],"a");
	  	fwrite($file_log,date("D.M.j G:i:s")."|DEBUG|".$msg."|".$pa_user["name"]."|".$host."|\n");
	  	fclose($file_log);
}
function pa_write_log(){
global $pa_setup,$cmd,$var1,$passwd,$pa_user;
	if($pa_setup["logs_enabled"]=="true"){
	  $strings=explode(";",$pa_setup["logs_exclude"]);
	  $found="false";
	  $host=gethostbyaddr($_SERVER['REMOTE_ADDR']);
	  foreach($strings as $num=>$string){
	  	if(strlen($string)>0)
	  		if(strstr($host,$string))$found="true";
	  }
	  if($found=="false"){
	  	$file_log=fopen($pa_setup["cache_dir"].$pa_setup["logs_filename"],"a");
	  	fwrite($file_log,date("D.M.j G:i:s")."|".$cmd."|".$var1."|".$pa_user["name"]."|".$host."|\n");
	  	fclose($file_log);
	  }
	}
}


?>