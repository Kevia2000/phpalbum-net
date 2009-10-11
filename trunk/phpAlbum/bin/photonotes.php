<?php
if(!defined("PHPALBUM_APP")){
		die("Direct access not permitted!");
}

function pa_get_photonotes_script($photo_note_array){
	global $var1,$pa_setup;
	if($pa_setup["photonotes_enabled"]=="false"){
		return false;
	}
	$var1_b64=base64_encode($var1);
	$script="";
	//var_dump($photo_note_array);
	$add_note_text=t("ID_ADD_NOTE");
	$del_all_notes_text=t("ID_DELETE_ALL_NOTES");
	$del_all_notes_link="main.php?cmd=photonotes&var1={$var1_b64}&var2=delete_all";
	$script="var container = document.getElementById('ImageContainer');
		     var width = parseFloat ( container.offsetWidth );
		     var height = parseFloat ( container.offsetHeight );
		     
			 var notes = new PhotoNoteContainer(container,null,'{$add_note_text}','{$del_all_notes_text}','{$del_all_notes_link}');

			 function saveNote(note){
			 	var id=doHTTPRequest('main.php?cmd=photonotes&var1={$var1_b64}&var2=save;'+note.id+'&var3='+encodeURIComponent(note.gui.TextBox.value)+'&var4='+(note.rect.left/width)+';'+(note.rect.top/height)+';'+(note.rect.width/width)+';'+(note.rect.height/height));
			 	return id;
			 }
			 function deleteNote(note){
			 	doHTTPRequest('main.php?cmd=photonotes&var1={$var1_b64}&var2=delete;'+note.id);
			 }
			 ";
	foreach($photo_note_array as $key => $note){
		$text=str_replace("'","\'",$note["T"]);
		$text=str_replace("\n","<br/>",$text);
		$script.="
				  var size = new PhotoNoteRect( {$note["X"]}*width,{$note["Y"]}*height,{$note["W"]}*width,{$note["H"]}*height);
				  var note = new PhotoNote('{$text}',{$key}, size);
				  notes.AddNote(note);
				  note.onsave = function (note) { saveNote(note); return {$key}; };
				  note.ondelete = function (note) { deleteNote(note); return true; };
				 ";
		
	}
		$script.="setTimeout(\"checkMouseOut()\",1200);
				  container.onmouseover=mouseOver;
				  container.onmouseout=mouseOut;";			
	//return script to engine
	return "<script>{$script}</script>";
}

function pa_apply_photonotes(){
	global $data_dir,$pa_setup,$var1,$var2,$var3,$var4;
	//var1: command save/delete
	//var2:	image_id seqid:filename
	//var3: pn-text
	//var4: pn-coordinates  X1_Y1_X2_Y2  (left up and right down corner)
	$file=base64_decode($var1);
	$command=split(";",$var2);
	
	$text=$var3;
	$text=decodeURIComponent($text);
	$text=urldecode($text);
	
	$size=split(";",$var4);
	
	$sett=get_directory_settings(get_dir_from_photo_var($file),0);
	$seq_files=$sett[0]["seq_files"];
	
	$file_name=prepdb(basename($file));
	$rec=db_select_all("files_{$seq_files}","file_name=='{$file_name}'");
	$pn=$rec[0]["photonotes"];
	/////// delete
	if($command[0]=="delete_all"){
		$pn=Array();
	}
	if($command[0]=="delete"){
		unset($pn[$command[1]]);
	}
	/////// save
	if($command[0]=="save"){
		if($command[1]>0){
			// replace existing note
			$pn[$command[1]]["X"]=substr($size[0],0,7);
			$pn[$command[1]]["Y"]=substr($size[1],0,7);
			$pn[$command[1]]["W"]=substr($size[2],0,7);
			$pn[$command[1]]["H"]=substr($size[3],0,7);
			$pn[$command[1]]["T"]=$text;
			echo $command[1];
		}else{
			// create new note
			$maxKey=0;
			foreach($pn as $key=>$val){
				if($maxKey<$key) $maxKey=$key;
			}
			$maxKey++;
			$pn[$maxKey]["X"]=substr($size[0],0,7);
			$pn[$maxKey]["Y"]=substr($size[1],0,7);
			$pn[$maxKey]["W"]=substr($size[2],0,7);
			$pn[$maxKey]["H"]=substr($size[3],0,7);
			$pn[$maxKey]["T"]=$text;
			echo $maxKey;
		}
		
	}
	db_update("files_{$seq_files}","photonotes=".var_export($pn,true).";","file_name=='{$file_name}'");
	db_commit();
	
}
?>