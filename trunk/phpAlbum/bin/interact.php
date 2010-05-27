<?php
if(!defined("PHPALBUM_APP")){
		die("Direct access not permitted!");
}
function get_comments($var1){
	$dir=get_dir_from_photo_var($var1);
	$file=basename($var1);

	$rec=db_select_all("directory","path=='". prepdb($dir) ."'");
	$comments=db_select_all("comments_".$rec[0]["seq_files"],"file_name=='".prepdb($file)."' && visible=='true'","time-");
	return $comments;
}
function get_all_comments(){
	global $data_dir;
	$comments=db_select_all("new_comments",null);
	return $comments;
}

function approve_comment($var1,$id){
	global $pa_grants;
if(isset($pa_grants["comments"])){
	$dir=get_dir_from_photo_var($var1);
	$file=basename($var1);
	$rec=db_select_all("directory","path=='". prepdb($dir) ."'");
	$im_rec=db_select_all("comments_".$rec[0]["seq_files"],"id=='".$id."'");
	if($im_rec[0]["visible"]!="true"){
		db_update("comments_".$rec[0]["seq_files"],"visible='true';","id=='".$id."'");
		update_stats("imageview",$var1,"comment","add");
	}
	db_delete("new_comments","id=='".$id."'");
 }
}
function delete_comment($var1,$id){
	global $pa_grants;
 if(isset($pa_grants["comments"])){
	$dir=get_dir_from_photo_var($var1);
	$file=basename($var1);
	$rec=db_select_all("directory","path=='". prepdb($dir) ."'");
	$im_rec=db_select_all("comments_".$rec[0]["seq_files"],"id=='".$id."'");
	if($im_rec[0]["visible"]=="true"){
		update_stats("imageview",$var1,"comment","del");
	}
	db_delete("comments_".$rec[0]["seq_files"],"id=='".$id."'");
	db_delete("new_comments","id=='".$id."'");
    

 }
}
function save_comment($var1,$text,$name,$email,$time){
	global $pa_setup;
	$t_text=pa_html_encode(stripslashes($text));
	$t_text=str_replace("\n","<br/>",$t_text);
	$t_text=str_replace("\r","",$t_text);
	
	$dir=get_dir_from_photo_var($var1);
	$file=basename($var1);

	$rec=db_select_all("directory","path=='". prepdb($dir) ."'");
	$id=db_get_seq_nextval("comment_id");
	$visible_flag=$pa_setup["publish_only_approved_comments"]=="true"?"false":"true";
	db_insert("comments_".$rec[0]["seq_files"],Array(
		"id"=>$id,
		"file_name"=>$file,
		"name"=>pa_html_encode($name),
		"time"=>$time,
		"email"=>pa_html_encode($email),
		"text"=>$t_text,
		"visible"=>$visible_flag
	));
    if($visible_flag=="true"){
		update_stats("imageview",$var1,"comment","add");
	}
	$new_comments=db_select_all("new_comments",null,"time",true);
	if(count($new_comments)>=$pa_setup["comments_approve_queue_size"]){
		db_delete("new_comments","id==".$new_comments[0]["id"]);
	}
	db_insert("new_comments",Array(
	    "seq_files"=>$rec[0]["seq_files"],
		"id"=>$id,
		"pic_link"=>$var1,
		"file_name"=>$file,
		"name"=>pa_html_encode($name),
		"time"=>$time,
		"email"=>pa_html_encode($email),
		"text"=>$t_text
	));
	db_commit();
}

function delete_old_ecards(){
	$time=time()-60*60*24*14;
	db_delete("ecards","created<$time");
}
function delete_old_anitspam(){
	$time=time()-60*60;
	db_delete("anti_spam_codes","time<$time");
}
function send_ecard($r_name,$r_email,$s_name,$s_email,$text,$var1){
		global $pa_setup,$pa_lang;
		if($r_email=="") return t("ID_EMAIL_IS_MANDATORY");
		if($r_name=="")$r_name=$r_email;
		if($s_name=="")$s_name=t("ID_SOMEONE");
		$time=time();
		$hash=md5($r_name.$r_email.$time);
		$message=$pa_setup["ecard_text"];
		$subject=$pa_setup["ecard_subject"];
		$header = 'From: '.$s_email . "\r\n" .
				  'Reply-To: '.$s_email. "\r\n" .
				  'X-Mailer: PHP/' . phpversion() . "\r\n";
		$header .="Content-Type: text/plain;charset=\"{$pa_lang["character_set"]}\"\r\n";

		$message=str_replace("#FROM_NAME",$s_name,$message);
		$message=str_replace("#TO_NAME",$r_name,$message);
		$message=str_replace("#FROM_EMAIL",$s_email,$message);
		$message=str_replace("#TO_EMAIL",$r_email,$message);
		$message=str_replace("#TIME",date("H:i",$time),$message);
		$message=str_replace("#DATE",date("d.m.Y",$time),$message);
		$message=str_replace("#ECARD_ADRESS","main.php?cmd=ecardview&var1=$hash#ECARD",$message);
		$message=str_replace("#IMAGE_ADRESS","main.php?cmd=imageview&var1=".urlencode($var1),$message);
		$ret=mail($r_email,$subject,$message,$header);
		db_insert("ecards",Array("uid"=>$hash,"image"=>$var1,"from_name"=>$s_name,"from_email"=>$s_email,"to_name"=>$r_name,"to_email"=>$r_email,"message_text"=>$text,"created"=>$time,"picked_up"=>"false"));
		if($ret===true){
			return t("ID_YOUR_MESSAGE_WAS SENT");
		}else{
			return t("ID_PROBLEM_SENDING_MESSAGE");
		}
		
}
?>