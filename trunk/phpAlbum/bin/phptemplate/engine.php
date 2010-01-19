<?php 
/*checking for security reasons*/
	if(!defined("PHPALBUM_APP")){
		die("Direct access not permitted!");
}

/****************************************/
/* (c) 2007 Patrik Jakab                */
/*    phpAlbum.net                      */
/*Licence info: GNU/GPL                 */
/****************************************/


$theme_colors=Array();
$themes_dir="themes/";

function theme_get_theme_cfg_xml($file){
		$config=Array();
		$config["color_map"]=Array();
		$config["parameter"]=Array();
		$config["theme_setting"]=Array();
		$xml_text=file_get_contents($file);
		$xml=pa_xml2array($xml_text);
		
		$config["name"]=$xml["theme"][0]["name"][0]["#PCDATA"];
		
		foreach($xml["theme"][0]["parameter"] as $key => $val){
			$par_name=$val["name"][0]["#PCDATA"];
			$config["parameter"][$par_name]["desc"]=$val["description"][0]["#PCDATA"];			
			$config["parameter"][$par_name]["help"]=$val["help"][0]["#PCDATA"];			
			$config["parameter"][$par_name]["type"]=$val["attr"]["type"];			
			$config["parameter"][$par_name]["default"]=$val["default"][0]["#PCDATA"];			
			$config["parameter"][$par_name]["desc"]=$val["description"][0]["#PCDATA"];
			
			if($config["parameter"][$par_name]["type"] == "checkbox" ){
				$config["parameter"][$par_name]["checked"]=$val["checked"][0]["#PCDATA"];
				$config["parameter"][$par_name]["unchecked"]=$val["unchecked"][0]["#PCDATA"];
			}
			
			if($config["parameter"][$par_name]["type"] == "text"){
				$config["parameter"][$par_name]["length"]=$val["length"][0]["#PCDATA"];
			}
			
			if($config["parameter"][$par_name]["type"] == "combobox" ){
				foreach($val["option"] as $opt_key => $opt_val){
					$config["parameter"][$par_name]["list"][]=Array("value"=>$opt_val["attr"]["value"],"desc"=>$opt_val["#PCDATA"]);
				}
			}

		}
		foreach($xml["theme"][0]["colormap"] as $key => $val){
			$cmap=Array();
			$cmap["name"]=$val["attr"]["name"];
			foreach($val["color"] as $col_key => $col_val){
				$cmap["colors"][$col_val["attr"]["name"]]=$col_val["#PCDATA"];
			}
			$config["color_map"][]=$cmap;
		}
		//TODO: Theme settings changing with config file.
		foreach($config["parameter"] as $key =>$value){
		  if($value["type"]=="color"){
			foreach($config["color_map"] as $k =>$v){
				if(!isset($config["color_map"][$key])){
					$config["color_map"][$k]["colors"][$key]=$value["default"];
				}
			}
		  }
		}
	return $config;
		
}

function theme_load_themes(){
	global $themes_dir;
	echo $themes_dir;
    if (is_dir($themes_dir)){
	  if ($dh = opendir($themes_dir)){
        while (($file = readdir($dh)) !== false) {
            if( filetype($themes_dir.$file)=="dir" && $file!="." && $file !=".." && $file!="engines") {
				if ( file_exists($themes_dir.$file."/theme.xml")){
					echo $themes_dir.$file."/theme.xml<br>";
					$cfg=theme_get_theme_cfg_xml($themes_dir.$file."/theme.xml");
					if ( !db_select_exists("theme","name=='".$cfg["name"]."'") ){
						//theme is new, we should do some inserts
						//create color maps
						$theme_cmap=0;
						foreach($cfg["color_map"] as $key =>$value){
							$id=db_get_seq_nextval("color_map_id");
							if($theme_cmap==0){$theme_cmap=$id;}
							db_insert("color_map",Array("id"=>$id,"theme"=>$cfg["name"],"name"=>$value["name"],"colors"=>$value["colors"]));
						}
						//create theme:
						//prepare custom_parameters
						$cust_par=Array();
						foreach($cfg["parameter"] as $key =>$value){
							if($value["type"]!="color"){
								$cust_par[$key]=$value["default"];
							}
						}
						//insert theme
						$theme=Array("color_map"=>$theme_cmap,"name"=>$cfg["name"],"custom_parameters"=>$cust_par,"theme_path"=>$themes_dir.$file."/");
						foreach($cfg["theme_setting"] as $key => $value){
							$theme[$key]=$value;
						}
						db_insert("theme",$theme);
					}
				}
		    }
        }
       closedir($dh);
    }
}
}

function theme_get_theme_name(){
	global $pa_theme;
	return $pa_theme["name"];
}

function hexrgb ($hexstr)
{
  $int = hexdec("0x".$hexstr);

  return array(0xFF & ($int >> 0x10),0xFF & ($int >> 0x8),0xFF & $int);
}

function rgbhex($rgb){
	return str_pad ( dechex($rgb[0]),'0', STR_PAD_LEFT) . str_pad ( dechex($rgb[1]),'1', STR_PAD_LEFT). str_pad ( dechex($rgb[2]),'0', STR_PAD_LEFT);
}
function theme_get_style_css_link(){
	global $themes_dir,$pa_theme,$pa_color_map,$pa_setup,$pa_quality;
	$string=$themes_dir."::".var_export($pa_theme,true)."::".var_export($pa_color_map,true)."::".var_export($pa_quality,true);
	$hash=md5($string);
	return "main.php?cmd=theme&var1=style_css&var2=".$hash.".css";
}
function theme_get_style_css(){
	global $themes_dir,$pa_theme,$pa_color_map,$pa_setup,$pa_quality;
	header('Content-type: text/css');
	pa_send_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
	pa_send_header("Expires: " . gmdate("D, d M Y H:i:s",time()+86400) . " GMT" );
	if(file_exists($pa_theme["theme_path"]."default.css")){
		$file=file($pa_theme["theme_path"]."default.css" );
	}else{
		$file=file($themes_dir."engines/phptemplate/default.css" );
	}
	
	foreach ($file as $num=>$line){
		$text=$line;
		foreach($pa_color_map["colors"] as $name =>$value){
			$text=str_replace("<".$name.">","#".$value,$text);
			$text=str_replace("[".$name."]",$value,$text);

		}
		$text=str_replace("<thmb_border_width>",$pa_theme["thumbnail_border_size"]."px",$text);
		$text=str_replace("<picture_border_width>",$pa_theme["picture_border_size"]."px",$text);
		echo $text;
	}

}
function theme_get_logo(){
	//TODO: change generating of the linkt to the logo. It should point to the homepage link.
	global $pa_theme,$pa_setup;
	if($pa_theme["logo_style"]=="text"){
		return "<a class=\"logo\" href=\"main.php?cmd=album\">".$pa_theme["logo_text"]."</a>";
	}else if($pa_theme["logo_style"]=="graphical" || $pa_theme["logo_style"]=="file"){
		return "<a href=\"main.php?cmd=album\"><img src=\"main.php?cmd=logo&var1=".$pa_theme["logo_text"]."&var2=".theme_get_id().$pa_color_map["colors"]["logo_color"].$pa_theme["logo_path"]."_".$pa_theme["logo_style"]."\" border=\"0\"></a>";
	}
}
function theme_get_styles(){
	$rec=db_select_all("color_map");
	foreach($rec as $record){
		$styles[]=$record["name"];
	}
	return $styles;
}
function theme_get_logo_styles(){
	$styles[]="none";
	$styles[]="graphical";
	$styles[]="text";
	$styles[]="file";
	return $styles;
}
function theme_get_id(){
	global $pa_colors;
	return theme_get_theme_name().$pa_colors["bg_color"];
}
function theme_get_bgcolor(){
	global $pa_colors;
	return hexrgb($pa_colors["bg_color"]);
}
function theme_get_web_bgcolor(){
	global $pa_colors;
	return $pa_colors["bg_color"];
}
function theme_generate_logo(){
global $pa_theme,$pa_setup,$pa_color_map,$pa_colors;

  	pa_send_header('Content-type: image/png');
	pa_send_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
	pa_send_header("Expires: " . gmdate("D, d M Y H:i:s",time()+86400) . " GMT" );

if($pa_theme["logo_style"]=="graphical"){
  $font="Arial_Black.ttf";
  $font_size=40;
  $size=imagettfbbox($font_size,0,$font,$pa_theme["logo_text"]);
  $width=$size[2]-$size[0]+15;
  $height=$size[1]-$size[7]+10;
  $posx=-$size[0];
  $posy=$size[1];
//  var_dump($size);
  $image_p = imagecreatetruecolor($width, $height);
  $bg=theme_get_bgcolor();
  $color = ImageColorAllocate( $image_p,$bg[0] ,$bg[1] ,$bg[2]);
  $col1=hexrgb($pa_colors["logo_color"]);
  $col2=hexrgb(color_light($pa_colors["logo_color"],0.5));
  $col3=hexrgb(color_light($pa_colors["logo_color"],2));
  $textcolor_lo = imagecolorallocate($image_p, $col2[0], $col2[1], $col2[2]);
  $textcolor = imagecolorallocate($image_p, $col1[0], $col1[1], $col1[2]);
  $textcolor_hi = imagecolorallocate($image_p, $col3[0], $col3[1], $col3[2]);
//  $sh_color = imagecolorallocate($image_p, 0, 0, 0);
  $sh_color1 = imagecolorallocatealpha($image_p, 0, 0, 0,80);
  $sh_color2 = imagecolorallocatealpha($image_p, 0, 0, 0,100);
  $sh_color3 = imagecolorallocatealpha($image_p, 0, 0, 0,120);
  imagefill($image_p,0,0,$color);
  imagettftext( $image_p,$font_size,0,$posx+11,$height-($posy+4),$sh_color1,$font,$pa_theme["logo_text"]);
  imagettftext( $image_p,$font_size,0,$posx+11+1,$height-($posy+4)+1,$sh_color1,$font,$pa_theme["logo_text"]);
  imagettftext( $image_p,$font_size,0,$posx+11+2,$height-($posy+4)+2,$sh_color2,$font,$pa_theme["logo_text"]);
  
  imagettftext( $image_p,$font_size,0,$posx+11+3,$height-($posy+4)+3,$sh_color3,$font,$pa_theme["logo_text"]);
  imagettftext( $image_p,$font_size,0,$posx+11+4,$height-($posy+4)+3,$sh_color3,$font,$pa_theme["logo_text"]);

  imagettftext( $image_p,$font_size,0,$posx+5-1,$height-($posy+10)-1,$textcolor_hi,$font,$pa_theme["logo_text"]);
  imagettftext( $image_p,$font_size,0,$posx+5-2,$height-($posy+10),$textcolor_hi,$font,$pa_theme["logo_text"]);

  imagettftext( $image_p,$font_size,0,$posx+5+1,$height-($posy+10)+1,$textcolor_lo,$font,$pa_theme["logo_text"]);
  imagettftext( $image_p,$font_size,0,$posx+5,$height-($posy+10),$textcolor,$font,$pa_theme["logo_text"]);
  imagepng($image_p);
  
 }else{
	$bg=theme_get_bgcolor();
	list($width, $height) = getimagesize($pa_theme["logo_path"]);
	$image = imagecreatetruecolor($width, $height);
	$color = ImageColorAllocate( $image,$bg[0] ,$bg[1] ,$bg[2]);
	imagefill($image,0,0,$color);
	$image_l = imagecreatefrom($pa_theme["logo_path"]);
	imagecopyresampled($image, $image_l, 0, 0, 0, 0, $width, $height, $width, $height);
	imagepng($image);
    
 }

}

function theme_generate_theme_image($path,$bgcolor,$scale){
	global $pa_theme,$pa_setup;
	
	
	if($path=="STARS"){
		// generate 5 stars complex picture
		// scale is the size of one star, normal is 16
		pa_send_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
		pa_send_header("Expires: " . gmdate("D, d M Y H:i:s",time()+86400) . " GMT" );
		$bg=hexrgb($bgcolor);
		$image=imagecreatetruecolor($scale*5,$scale*11);
		$color = ImageColorAllocate( $image,$bg[0] ,$bg[1] ,$bg[2]);
		imagefill($image,0,0,$color);
		list($sizex, $sizey) = getimagesize($pa_theme["theme_path"]."star_grey.png");
		$star_grey = imagecreatefrom($pa_theme["theme_path"]."star_grey.png");
		$star_gold = imagecreatefrom($pa_theme["theme_path"]."star_gold.png");
		$star_green = imagecreatefrom($pa_theme["theme_path"]."star_green.png");

		for( $x=0;$x<5*$scale;$x+=$scale){
			for( $y=0;$y<11*$scale;$y+=$scale){
				if($y<6*$scale && $x<$y){
					imagecopyresampled($image,$star_green,$x,$y,0,0,$scale,$scale,$sizex,$sizey);
				}else if($y>=6*$scale && $x<($y-5*$scale)){
					imagecopyresampled($image,$star_gold,$x,$y,0,0,$scale,$scale,$sizex,$sizey);
				}else{
					imagecopyresampled($image,$star_grey,$x,$y,0,0,$scale,$scale,$sizex,$sizey);
				}
			}
		}
			
			
		imagepng($image);
		return true;
	}
	// load image with prcessed background
	// if no bgcolor or not PNG just load the image
	$mime=get_mime($path);
	pa_send_header("Content-type: $mime");
	pa_send_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
	pa_send_header("Expires: " . gmdate("D, d M Y H:i:s",time()+86400) . " GMT" );
	if($mime=='image/png'){
		$bg=hexrgb($bgcolor);
		list($width, $height) = getimagesize($pa_theme["theme_path"].$path);
		$image = imagecreatetruecolor($width*$scale/100, $height*$scale/100);
		$color = ImageColorAllocate( $image,$bg[0] ,$bg[1] ,$bg[2]);
		imagefill($image,0,0,$color);
		$image_l = imagecreatefrom($pa_theme["theme_path"].$path);
		imagecopyresampled($image, $image_l, 0, 0, 0, 0, $width*$scale/100, $height*$scale/100, $width, $height);
		imagepng($image);
		return true;
	}else{
		readfile($pa_theme["theme_path"].$path);
		return false;
	}
	
	
	
}

function theme_generate_directories($dirs){
global $themes_dir,$pa_quality,$pa_setup,$pa_theme,$pa_color_map,$themes_dir,$pa_colors;
ob_start();
$display_shadows=$pa_theme["display_shadows"];
if(is_array($dirs)){
 foreach($dirs as $dir){
 	   if($pa_theme["dir_logo_style"]=='pic_thmb_size'){
		   $width=$pa_quality["thmb_size"]+$pa_theme["additional_thmb_width"];
		   $height=$pa_quality["thmb_size"]+$pa_theme["additional_thmb_height"];
 	   }else if($pa_theme["dir_logo_style"]=='pic_other_size'){
	  		$width=$pa_theme["dir_logo_size"]+$pa_theme["additional_thmb_width"];
	   		$height=$pa_theme["dir_logo_size"]+$pa_theme["additional_thmb_height"];
 	   }
       $dir_link=$dir['link'];
       $dir_logo_path=$dir['logo'];
       $dir_short_desc=$dir['desc'];
       $dir_name=$dir['name'];
	   $width=$dir['width'];
	   $height=$dir['height'];
	   $border=$pa_theme['thumbnail_border_size'];
       if($pa_theme["dir_logo_style"]=='pic_other_size' || $pa_theme["dir_logo_style"]=='pic_thmb_size'){
	       require $pa_theme["theme_path"]."dir_pic.tpl.php";
       }else{
	       require $pa_theme["theme_path"]."dir.tpl.php";
       }
 }
}

$contents = ob_get_contents();
ob_end_clean();
return $contents;

}



function theme_generate_thumbnails($thmbs){
global $themes_dir,$pa_setup,$pa_theme,$pa_color_map,$pa_quality,$pa_colors;
$display_shadows=$pa_theme["display_shadows"];
if($thmbs == null ) return null;
if($pa_theme["directory_style"]=="flowing"){
  ob_start();
  if(is_array($thmbs)){
   foreach($thmbs as $thmb){
	$image_view_link=$thmb['link'];
	$image_short_desc=$thmb['desc'];
	$thmb_link=$thmb['thmb'];
	$width=$thmb['width'];
	$height=$thmb['height'];
	$border=$pa_theme['thumbnail_border_size'];		
	if($pa_quality["thmb_show_views"]=="true"){
		$view_count=$thmb["view_count"];
	}
	if($pa_quality["thmb_show_comments"]=="true"){
		$comment_count=$thmb["comment_count"];
	}
	if($pa_quality["thmb_show_votes"]=="true"){
		$votes_count=$thmb["vote_count"];
		$votes_avg=$thmb["vote_avg"];
	}
       require $pa_theme["theme_path"]."thmb.tpl.php";
   }
  }
  $contents = ob_get_contents();
  ob_end_clean();
}else{
  if(is_array($thmbs)){
   $cnt=0;
   foreach($thmbs as $thmb){
	$image_view_link=$thmb['link'];
	$image_short_desc=$thmb['desc'];
	$thmb_link=$thmb['thmb'];
	$width=$thmb['width'];
	$height=$thmb['height'];		
	$border=$pa_theme['thumbnail_border_size'];	
	if($pa_quality["thmb_show_views"]=="true"){
		$view_count=$thmb["view_count"];
	}
	if($pa_quality["thmb_show_comments"]=="true"){
		$comment_count=$thmb["comment_count"];
	}
	if($pa_quality["thmb_show_votes"]=="true"){
		$votes_count=$thmb["vote_count"];
		$votes_avg=$thmb["vote_avg"];
	}
       ob_start();
       require $pa_theme["theme_path"]."thmb.tpl.php";
       $th_row[]=ob_get_contents();
       ob_end_clean();
       $cnt++;
       if($cnt==$pa_theme["raster_dir_x"]){
       	$thumbnails[]=$th_row;
	$th_row=Array();
	  $cnt=0;
       }
   }
  }
  if ($cnt!=0){
  	    if(isset($thumbnails[0])){
	  		for($i=$cnt;$i<$pa_theme["raster_dir_x"];$i++){
	  			$th_row[]="&nbsp;";
	  		}
  	    }
       	$thumbnails[]=$th_row;
  }
  if(is_array($thumbnails)){
	  ob_start();
	  require $pa_theme["theme_path"]."raster.tpl.php";
	  $contents = ob_get_contents();
	  ob_end_clean();
  }
}
return $contents;
}


function theme_generate_login_dialog($register_enabled){
	global $pa_setup,$themes_dir,$pa_theme;
	
	
	ob_start();
	require $pa_theme["theme_path"]."login.tpl.php";
	$contents = ob_get_contents();
	ob_end_clean();
	return $contents;
	
}
function theme_generate_error_page(){
	global $pa_setup,$pa_lang,$pa_theme,$pa_color_map;
	global $phpalbum_version;
	global $theme_params,$themes_dir,$pa_user;
	pa_send_header("Content-type: text/html; charset=".$pa_lang["character_set"]);
	$return_home_url=$pa_setup["return_home_url"];
	$stylesheet_link="main.php?cmd=theme&var1=style_css";
	$footer_message="<font size=\"2\">Powered by </font><a class=\"me\" href=\"http://www.phpalbum.net\"><font size=\"2\">PHP Photo Album</font></a>";
	$logo=theme_get_logo();
	$site_name=$pa_setup["site_name"];
	if($pa_setup["register_enabled"]=="true"){
		$register_enabled=true;
	}else{
		$register_enabled=false;
	}
	$login_dialog=theme_generate_login_dialog($register_enabled);

	
	/// logging in
	$login_enabled=$pa_setup["login_enabled"];
	if($pa_user["name"]!="guest"){
		$logged_in=true;
	}else{
		$logged_in=false;
	}
	if(isset($_GET["login"]) && !$logged_in){
		$login_clicked=true;
	}else{
		$login_clicked=false;
	}
	if($logged_in){
		$login_logout_text=t("ID_LOGOUT");
		if(!$login_clicked)$login_logout_link="main.php?cmd=album&var1=".$var1."&logout";
	}else{
		$login_logout_text=t("ID_LOGIN");
		if(!$login_clicked)$login_logout_link="main.php?cmd=album&var1=".$var1."&login";
	}
	
	
	require($pa_theme["theme_path"]."error.tpl.php");
}
function theme_generate_album_page($dir_path,$quality_links,$dirs,$thmbs,$new_thmbs,$dir_long_desc,$next_start_with,$previous_start_with,$var1,$type="NORM",$did_you_mean_link=null){
	global $pa_setup,$pa_lang,$pa_theme,$pa_color_map,$pa_original_keywords;
	global $phpalbum_version;
	global $theme_params,$themes_dir,$pa_user;
	if(strlen($pa_setup["tracking_code"])>0){
		$tracking_code=$pa_setup["tracking_code"];
	}
	pa_send_header("Content-type: text/html; charset=".$pa_lang["character_set"]);
	if($pa_theme["show_search_box"]=="true"){
		$show_search_box="true";
		$search_text=$pa_original_keywords;
	}
	$return_home_url=$pa_setup["return_home_url"];
	$stylesheet_link=theme_get_style_css_link();
	$directories=theme_generate_directories($dirs);
	$thumbnails=theme_generate_thumbnails($thmbs);
	$newest_thumbnails=theme_generate_thumbnails($new_thmbs);
	$disable_bottom_nextprev=$pa_theme["disable_bottom_nextprev"];
	$logo=theme_get_logo();
	$site_name=$pa_setup["site_name"];
	$enable_lightbox=($pa_theme["enable_lightbox"]=="true");
	if($pa_setup["register_enabled"]=="true"){
		$register_enabled=true;
	}else{
		$register_enabled=false;
	}
	$login_dialog=theme_generate_login_dialog($register_enabled);

	if($type=="NORM"){
		if($previous_start_with>=0){
			$previous_page_link="main.php?cmd=album&var1=".urlencode($var1)."&var3=".$previous_start_with;
		}else{
			$previous_page_link="";
		}
		if($next_start_with>=0){
			$next_page_link="main.php?cmd=album&var1=".urlencode($var1)."&var3=".$next_start_with;
		}else{
			$next_page_link="";
		}
	}
	if($type=="NEW"){
		if($previous_start_with>=0){
			$previous_page_link="main.php?cmd=search&var3=".$previous_start_with."&keyword=".$pa_original_keywords;
		}else{
			$previous_page_link="";
		}
		if($next_start_with>=0){
			$next_page_link="main.php?cmd=search&var3=".$next_start_with."&keyword=".$pa_original_keywords;
		}else{
			$next_page_link="";
		}
	}
	$footer_message="<font size=\"2\">Powered by </font><a class=\"me\" href=\"http://www.phpalbum.net\"><font size=\"2\">PHP Photo Album</font></a>";
	
	
	/// logging in
	$login_enabled=$pa_setup["login_enabled"];
	if($pa_user["name"]!="guest"){
		$logged_in=true;
	}else{
		$logged_in=false;
	}
	if(isset($_GET["login"]) && !$logged_in){
		$login_clicked=true;
	}else{
		$login_clicked=false;
	}
	if($logged_in){
		$login_logout_text=t("ID_LOGOUT");
		if(!$login_clicked)$login_logout_link="main.php?cmd=album&var1=".$var1."&logout";
	}else{
		$login_logout_text=t("ID_LOGIN");
		if(!$login_clicked)$login_logout_link="main.php?cmd=album&var1=".$var1."&login";
	}
	
	
	require($pa_theme["theme_path"]."album.tpl.php");
	
	
	
}
function theme_generate_comments($messages,$var3,$imageview_link){
	global $pa_setup,$pa_theme,$themes_dir,$comment_name,$comment_email,$pa_user,$pa_grants;
	if($pa_setup["antispam_code_enabled"]=="true"){
		$antispam_enabled=true;
	}else{
		$antispam_enabled=false;
	}
	if($var3=="post_comment"){
		$adding_comment=true;
		$post_comment_link=$imageview_link."&var3=save_comment";
	}else{
		$adding_comment=false;
	}
	if($adding_comment && $pa_setup["antispam_code_enabled"]=="true" ){
		$cp=new CodePicture();
		$cp->generate();
		$picseq=db_get_seq_nextval("antispam_pic_seq");
		$cp->set_filename($pa_setup["cache_dir"]."cp".$picseq.".jpg");
		$cp->put_jpg();
		db_insert("anti_spam_codes",Array("pic_seq"=>$picseq,"code"=>$cp->get_code(),"time"=>time()));
		$code_image='main.php?cmd=antispampic&var1='.$picseq.'"';
		$code_seq=$picseq;
	}
	if(isset($pa_grants["comments"])){
		$delete_comment_link=$imageview_link."&var3=delete_comment-";
	}
	ob_start();
	require $pa_theme["theme_path"]."comments.tpl.php";
	$contents = ob_get_contents();
	ob_end_clean();
	return $contents;
}
function theme_generate_ecard($var3,$imageview_link,$ecard){
	global $pa_setup,$pa_theme,$themes_dir,$comment_name,$comment_email,$pa_user,$pa_grants;
	if($pa_setup["antispam_code_enabled"]=="true"){
		$antispam_enabled=true;
	}else{
		$antispam_enabled=false;
	}
	$viewing_card=false;
	$sending_ecard=false;
	if($var3=="post_ecard"){
		$sending_ecard=true;
	  $post_ecard_link=$imageview_link."&var3=send_ecard";
	}else if($var3=="view_ecard"){
	  $viewing_card=true;
	  $sender_name=$ecard["from_name"];
	  $sender_email=$ecard["from_email"];
	  $recipient_name=$ecard["to_name"];
	  $recipient_email=$ecard["to_email"];
	  $ecard_message=str_replace("\n","<br/>",$ecard["message_text"]);
	}else{
	  $sending_ecard=false;
	  $post_ecard_link=$imageview_link."&var3=post_ecard";
	}
	if($sending_ecard && $pa_setup["antispam_code_enabled"]=="true" ){
		$cp=new CodePicture();
		$cp->generate();
		$picseq=db_get_seq_nextval("antispam_pic_seq");
		$cp->set_filename($pa_setup["cache_dir"]."cp".$picseq.".jpg");
		$cp->put_jpg();
		db_insert("anti_spam_codes",Array("pic_seq"=>$picseq,"code"=>$cp->get_code(),"time"=>time()));
		$code_image='main.php?cmd=antispampic&var1='.$picseq.'"';
		$code_seq=$picseq;
	}
	ob_start();
	require $pa_theme["theme_path"]."ecard.tpl.php";
	$contents = ob_get_contents();
	ob_end_clean();
	return $contents;
}
function theme_generate_parameters($params){
	global $pa_setup,$themes_dir,$pa_theme;
	ob_start();
	require $pa_theme["theme_path"]."parameters.tpl.php";
	$contents = ob_get_contents();
	ob_end_clean();
	return $contents;
}
function theme_generate_imageview_page($dir_path,$quality_links,$short_desc,$long_desc,$next_link,$prev_link,$image,$imageview_link,$width,$height,$var3,$messages,$params,$ecard,$photonotes){
	global $themes_dir,$phpalbum_version;
    global $comment_name,$comment_email;
    global $pa_setup,$pa_theme,$pa_lang,$pa_theme,$pa_color_map,$pa_user,$pa_original_keywords,$pa_colors;
	require "bin/CodePicture.class.php";
	pa_send_header("Content-type: text/html; charset=".$pa_lang["character_set"]);
	$photonotes_script=pa_get_photonotes_script($photonotes);
	if($pa_theme["show_search_box"]=="true"){
		$show_search_box="true";
		$search_text=$pa_original_keywords;
	}
	if(strlen($pa_setup["tracking_code"])>0){
		$tracking_code=$pa_setup["tracking_code"];
	}
	$return_home_url=$pa_setup["return_home_url"];
	$stylesheet_link=theme_get_style_css_link();
	$disable_bottom_nextprev=$pa_theme["disable_bottom_nextprev"];
	$logo=theme_get_logo();
	$total_width=$width+$pa_theme["picture_border_size"]*2;
	$total_height=$height+$pa_theme["picture_border_size"]*2;
	$photo_border_size=$pa_theme["picture_border_size"];
	$display_shadows=$pa_theme["display_shadows"];
	$footer_message="<font size=\"2\">Powered by </font><a class=\"me\" href=\"http://www.phpalbum.net\"><font size=\"2\">PHP Photo Album</font></a>";
	$site_name=$pa_setup["site_name"];
	//comments
	if($pa_setup["comments_enabled"]=="true"){
		$post_comment_link=$imageview_link."&var3=post_comment#COMMENT";
		$comments=theme_generate_comments($messages,$var3,$imageview_link);
		
	}else{
		unset($comments);
	}
	if($pa_setup["ecard_enabled"]=="true"){
		$post_ecard_link=$imageview_link."&var3=post_ecard#ECARD";
		$ecards=theme_generate_ecard($var3,$imageview_link,$ecard);
	}else{
		unset($ecards);
	}
	if($params){
		$parameters=theme_generate_parameters($params);
	}
	
		/// logging in
	if($pa_setup["register_enabled"]=="true"){
		$register_enabled=true;
	}else{
		$register_enabled=false;
	}
	$login_dialog=theme_generate_login_dialog($register_enabled);

	$login_enabled=$pa_setup["login_enabled"];
	if($pa_user["name"]!="guest"){
		$logged_in=true;
	}else{
		$logged_in=false;
	}
	if(isset($_GET["login"]) && !$logged_in){
		$login_clicked=true;
	}else{
		$login_clicked=false;
	}
	if($logged_in){
		$login_logout_text=t("ID_LOGOUT");
		if(!$login_clicked)$login_logout_link=$imageview_link."&logout";
	}else{
		$login_logout_text=t("ID_LOGIN");
		if(!$login_clicked)$login_logout_link=$imageview_link."&login";
	}
	require($pa_theme["theme_path"]."imageview.tpl.php");
	
}

function theme_generate_setup_page($menu,$content){
	global $pa_setup,$themes_dir,$phpalbum_version,$pa_lang;
	pa_send_header("Content-type: text/html; charset=".$pa_lang["character_set"]);
	$footer_message="<font size=\"2\">Powered by </font><a class=\"me\" href=\"http://www.phpalbum.net\"><font size=\"2\">PHP Photo Album</font></a>";
	$stylesheet_link=theme_get_style_css_link();
	$logo=theme_get_logo();

	if(file_exists($pa_theme["theme_path"]."setup.tpl.php")){
		require($pa_theme["theme_path"]."setup.tpl.php");
	}else{
		require("bin/phptemplate/setup.tpl.php");
	}
}
?>
