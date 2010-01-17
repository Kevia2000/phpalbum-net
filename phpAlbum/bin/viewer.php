<?php 
if(!defined("PHPALBUM_APP")){
		die("Direct access not permitted!");
}
function UnsharpMask($img, $amount, $radius,$threshold)    {

////////////////////////////////////////////////////////////////////////////////////////////////
////
////          Unsharp Mask for PHP - version 2.0
////
////    Unsharp mask algorithm by Torstein H?nsi 2003-06.
////             thoensi_at_netcom_dot_no.
////               Please leave this notice.
////
///////////////////////////////////////////////////////////////////////////////////////////////


    // $img is an image that is already created within php using
    // imgcreatetruecolor. No url! $img must be a truecolor image.

    // Attempt to calibrate the parameters to Photoshop:
    if ($amount > 500)    $amount = 500;
    $amount = $amount * 0.016;
    if ($radius > 50)    $radius = 50;
    $radius = $radius * 2;
    
    $radius = abs(round($radius));     // Only integers make sense.
    if ($radius == 0) return $img;
    $w = imagesx($img); $h = imagesy($img);
    $imgBlur = imagecreatetruecolor($w, $h);
    

    // Gaussian blur matrix:
    //                        
    //    1    2    1        
    //    2    4    2        
    //    1    2    1        
    //                        
    //////////////////////////////////////////////////
    
    imagecopy($imgBlur, $img, 0, 0, 0, 0, $w, $h); // background    
    
    for ($i = 0; $i < $radius; $i++)    {
        
        if (function_exists('imageconvolution')) { // PHP >= 5.1
            $matrix = array(
                array( 1, 2, 1 ),
                array( 2, 4, 2 ),
                array( 1, 2, 1 )
                );
            imageconvolution($imgCanvas, $matrix, 16, 0);
            
        } else {
                
            // Move copies of the image around one pixel at the time and merge them with weight
            // according to the matrix. The same matrix is simply repeated for higher radii.
                    
            imagecopy      ($imgBlur, $img, 0, 0, 1, 1, $w - 1, $h - 1); // up left
            imagecopymerge ($imgBlur, $img, 1, 1, 0, 0, $w, $h, 50); // down right
            imagecopymerge ($imgBlur, $img, 0, 1, 1, 0, $w - 1, $h, 33.33333); // down left
            imagecopymerge ($imgBlur, $img, 1, 0, 0, 1, $w, $h - 1, 25); // up right
            
            imagecopymerge ($imgBlur, $img, 0, 0, 1, 0, $w - 1, $h, 33.33333); // left
            imagecopymerge ($imgBlur, $img, 1, 0, 0, 0, $w, $h, 25); // right
            imagecopymerge ($imgBlur, $img, 0, 0, 0, 1, $w, $h - 1, 20 ); // up
            imagecopymerge ($imgBlur, $img, 0, 1, 0, 0, $w, $h, 16.666667); // down
            
            imagecopymerge ($imgBlur, $img, 0, 0, 0, 0, $w, $h, 50); // center
        }
    }

    // Calculate the difference between the blurred pixels and the original
    // and set the pixels
    for ($x = 0; $x < $w; $x++)    { // each row
        for ($y = 0; $y < $h; $y++)    { // each pixel
                
            $rgbOrig = ImageColorAt($img, $x, $y);
            $rOrig = (($rgbOrig >> 16) & 0xFF);
            $gOrig = (($rgbOrig >> 8) & 0xFF);
            $bOrig = ($rgbOrig & 0xFF);
            
            $rgbBlur = ImageColorAt($imgBlur, $x, $y);
            
            $rBlur = (($rgbBlur >> 16) & 0xFF);
            $gBlur = (($rgbBlur >> 8) & 0xFF);
            $bBlur = ($rgbBlur & 0xFF);
            
            // When the masked pixels differ less from the original
            // than the threshold specifies, they are set to their original value.
            $rNew = (abs($rOrig - $rBlur) >= $threshold)
                ? max(0, min(255, ($amount * ($rOrig - $rBlur)) + $rOrig))
                : $rOrig;
            $gNew = (abs($gOrig - $gBlur) >= $threshold)
                ? max(0, min(255, ($amount * ($gOrig - $gBlur)) + $gOrig))
                : $gOrig;
            $bNew = (abs($bOrig - $bBlur) >= $threshold)
                ? max(0, min(255, ($amount * ($bOrig - $bBlur)) + $bOrig))
                : $bOrig;
            
            
                        
            if (($rOrig != $rNew) || ($gOrig != $gNew) || ($bOrig != $bNew)) {
                $pixCol = ImageColorAllocate($img, $rNew, $gNew, $bNew);
                ImageSetPixel($img, $x, $y, $pixCol);
            }
        }
    }
    
    return $img; 
}


function imagecreatefrom($file){
if(strtoupper(substr($file,-3,3))=="JPG" || strtoupper(substr($file,-4,4))=="JPEG"){		
	$image=imagecreatefromjpeg($file);
}
if(strtoupper(substr($file,-3,3))=="PNG"){		
	$image=imagecreatefrompng($file);
}
if(strtoupper(substr($file,-3,3))=="GIF"){		
	$image=imagecreatefromgif($file);
}
return $image;
}

function image_same_type($file,$image,$quality = 100){
	if(strtoupper(substr($file,-3,3))=="JPG" || strtoupper(substr($file,-4,4))=="JPEG"){		
		imagejpeg($image,null,$quality);
	}
	if(strtoupper(substr($file,-3,3))=="PNG"){		
		imagepng($image);
	}
	if(strtoupper(substr($file,-3,3))=="GIF"){		
		imagegif($image);
	}
}

function pa_html_encode($string){
	return str_replace( array ( '&', '"', "'", '<', '>'), array ( '&amp;' , '&quot;', '&#39;' , '&lt;' , '&gt;' ),$string);
}
function pa_html_decode($string){
	return str_replace( array ( '&amp;' , '&quot;', '&#39;' , '&lt;' , '&gt;' ),array ( '&', '"', "'", '<', '>'),$string);
}
/****************************************/
/*      SETTINGS                 */
/****************************************/






function get_image_link($dir,$file){
	if(isset($dir) && strlen($dir)>0)
		$dir=$dir."/";
	return "main.php?cmd=image&var1=".urlencode($dir.$file);
}
function get_imageview_link($dir,$file){
	if(isset($dir) && strlen($dir)>0)
		$dir=$dir."/";
	return "main.php?cmd=imageview&var1=".urlencode($dir.$file);
}
function get_thmb_link($dir,$file_rec){
	global $pa_quality;
	if(isset($dir) && strlen($dir)>0)
		$dir=$dir."/";
	if($file_rec["type"]=="I"){
		$file=$dir.$file_rec["file_name"];
	}else if($file_rec["type"]=="V"){
		$file=$dir.$file_rec["file_name"];
		if($file_rec["screenshot"]==""){
			$file="[movie]";
		}else{
			$file=$dir.$file_rec["screenshot"];
		}
	}else if($file_rec["type"]=="A"){
		$file=$dir.$file_rec["file_name"];
		if($file_rec["screenshot"]==""){
			$file="[audio]";
		}else{
			$file=$dir.$file_rec["screenshot"];
		}
	}else if($file_rec["type"]=="O"){
		$file=$dir.$file_rec["file_name"];
		if($file_rec["screenshot"]==""){
			$file="[file]";
		}else{
			$file=$dir.$file_rec["screenshot"];
		}
	}
	if($pa_quality["thmb_sharp_use"]=='true'){
		$sharpen_str="_".$pa_quality["thmb_sharp_amount"]."_".$pa_quality["thmb_sharp_radius"]."_".$pa_quality["thmb_sharp_treshold"];
	}else{
		$sharpen_str="";
	}
	return "main.php?cmd=thmb&var1=". urlencode($file)."&var2=".$pa_quality["thmb_size"]."_".$pa_quality["thmb_qual"]."_".$pa_quality["square_thumbnails"].$sharpen_str;
}
function get_thmb_dir_link($file){
	global $pa_quality,$pa_theme;
	if($pa_quality["thmb_sharp_use"]=='true'){
		$sharpen_str="_".$pa_quality["thmb_sharp_amount"]."_".$pa_quality["thmb_sharp_radius"]."_".$pa_quality["thmb_sharp_treshold"];
	}else{
		$sharpen_str="";
	}
	if($pa_theme["dir_logo_style"]=="pic_other_size"){
		return "main.php?cmd=thmb&var1=". urlencode($file)."&var2=".$pa_theme["dir_logo_size"]."_".$pa_theme["dir_logo_quality"]."_".$pa_theme["dir_logo_square_thumbnail"].$sharpen_str."_".$pa_color_map["bg_color"]."&var3=DIR";
	}else{
		return "main.php?cmd=thmb&var1=". urlencode($file)."&var2=".$pa_quality["thmb_size"]."_".$pa_quality["thmb_qual"]."_".$pa_quality["square_thumbnails"].$sharpen_str."_".$pa_color_map["bg_color"]."&var3=DIR";
	}
}

function check_access_to_dirs_groups($groups,$inh_groups){
	global $pa_user;
	if(isset($pa_user["groups"]["superuser"])){
		return true;
	}
	if((!is_array($groups) || count($groups)==0) && (!is_array($inh_groups) || count($inh_groups)==0)){ return true;}
	
	if(is_array($pa_user["groups"])){
	  if(is_array($groups)){
		foreach($groups as $key => $value){
			if(isset($pa_user["groups"][$key])){
				return true;
			}
		}
	  }
	  if(is_array($inh_groups)){
		foreach($inh_groups as $key => $value){
			if(isset($pa_user["groups"][$key])){
				return true;
			}
		}
	  }
		return false;
	}else{
		if(count($groups)>0){
			return false;
		}
	}
	return true;
}
function check_access_to_dir($dir){
	global $pa_user;
	if(isset($pa_user["groups"]["superuser"])){
		return true;
	}
	$sett_1=get_directory_settings($dir,0);
	$sett=$sett_1[0];
	if((!is_array($sett["groups"]) || count($sett["groups"])==0) && (!is_array($sett["inh_groups"]) || count($sett["inh_groups"])==0)){ return true;}
	
	if(is_array($pa_user["groups"])){
	  if(is_array($sett["groups"])){
		foreach($sett["groups"] as $key => $value){
			if(isset($pa_user["groups"][$key])){
				return true;
			}
		}
	  }
	  if(is_array($sett["inh_groups"])){
		foreach($sett["inh_groups"] as $key => $value){
			if(isset($pa_user["groups"][$key])){
				return true;
			}
		}
	  }
		return false;
	}else{
		if(count($sett["groups"])>0){
			return false;
		}
	}
	return true;
}
function get_sorted_file_list($seq_files,$all=false){
	global $act_dir_sorting;
	if(!$all){
		$where="visible=='true'";
	}else{
		$where="";
	}
	switch($act_dir_sorting){
		case "date_asc":
			return db_select_all("files_$seq_files",$where,"file_time");
		case "date_desc":
			return db_select_all("files_$seq_files",$where,"file_time-");
		case "filename_asc":
			return db_select_all("files_$seq_files",$where,"file_name");
		case "filename_desc":
			return db_select_all("files_$seq_files",$where,"file_name-");
		case "name_asc":
			return db_select_all("files_$seq_files",$where,"desc,file_name");
		case "name_desc":
			return db_select_all("files_$seq_files",$where,"desc-,file_name-");
		case "manual":
			return db_select_all("files_$seq_files",$where,"order");
		default:
			return db_select_all("files_$seq_files",$where,null);

	}
}
function get_sorted_dir_list($path){
	global $act_dir_sorting;
	switch($act_dir_sorting){
		case "date_asc":
			return db_select_all("directory","visibility=='true' && path!='".prepdb($path)."' && translate_directory(dirname(path))=='".prepdb($path)."' && check_access_to_dirs_groups(groups,inh_groups)","newest_file_time_with_subdirs");
		case "date_desc":
			return db_select_all("directory","visibility=='true' && path!='".prepdb($path)."' && translate_directory(dirname(path))=='".prepdb($path)."' && check_access_to_dirs_groups(groups,inh_groups)","newest_file_time_with_subdirs-");
		case "filename_asc":
			return db_select_all("directory","visibility=='true' && path!='".prepdb($path)."' && translate_directory(dirname(path))=='".prepdb($path)."' && check_access_to_dirs_groups(groups,inh_groups)","path");
		case "filename_desc":
			return db_select_all("directory","visibility=='true' && path!='".prepdb($path)."' && translate_directory(dirname(path))=='".prepdb($path)."' && check_access_to_dirs_groups(groups,inh_groups)","path-");
		case "name_asc":
			return db_select_all("directory","visibility=='true' && path!='".prepdb($path)."' && translate_directory(dirname(path))=='".prepdb($path)."' && check_access_to_dirs_groups(groups,inh_groups)","alias,path");
		case "name_desc":
			return db_select_all("directory","visibility=='true' && path!='".prepdb($path)."' && translate_directory(dirname(path))=='".prepdb($path)."' && check_access_to_dirs_groups(groups,inh_groups)","alias-,path-");
		default:
			return db_select_all("directory","visibility=='true' && path!='".prepdb($path)."' && translate_directory(dirname(path))=='".prepdb($path)."' && check_access_to_dirs_groups(groups,inh_groups)",null);

	}
}
function get_keyword_link($keyword){
	return '<a class="me" href="main.php?cmd=search&keyword='.htmlspecialchars(urlencode($keyword)).'">'.$keyword.'</a>';
}
function get_keyword_parameter_for_link(){
	global $pa_keywords;
	$strings=trim(implode(" ",$pa_keywords));
	if($strings!=""){
		return "&keyword=".htmlspecialchars(urlencode($strings));
	}else{
		return "";
	}
	
}
function  generate_search($var1,$start_with){
  global $pa_setup,$pa_quality,$pa_theme,$pa_color_map,$pa_keywords,$pa_keywords_unsorted;
  global $act_dir_sorting;
  if($start_with=="")$start_with=0;
  
  if ($pa_theme["directory_style"]=="flowing"){
      $number_of_thmbs=$pa_theme["maximum_photos_per_page"];
  }else{
      $number_of_thmbs=$pa_theme["raster_dir_x"]*$pa_theme["raster_dir_y"];
  }  
  
  if($number_of_thmbs==0 || $number_of_thmbs<0){
  	$number_of_thmbs=1000000;/*i hope nobody will make more then million photos in one dir, if yes, i'm sorry :)*/
  }
	$newest_pics=get_newest_photos($var1,$start_with,$number_of_thmbs+1);
	if(!is_array($newest_pics)){
		// nothing found when searched, and returned a did you mean string which could be used
				
		theme_generate_album_page($dir_path,$quality_links,null,Array(),null,null,-1,-1,$var1,"NEW",get_keyword_link($newest_pics));
	}else{
		$cnt=0;
		$position=$start_with;
		foreach($newest_pics as $key => $record){
		   $thumbnails[$cnt]['thmb']=get_thmb_link(substr($record["path"],1,-1),$record);
		   $thumbnails[$cnt]['desc']=pa_html_decode($record["desc"]);
		   if($pa_theme["show_filenames"]=="true" && $thumbnails[$cnt]['desc']==""){
				$thumbnails[$cnt]['desc']=conv_out($record["file_name"]);
		   }
		   $thumbnails[$cnt]['link']="main.php?cmd=imageviewsearch&var1=$position".get_keyword_parameter_for_link();
		   $thumbnails[$cnt]['width']=$pa_quality["thmb_size"]+$pa_theme["additional_thmb_width"];
		   $thumbnails[$cnt]['height']=$pa_quality["thmb_size"]+$pa_theme["additional_thmb_height"];
		   $thumbnails[$cnt]['view_count']=$record["view_count"];
		   $thumbnails[$cnt]['vote_count']=$record["vote_count"];
		   $thumbnails[$cnt]['vote_avg']=$record["vote_avg"];
		   $thumbnails[$cnt]['comment_count']=$record["comment_count"];
		   $cnt++;
		   $position++;
		   if($cnt==$number_of_thmbs) break;
		}
		$qualities=db_select_all("quality","enabled=='true'"); // select all enabled qualities
		$quality_links=Array();
		if(count($qualities)>1){
			foreach($qualities as $key=>$val){
				$quality_links[]=Array("name"=>$val["name"],
									   "link"=>"main.php?cmd=setquality&var1=".$val["id"]."&var2=search&var3=".urlencode($var1)."&var4=$start_with".get_keyword_parameter_for_link(),
									   "actual" => ($val["id"]==$pa_quality["id"])?1:0
									   );
			}
		}
		if ( sizeof($newest_pics)<=$number_of_thmbs){
			//no next page
			$next_start_with=-1;
		}else{
			$next_start_with=$start_with+$number_of_thmbs;
		}
		
	   	if ( $start_with==0){
			//no next page
			$previous_start_with=-1;
		}else{
		     $previous_start_with=$start_with-$number_of_thmbs;
		     if($previous_start_with<0){$previous_start_with=0;}
		}
		$dir_path[0]['name']=t('ID_PHOTO_DIR');
		$dir_path[0]['link']="main.php?cmd=album";
		$cnt=1;
		$keywords="";
		if(is_array($pa_keywords_unsorted)){
			foreach($pa_keywords_unsorted as $key=>$value){
				$dir_path[$cnt]['name']=$value;
				if($keywords!=""){
					$keywords.=" ".$value;
				}else{
					$keywords=$value;
				}
				$dir_path[$cnt]['link']="main.php?cmd=search&keyword=".$keywords;
				$cnt++;
			}
		}
		theme_generate_album_page($dir_path,$quality_links,null,$thumbnails,null,null,$next_start_with,$previous_start_with,$var1,"NEW");
		
	}
	return true;

}

function  generate_album($var1,$start_with){
  global $pa_setup,$pa_quality,$pa_theme,$pa_color_map,$pa_keywords;
  global $act_dir_sorting;
  if($start_with=="")$start_with=0;
  if ($pa_theme["directory_style"]=="flowing"){
      $number_of_thmbs=$pa_theme["maximum_photos_per_page"];
  }else{
      $number_of_thmbs=$pa_theme["raster_dir_x"]*$pa_theme["raster_dir_y"];
  }  
  if($number_of_thmbs==0 || $number_of_thmbs<0){
  	$number_of_thmbs=1000000;/*i hope nobody will make more then million photos in one dir, if yes, i'm sorry :)*/
  }
    $ss=get_directory_settings($var1,0);
    $dir_settings=$ss[0];
	/*newest pictures*/
	$new_thumbnails=Array();
	if($dir_settings["show_newest_pictures_count"]>0){
		$newest_pics=get_newest_photos($var1,0,$dir_settings["show_newest_pictures_count"]);
		$cnt=0;
		foreach($newest_pics as $key => $record){
		   $new_thumbnails[$cnt]['thmb']=get_thmb_link($record["path"],$record);
		   $new_thumbnails[$cnt]['desc']=pa_html_decode($record["desc"]);
		   if($pa_theme["show_filenames"]=="true" && $new_thumbnails[$cnt]['desc']==""){
				$new_thumbnails[$cnt]['desc']=conv_out($record["file_name"]);
		   }
           $new_thumbnails[$cnt]['link']="main.php?cmd=imageview&var1=".urlencode(substr($record["path"],1).$record["file_name"]);
  	       $new_thumbnails[$cnt]['width']=$pa_quality["thmb_size"]+$pa_theme["additional_thmb_width"];
	       $new_thumbnails[$cnt]['height']=$pa_quality["thmb_size"]+$pa_theme["additional_thmb_height"];
	       $new_thumbnails[$cnt]['view_count']=$record["view_count"];
	       $new_thumbnails[$cnt]['vote_count']=$record["vote_count"];
	       $new_thumbnails[$cnt]['vote_avg']=$record["vote_avg"];
	       $new_thumbnails[$cnt]['comment_count']=$record["comment_count"];
		   $cnt++;
		}
	}else{
		$new_thumbnails=null;
	}
	
	
	
    if(isset($dir_settings["sorting"])){
       	$act_dir_sorting=$dir_settings["sorting"];
    }
   	if($act_dir_sorting=='default'){
   		$act_dir_sorting=$pa_setup["default_sorting"];
   	}
	$dir_path[0]['name']=t('ID_PHOTO_DIR');
	$dir_path[0]['link']="main.php?cmd=album";

	$dirs=explode('/',$var1);
	$act_dir="";
	for($i=0;$i<count($dirs)-1;$i++){
		$act_dir.=$dirs[$i]."/";
		$ss=get_directory_settings($act_dir,0);
		if(strlen($ss[0]["alias"])>0){
			$dir_path[$i+1]['name']=pa_html_decode($ss[0]["alias"]);
		}else{
			$dir_path[$i+1]['name']=conv_out($dirs[$i]);
		}
		$dir_path[$i+1]['link']="main.php?cmd=album&var1=".urlencode($act_dir);
		
	}

	$qualities=db_select_all("quality","enabled=='true'"); // select all enabled qualities
	$quality_links=Array();
	if(count($qualities)>1){
		foreach($qualities as $key=>$val){
			$quality_links[]=Array("name"=>$val["name"],
								   "link"=>"main.php?cmd=setquality&var1=".$val["id"]."&var2=album&var3=".urlencode($var1)."&var4=$start_with",
								   "actual" => ($val["id"]==$pa_quality["id"])?1:0
								   );
		}
	}
	$dir=$pa_setup["album_dir"] . $var1;
	/*directory description*/
	
	$dir_long_desc=pa_html_decode($dir_settings["long_desc"]);
	/*openning directories*/
	
	  $dirlist=get_sorted_dir_list($dir_settings["path"]);
      $directories=Array();
      $directories_cnt=0;
      if(sizeof($dirlist)>0){
       while ( list($key,$rec)=each($dirlist)){
		/*visibility*/
		        $file=$rec['file_name'];
				$blocked=false;
				/*test if there is some new images*/
					$diff = (time() - $rec["newest_file_time_with_subdirs"])/60/60;
					if ($diff < $pa_setup["new_dir_indic"] ){
						$dir_pic="main.php?cmd=themeimage&var1=dir_new.png&var2=".theme_get_web_bgcolor()."&var3=100&var4=".theme_get_theme_name();
						$directories[$directories_cnt]['stat']='NEW';
					}else{
						$dir_pic="main.php?cmd=themeimage&var1=dir.png&var2=".theme_get_web_bgcolor()."&var3=100&var4=".theme_get_theme_name();
						$directories[$directories_cnt]['stat']='NORM';
					}
				if($pa_theme["dir_logo_style"]=="pic_thmb_size" || $pa_theme["dir_logo_style"]=="pic_other_size"){
					$dir_logo=db_select_all("files_".$rec["seq_files"],"use_for_logo=='true' && type=='I'");
					if(!$dir_logo){
						$dir_logo=db_select_all("files_".$rec["seq_files"],"visible=='true' && type=='I'");
					}
					if($dir_logo){
					   $dir_pic=get_thmb_dir_link($rec["path"].$dir_logo[0]["file_name"]);
					}else{
					   $dir_pic=get_thmb_dir_link("[NOPIC]");
					}
				}
				/*defining variable*/
				$directories[$directories_cnt]['link']="main.php?cmd=album&var1=".urlencode($var1.basename($rec['path']))."/";
				$directories[$directories_cnt]['logo']=$dir_pic;
				if($rec['alias']!=""){
					$directories[$directories_cnt]['name']=pa_html_decode($rec['alias']);
				}else{
					/*it is filename and should be converted*/
					$directories[$directories_cnt]['name']=conv_out(basename($rec['path']));
				}
				$directories[$directories_cnt]['desc']=pa_html_decode($rec['desc']);
				$directories[$directories_cnt]['width']=$pa_quality["thmb_size"]+$pa_theme["additional_thmb_width"];
				$directories[$directories_cnt]['height']=$pa_quality["thmb_size"]+$pa_theme["additional_thmb_height"];
						
				
				$directories_cnt++;
		
      }
     }
	   /*openning files*/
   	   if($start_with<0){
       		$start_with=0; /*just to be sure*/
       }
	   $filelist=get_sorted_file_list($dir_settings["seq_files"]);
       $qq=$pa_quality["thmb_size"]."_".$pa_quality["thmb_qual"];
       $qpic=$pa_quality["photo_size"]."_".$pa_quality["photo_qual"];
       $thumbnails=Array();
       $thumbnails_cnt=0;
	   if(is_array($filelist)){
		$fl=array_slice($filelist,$start_with,$number_of_thmbs);
	   }else{
		$fl=Array();
	   }
       foreach($fl as $key => $record){
	       	$file=$record['file_name'];
			if($record["type"]=="I"){
			    $thumbnails[$thumbnails_cnt]['thmb']=get_thmb_link($var1,$record);
			    $thumbnails[$thumbnails_cnt]['desc']=pa_html_decode($record["desc"]);
				$thumbnails[$thumbnails_cnt]['link']=get_imageview_link($var1,$file);
			    if($pa_theme["show_filenames"]=="true" && $thumbnails[$thumbnails_cnt]['desc']==""){
			       	$thumbnails[$thumbnails_cnt]['desc']=conv_out($file);
			    }
			}
			if($record["type"]=="V"){
			   $thumbnails[$thumbnails_cnt]['thmb']=get_thmb_link($var1,$record);
			   $thumbnails[$thumbnails_cnt]['desc']=pa_html_decode($record["desc"]);
	 	       $thumbnails[$thumbnails_cnt]['link']=get_image_link($var1,$file);
			    if($pa_theme["show_filenames"]=="true" && $thumbnails[$thumbnails_cnt]['desc']==""){
			       	$thumbnails[$thumbnails_cnt]['desc']=conv_out($file);
			    }
			}
			if($record["type"]=="A"){
				$thumbnails[$thumbnails_cnt]['thmb']=get_thmb_link($var1,$record);
			   $thumbnails[$thumbnails_cnt]['desc']=pa_html_decode($record["desc"]);
	 	       $thumbnails[$thumbnails_cnt]['link']=get_image_link($var1,$file);
			    if($pa_theme["show_filenames"]=="true" && $thumbnails[$thumbnails_cnt]['desc']==""){
			       	$thumbnails[$thumbnails_cnt]['desc']=conv_out($file);
			    }
			}
			if($record["type"]=="O"){
			   $thumbnails[$thumbnails_cnt]['thmb']=get_thmb_link($var1,$record);
			   $thumbnails[$thumbnails_cnt]['desc']=pa_html_decode($record["desc"]);
	 	       $thumbnails[$thumbnails_cnt]['link']=get_image_link($var1,$file);
			    if($pa_theme["show_filenames"]=="true" && $thumbnails[$thumbnails_cnt]['desc']==""){
			       	$thumbnails[$thumbnails_cnt]['desc']=conv_out($file);
			    }
			}
		   $thumbnails[$thumbnails_cnt]['width']=$pa_quality["thmb_size"]+$pa_theme["additional_thmb_width"];
	       $thumbnails[$thumbnails_cnt]['height']=$pa_quality["thmb_size"]+$pa_theme["additional_thmb_height"];
	       $thumbnails[$thumbnails_cnt]['view_count']=$record["view_count"];
	       $thumbnails[$thumbnails_cnt]['vote_count']=$record["vote_count"];
	       $thumbnails[$thumbnails_cnt]['vote_avg']=$record["vote_avg"];
	       $thumbnails[$thumbnails_cnt]['comment_count']=$record["comment_count"];
	       $thumbnails_cnt++;
		}

		
   	if ( sizeof($filelist)<=$start_with+$number_of_thmbs){
		//no next page
		$next_start_with=-1;
	}else{
		$next_start_with=$start_with+$number_of_thmbs;
	}
	
   	if ( $start_with==0){
		//no next page
		$previous_start_with=-1;
	}else{
	     $previous_start_with=$start_with-$number_of_thmbs;
	     if($previous_start_with<0){$previous_start_with=0;}
	}
	/*call theme function to generate page*/
	
	theme_generate_album_page($dir_path,$quality_links,$directories,$thumbnails,$new_thumbnails,$dir_long_desc,$next_start_with,$previous_start_with,$var1);
	   
	return true;
}

function get_dir_from_photo_var($var){
		$dir=dirname($var);
		if($dir!="."){
			$dir="/".dirname($var)."/";
			$dir=str_replace("//","/",$dir);
		}else{
			$dir="/";
		}
		return $dir;	
}

function translate_directory($dir){
	if ($dir=="\\" || $dir==".") $dir="";
	
	if(substr($dir,0,1)!="/"){
 		$dir="/".$dir;
	}
	if(substr($dir,-1,1)!="/"){
 		$dir=$dir."/";
	}
	return $dir;
}


function get_directory_settings($dir,$full=1){
	
	global $data_dir,$pa_setup;

	$dir=translate_directory($dir);
	if(!is_dir($pa_setup["album_dir"].$dir)){
		theme_generate_error_page();
		exit(0);
	}
	
	$inh_groups=Array();
	if(!db_select_exists("directory","path=='".prepdb($dir)."'")){
		// not found, first time visiting directory, do insert
		if($dir!="/"){
			//inheriting directory permissions for new directory.
			$up_dir=dirname($dir);
			if(substr($up_dir,-1,1)!="/"){
 				$up_dir=$up_dir."/";
			}	
			$rec=db_select_all("directory","path=='".prepdb($up_dir)."'");
			$grps=db_select_all("group");
			foreach($grps as $group){
				if(isset($rec[0]["groups"][$group["name"]])){
					$inh_groups[$group["name"]]=$rec[0]["seq_files"];
				}else{
					if(isset($rec[0]["inh_groups"][$group["name"]])){
						$inh_groups[$group["name"]]=$rec[0]["inh_groups"][$group["name"]];
					}
				}
			}
						
		}
		
		$seq_files=db_get_seq_nextval("seq_files");
		db_insert("directory",Array("path"=>$dir,"seq_files"=>$seq_files));
		db_update("directory","inh_groups=".var_export($inh_groups,true).";","seq_files==".$seq_files);
		
		db_create_table("files_$seq_files",Array(
			"file_name"=>"",
			"visible"=>"true",
			"desc"=>"",
			"long_desc"=>"",
			"params"=>"",
			"dir_logo"=>"true",
			"view_count"=>0,
			"vote_count"=>0,
			"vote_avg"=>0,
			"comment_count"=>0,
			"use_for_logo"=>"false",
			"file_time"=>"",
			"screenshot"=>"",
			"type"=>"I",
			"keywords"=>Array(),
			"photonotes"=>Array(),
			"order"=>""
		));
		db_create_table("comments_$seq_files",Array(
			"id"=>"",
			"file_name"=>"",
			"time"=>"",
			"name"=>"",
			"email"=>"",
			"text"=>"",
			"visible"=>"true"
		));

	}
	$rec=db_select_all("directory","path=='".prepdb($dir)."'");	
	if($full!=1){
		return Array($rec[0],null);
	}
	$seq_files=$rec[0]["seq_files"];
	//continue for files settings
	$changed=false;
	//load files from DB
	$files_db=db_select_all("files_$seq_files",null,true);
	//load files from Medium
	$dir_path=substr($dir,1);
	$files_hd=Array();
	if(file_exists($pa_setup["album_dir"].$dir_path)){
	    if ($dh = opendir($pa_setup["album_dir"].$dir_path)) {
	       while (($file = readdir($dh)) !== false) {
	           if( filetype($pa_setup["album_dir"].$dir_path. $file)=="file" || filetype($pa_setup["album_dir"].$dir_path. $file)=="link" ){
					$files_hd[$file]=filemtime($pa_setup["album_dir"].$dir_path. $file);
	           }
	       }
	       closedir($dh);
	    }
	}
	$where="";//for deleting files, first screenshots then not existing files
	//parse screenshots
	$scr_files=Array();
	
	foreach($files_hd as $fn => $t){
		if(is_image($fn)){
				if(isset($files_hd[substr($fn,0,strlen($fn)-4)])){
					$scr_files[substr($fn,0,strlen($fn)-4)]=$fn;
					if($where==""){
						$where="file_name=='".prepdb($fn)."'";
					}else{
						$where.=" || file_name=='".prepdb($fn)."'";
					}
				}
		}
	}
	//now delete not existing files from DB
	if(is_array($files_db)){
		foreach($files_db as $key => $record){
			if(!isset($files_hd[$record["file_name"]])){
				$changed=true;
				if($where==""){
					$where="file_name=='".prepdb($record["file_name"])."'";
				}else{
					$where.=" || file_name=='".prepdb($record["file_name"])."'";
				}
			}else{
				//names from database
				$files_db_names[$record["file_name"]]=$record["file_time"];
			}
		}
	}
	if($where !=""){
		db_delete("files_$seq_files",$where);
	}
	//reload of db files
	foreach($files_hd as $fn => $t){
		if(isset($scr_files[$fn])){
			$screenshot=$scr_files[$fn];
		}else{
			$screenshot="";
		}
		if(!isset($files_db_names[$fn])){
		//file is not in db, insert it as new
			if(is_image($fn)){
				//check if it is a screenshot of some other file, in this case, this file will not be inserted.
				if(!isset($files_hd[substr($fn,0,strlen($fn)-4)])){
					//is not screensot
					$changed=true;
					// check for iptc descriptions if needed
					$short_desc="";
					$long_desc="";
					$keywords=Array();
					if($pa_setup["use_iptc_desc"]=="true"){
						list($www,$hhh)=getimagesize($pa_setup["album_dir"].$dir_path.$fn,$info);
						if (isset($info["APP13"])) {
							$iptc = iptcparse($info["APP13"]);
							if(isset($iptc["2#105"])){
								$short_desc=$iptc["2#105"][0];
							}
							if(isset($iptc["2#120"])){
								$long_desc=str_replace("\r","<br/>",$iptc["2#120"][0]);
							}
							if(isset($iptc["2#025"])){
								$keywords=$iptc["2#025"];
							}
						}
					}
					db_insert("files_$seq_files",Array("file_name"=>$fn,"file_time"=>$t,"desc"=>$short_desc,"long_desc"=>$long_desc,"keywords"=>$keywords));
				}
			}else if(is_movie($fn)){
				//check for screenshot
				$changed=true;
				db_insert("files_$seq_files",Array("file_name"=>$fn,"file_time"=>$t,"type"=>"V","screenshot"=>$screenshot));
			}else if(is_audio($fn)){
				//check for screenshot
				$changed=true;
				db_insert("files_$seq_files",Array("file_name"=>$fn,"file_time"=>$t,"type"=>"A","screenshot"=>$screenshot));
			}else{
				//check for screenshot
				$changed=true;
				db_insert("files_$seq_files",Array("file_name"=>$fn,"file_time"=>$t,"type"=>"O","screenshot"=>$screenshot));
			}
		}else if ($files_db_names[$fn] != $t){
			//timestamp is changed , update the file
			$short_desc="";
			$long_desc="";
			$keywords_text=var_export(Array(),true);
			if(is_image($fn)){
					// check for iptc descriptions if needed
					if($pa_setup["use_iptc_desc"]=="true"){
						list($www,$hhh)=getimagesize($pa_setup["album_dir"].$dir_path.$fn,$info);
						if (isset($info["APP13"])) {
							$iptc = iptcparse($info["APP13"]);
							if(isset($iptc["2#105"])){
								$short_desc=$iptc["2#105"][0];
							}
							if(isset($iptc["2#120"])){
								$long_desc=str_replace("\r","<br/>",$iptc["2#120"][0]);
							}
							if(isset($iptc["2#025"])){
								$keywords_text=var_export($iptc["2#025"],true);
							}
						}
					}
				
				db_update("files_$seq_files","keywords=".$keywords_text.";file_time='".$t."';desc='".$short_desc."';long_desc='".$long_desc."';","file_name=='".prepdb($fn)."'");
			}else{		
				db_update("files_$seq_files","file_time='".$t."'; screenshot='$screenshot';","file_name=='".prepdb($fn)."'");
			}
		}else if( !is_image($fn)){
				db_update("files_$seq_files","file_time='".$t."'; screenshot='$screenshot';","file_name=='".prepdb($fn)."'");
		}
	}
	
	/*rereading of files*/
	if($changed){
		$files_db=db_select_all("files_$seq_files");
	}
	if($rec[0]["photo_count"]!=count($files_db)){
		db_update("directory","photo_count=".count($files_db).";","path=='".prepdb($dir)."'");
	}
	return Array($rec[0],$files_db);
}
	


function get_newest_photos($dir,$start,$p_count){
	global $pa_user,$pa_keywords,$pa_grants;
	$count=$start+$p_count;
	if(is_array($pa_keywords)){
		
		$res=get_search_photos($dir,$start,$p_count);
		if(count($res)>0){
			return $res;
		}else{
			$did_you_mean=pa_fulltext_get_did_you_mean();
			return $did_you_mean;	
		}
	}
	
	if ($dir=="\\" || $dir==".") $dir="";
	
	if(substr($dir,0,1)!="/"){
 		$dir="/".$dir;
	}
	if(substr($dir,-1,1)!="/"){
 		$dir=$dir."/";
	}
	$obj=get_cached_object("GNP",$dir.$count.md5(implode("_",$pa_keywords).implode("_",array_keys($pa_user["groups"]))));
	if($obj!=null){
		return $obj;
	}
	
	$func=db_create_order_by_function("file_time-,file_name-");
	$len=strlen($dir);
	$sorted=true;
	$where_clause="substr(path,0,$len)=='".prepdb($dir)."'";
	$where_groups="";
	if(!isset($pa_user["groups"]["superuser"])){
		$where_groups=" && (( (!is_array(groups) ||count(groups)==0 )&& (!is_array(inh_groups) || count(inh_groups)==0) )";
		foreach($pa_user["groups"] as $key => $val){
			$where_groups.=" || isset(groups['$key']) || isset(inh_groups['$key'])";
		}
		$where_groups.=")";
	}
	$where_clause.=$where_groups;

	$dirs=db_select_limit(1,$count,"directory",$where_clause,"newest_file_time-");
	$newest_files=Array();

	$where_clause="visible=='true'";

	if(is_array($dirs)){
		foreach($dirs as $dir_rec){
			if(count($newest_files)==$count){
				if($newest_files[$count-1]["file_time"]>$dir_rec["newest_file_time"]){
					//there are no newer files in further directories, so we can break up here
					break;
				}
			}
			$files=db_select_limit(1,$count,"files_".$dir_rec["seq_files"],$where_clause,"file_time-,file_name-");
			add_column_to_array($files,"path",$dir_rec["path"]);
			if(count($files)>0){
				$newest_files=array_merge($newest_files,$files);
				$sorted=false;
				if(count($newest_files)>$count){
					//sort and slice
					usort($newest_files,$func);
					$sorted=true;
					$newest_files=array_slice($newest_files,0,$count);
				}
			}
		}
	}
	if(!$sorted){
		usort($newest_files,$func);
	}
	unset($func);
	$newest_files=array_slice($newest_files,$start,$p_count);
	cache_object("GNP",$dir.$count.md5(implode("_",$pa_keywords).implode("_",array_keys($pa_user["groups"]))),$newest_files);
	return $newest_files;	
}

function scan_photos_directories($dir,$level=0){
global $pa_setup;
$album_dir=$pa_setup["album_dir"];
$sett=get_directory_settings($dir,1);
$rec=db_select_all("files_".$sett[0]["seq_files"],null,"file_time-");
if(isset($rec[0])){
	$max_file_time=$rec[0]["file_time"];
}else{
	$max_file_time=0;
}
//sumarising keywords
$keywords=Array();
if(is_array($rec)){
	foreach($rec as $key=>$record){
		$keywords=array_unique(array_merge($keywords,$record["keywords"]));
	}
}
$keywords_text=var_export($keywords,true);
db_update("directory","newest_file_time='".$max_file_time."';","seq_files==".$sett[0]["seq_files"]);
if (is_dir($album_dir.$dir)) {
    if ($dh = opendir($album_dir.$dir)) {
       while (($file = readdir($dh)) !== false) {
           if( filetype($album_dir.$dir.$file)=="dir" && $file!="." && $file !="..") {
			 $time=scan_photos_directories($dir.$file."/",$level+1);
			 if($time>$max_file_time){
			 	$max_file_time=$time;
			 }
		}
			
       }
       closedir($dh);
    }

}
db_update("directory","newest_file_time_with_subdirs='".$max_file_time."';","seq_files==".$sett[0]["seq_files"]);
db_commit(true);
if($level==0){
	//delete not existing directories from db
	if($dir==""){
		//only once and if the whole directory is scanned
		$rec=db_select_all("directory");
		
		foreach($rec as $record){
			if(!file_exists(substr($pa_setup["album_dir"],0,-1).$record["path"])){
				db_drop_table("files_".$record["seq_files"]);
				db_drop_table("comments_".$record["seq_files"]);
				db_delete("directory","seq_files==".$record["seq_files"]);
			}
		}
	}
	
	db_update("directory","photo_count_r=0;");
	$rec=db_select_all("directory");
	foreach($rec as $record){
		if($record["photo_count"]>0){
			db_update("directory","photo_count_r+=".$record["photo_count"].";","substr('".prepdb($record["path"])."',0,strlen(path))==path");
		}
	}	
	$t=time();
	db_update("setup","last_dir_scan=".$t.";");
	$pa_setup["last_dir_scan"]=$t;
	db_commit(true);
	//invalidate GNP cache
	pa_invalidate_object_cache("GNP");
}else{
	return $max_file_time;
}
// build fulltext index
pa_fulltext_rebuild();

}



/****************************************/
/*      THMB                            */
/****************************************/

function generate_thumb($var1,$var3){
  global $pa_setup,$pa_quality,$pa_theme;
  $sharp=true;
  if($pa_theme["dir_logo_style"]=="pic_other_size" && $var3=="DIR"){
	  $width = $pa_theme["dir_logo_size"];
	  $height = $pa_theme["dir_logo_size"];
	  $square = $pa_theme["dir_logo_square_thumbnail"];
	  $thmb_quality =$pa_theme["dir_logo_quality"];
  	
  }else{
	  $width = $pa_quality["thmb_size"];
	  $height = $pa_quality["thmb_size"];
	  $square = $pa_quality["square_thumbnails"];
	  $thmb_quality =$pa_quality["thmb_qual"];
  }
  $var1=stripslashes($var1);
  // Content type
  if(is_image($var1)){
  	$mime=get_mime($var1);
  	pa_send_header("Content-type: ".$mime);
  }else{
  	pa_send_header('Content-type: image/png'); // for movie.png and video.png
  }
  pa_send_header("Content-Disposition: filename=thmb_".conv_out_header(basename($var1),$character_set)." ");
  if($var1=="[movie]"){$var1="res/movie.png"; $sharp=false;}
  else if($var1=="[audio]"){$var1="res/audio.png"; $sharp=false;}
  else if($var1=="[file]"){$var1="res/file.png"; $sharp=false;}
  else if($var1=="[NOPIC]"){$var1="res/nopic.png"; $sharp=false;}
  else{$var1=$pa_setup["album_dir"].$var1;}
  // Get new dimensions
  list($width_orig, $height_orig) = getimagesize($var1);
  if($square=="true"){
  	if ($width_orig < $height_orig) {
  		$src_x=0;
  		$src_y=($height_orig-$width_orig)/2;
  		$height_orig=$width_orig;
  	}else{
  		$src_y=0;
  		$src_x=($width_orig-$height_orig)/2;
  		$width_orig=$height_orig;
  	}
  }else{
  	  //keep aspect ratio
  	  $src_x=0; $src_y=0;
	  if ($width && ($width_orig < $height_orig)) {
	     $width = ($height / $height_orig) * $width_orig;
	  } else {
	     $height = ($width / $width_orig) * $height_orig;
	  }
  }

  // Resample
  $image=imagecreatefrom($var1);

  $image_p = imagecreatetruecolor($width, $height);
  $bgcol=theme_get_bgcolor();
  $color = ImageColorAllocate( $image_p,$bgcol[0] ,$bgcol[1] ,$bgcol[2] );
  imagefill($image_p,0,0,$color);
  
  imagecopyresampled($image_p, $image, 0, 0, $src_x, $src_y, $width, $height, $width_orig, $height_orig);
  //$image_p=UnsharpMask($image_p,50,1,3);
  // Output
  //sharpening
  if($pa_quality["thmb_sharp_use"]=='true' && $sharp){
  	$image_p=UnsharpMask($image_p, $pa_quality["thmb_sharp_amount"], $pa_quality["thmb_sharp_radius"],$pa_quality["thmb_sharp_treshold"]);
  }
  image_same_type($var1,$image_p,$thmb_quality);
	
}
/****************************************/
/*      IMAGE                           */
/****************************************/
function get_resized_imagesize($var1){
global $pa_setup,$pa_quality;
  if(file_exists($pa_setup["album_dir"].$var1)){
  list($width_orig, $height_orig) = getimagesize($pa_setup["album_dir"].$var1);

  if( $pa_quality["photo_size"] > 0){

	$image_low_size=$pa_quality["photo_size"];
  	
  	if($pa_quality["resize_if_bigger"]=="true"){
  		if( ($width_orig <= $image_low_size && $pa_quality["resize_photo_to_fit"]=="width") ||
  			($height_orig <= $image_low_size && $pa_quality["resize_photo_to_fit"]=="height") ||
  			($width_orig <= $image_low_size && $height_orig <= $image_low_size && $pa_quality["resize_photo_to_fit"]=="both")
  		  ){
			  	return Array($width_orig,$height_orig,false);
  		  }
  	}
  	if($pa_quality["resize_photo_to_fit"]=="both"){
		$width=$image_low_size;
		$height=$image_low_size;
		// Get new dimensions
		if ($width_orig < $height_orig) {
		   $width = ($height / $height_orig) * $width_orig;
		} else {
		   $height = ($width / $width_orig) * $height_orig;
		}
  	}
  	if($pa_quality["resize_photo_to_fit"]=="width"){
  		$width=$image_low_size;
  		$height = ($width / $width_orig) * $height_orig;
  	}  	
  	if($pa_quality["resize_photo_to_fit"]=="height"){
  		$height=$image_low_size;
  	    $width = ($height / $height_orig) * $width_orig;
  	}  	
	return Array($width,$height,true);
  }else{
    	return Array($width_orig,$height_orig,false);
  }
  }
}
function generate_image($var1,$quality,$original=false){

 global $pa_quality,$pa_setup;
  $var1=stripslashes($var1);
  $m_time=filemtime($pa_setup["album_dir"].$var1);
  //$headers=getallheaders(); --not supported by others then apache
  if (isset( $_SERVER["HTTP_IF_MODIFIED_SINCE"] ) ){
	if ( date("D, d M Y H:i:s T",$m_time) == $_SERVER["HTTP_IF_MODIFIED_SINCE"] ) {
		pa_send_header('HTTP/1.0 304 Not Modified');
		exit; 
	}
  }


 if(is_image($var1)){
  // Content type
  pa_send_header("Last-Modified: ".date("D, d M Y H:i:s T",$m_time));
  $mime=get_mime($var1);
  pa_send_header("Content-type: ".$mime);
  pa_send_header("Content-Disposition: filename=".conv_out_header(basename($var1))." ");

  list($width_orig, $height_orig) = getimagesize($pa_setup["album_dir"].$var1);
  list($width,$height,$resize) = get_resized_imagesize($var1);
  if((!$original) && ($resize || is_file($pa_quality["watermark_file"]))){
  	
	if($resize){
		$image_p = imagecreatetruecolor($width, $height);
		$image = imagecreatefrom($pa_setup["album_dir"].$var1);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
	}else{
		$image_p = imagecreatefrom($pa_setup["album_dir"].$var1);
	}
	
	if(is_file($pa_quality["watermark_file"])){
		// should be placed a watermark
		list($width_wat,$height_wat) = getimagesize($pa_quality["watermark_file"]);
		$image_w=imagecreatefrom($pa_quality["watermark_file"]);
		
		$x_wat=$width/2-$width_wat/2;
		$y_wat=$height/2-$height_wat/2;
		
		if(strstr($pa_quality["watermark_position"],"L")){
			$x_wat=0;
		}
		if(strstr($pa_quality["watermark_position"],"R")){
			$x_wat=$width-$width_wat;
		}
		if(strstr($pa_quality["watermark_position"],"U")){
			$y_wat=0;
		}
		if(strstr($pa_quality["watermark_position"],"D")){
			$y_wat=$height-$height_wat;
		}
		imagecopy($image_p,$image_w,$x_wat,$y_wat,0,0,$width_wat,$height_wat);
		
	}
	 //$image_s=UnsharpMask($image_p, 20, 1,0);
	image_same_type($var1,$image_p,$pa_quality["photo_qual"]);
	return true; // cache it
  }else{
	pa_readfile($pa_setup["album_dir"].$var1);
	return false; //don't cache
  
  }
 }
 if(!is_image($var1)){
 	ob_end_clean();
	pa_send_header("Content-type: application/download; name=\"".basename($var1)."\"");
	pa_send_header("Content-Disposition: attachment; filename=\"".basename($var1)."\" ");
 	pa_send_header("Content-Length: ".filesize($pa_setup["album_dir"].$var1)." ");
	pa_send_header("Last-Modified: ".date("D, d M Y H:i:s T",$m_time)." " );
  	pa_send_header("Last-Modified: ".date("D, d M Y H:i:s T",$m_time)." " );
  	pa_readfile($pa_setup["album_dir"].$var1);
  	return false;
 }
}
/****************************************/
/*      DELTE CACHE                     */
/****************************************/

/****************************************/
/*      NEXT PREV IMAGE                 */
/****************************************/

function get_next_prev_image ($var1){
   global $pa_setup,$act_dir_sorting;
   $tmp="null";
       $dirname=dirname($var1);
       if($dirname=="."){
       	$dirname="";
       }else{
        $dirname.="/";
       }
   $dir_settings=get_directory_settings($dirname,0);
   $act_dir_sorting=$dir_settings[0]["sorting"];
   if($act_dir_sorting=='default'){
   	$act_dir_sorting=$pa_setup["default_sorting"];
   }
   $filelist=get_sorted_file_list($dir_settings[0]["seq_files"]);
   if(is_array($filelist) && sizeof($filelist)>0) {

   while(list($key,$file_array)=each($filelist)){
		$file=$file_array["file_name"];
		if ($file == basename($var1)){
			if($tmp!="null"){
				$names[]=$dirname.$tmp;
			}else{
				$names[]="null";
			}
		}
		if($tmp==basename($var1)){
				$names[]= $dirname.$file;
				break;
		}
	
		$tmp=$file;
   }
		if(sizeof($names)<2){
			$names[]="null";
		}
  }else{
	$names[]="null";
	$names[]="null";
  }
	return $names;
   
	
}


/****************************************/
/*      IMAGE VIEW                      */
/****************************************/

function generate_ecard_view($var1){
		global $pa_setup,$pa_lang;
		$rec=db_select_all("ecards","uid=='".$var1."'");
		if(isset($rec[0])){
			$var3="view_ecard";
			$var1=$rec[0]["image"];
			$time=time();
			if($rec[0]["picked_up"]=="false"){
				//update ecard as viewed
				db_update("ecards","picked_up='true';","uid=='".$rec[0]["uid"]."'");
				//send email to sender that the ecard was picked up
				$message=$pa_setup["ecard_picked_text"];
				$subject=$pa_setup["ecard_picked_subject"];
				$header = 'From: '.$rec[0]["to_email"] . "\r\n" .
						  'Reply-To: '.$rec[0]["to_email"]. "\r\n" .
						  'X-Mailer: PHP/' . phpversion() ."\r\n";
				$header .="Content-Type: text/plain;charset=\"{$pa_lang["character_set"]}\"\r\n";
				
				$message=str_replace("#FROM_NAME",$rec[0]["from_name"],$message);
				$message=str_replace("#TO_NAME",$rec[0]["to_name"],$message);
				$message=str_replace("#FROM_EMAIL",$rec[0]["from_email"],$message);
				$message=str_replace("#TO_EMAIL",$rec[0]["to_email"],$message);
				$message=str_replace("#TIME",date("H:i",$time),$message);
				$message=str_replace("#DATE",date("d.m.Y",$time),$message);
				$message=str_replace("#ECARD_ADRESS","main.php?cmd=ecardview&var1=".$rec[0]["uid"]."#ECARD",$message);
				$message=str_replace("#IMAGE_ADRESS","main.php?cmd=imageview&var1=".urlencode($var1),$message);
				 mail($rec[0]["from_email"],$subject,$message,$header);
			}
			generate_image_view($var1,$quality,$var3,false,$rec[0]);	
		}else{
			theme_generate_error_page();
		}

}
function generate_image_view($var1,$quality,$var3,$newest=false,$ecard=null){
global $pa_quality,$pa_setup,$pa_theme,$cmd;
	
	$var1_orig=stripslashes($var1);
	$var1=stripslashes($var1);
	

	//computing the $var if this is showing the newest pictures.
	if ($pa_theme["directory_style"]=="flowing"){
	      $number_of_thmbs=$pa_theme["maximum_photos_per_page"];
	}else{
	      $number_of_thmbs=$pa_theme["raster_dir_x"]*$pa_theme["raster_dir_y"];
	}  
	if($newest===true){
		if($var1<0) $var1=0;//just to be sure :)
		if($var1=="") $var1=0;
		if($var1==0){
			$start=0; $count=2; $position=0;
		}else{
			$start=$var1-1; $count=3; $position=1;
		}
		$newest_objects=get_newest_photos("/",$start,$count);
		
		$var1=substr($newest_objects[$position]["path"],1).$newest_objects[$position]["file_name"];
		
	}
    ////////////////////////////////////////////////////////////end newweest
    $qq=$pa_quality["photo_size"]."_".$pa_quality["photo_qual"];
    if(is_file($pa_quality["watermark_file"])){
    	$qq.="_".$pa_quality["watermark_file"]."_".$pa_quality["watermark_position"];
    }
    if(file_exists($pa_setup["album_dir"].$var1)){
		list($width_orig, $height_orig) = getimagesize($pa_setup["album_dir"].$var1,$info);
		if (isset($info["APP13"])) {
			if(function_exists("iptcparse")){
				$iptc = iptcparse($info["APP13"]);
			}
		}

		$sys_par["width"]=$width_orig;
		$sys_par["height"]=$height_orig;
		$sys_par["size"]=filesize($pa_setup["album_dir"].$var1);
		$sys_par["time"]=filemtime($pa_setup["album_dir"].$var1);
		$sys_par["name"]=conv_out(basename($var1));
		$sys_par["link"]="main.php?cmd=imageorig&var1=".urlencode($var1);
		// exif stuff
		if(function_exists("read_exif_data")){
			$info= read_exif_data($pa_setup["album_dir"].$var1);
			//var_dump($info);
			if(isset($info["FNumber"])){
				$f_func=create_function('','$fnum=round('.$info["FNumber"].',1);return $fnum;');
				$sys_par["exif_f"]=number_format($f_func(),1);
			}
			if(isset($info["FocalLength"])){
				$fl_func=create_function('','$fl=round('.$info["FocalLength"].',1);return $fl;');
				$sys_par["exif_fl"]=number_format($fl_func(),1);
			}
	  		$sys_par["exif_model"]=$info["Model"];
			if(isset($info["ExposureTime"])){
				$e_func=create_function('','$fnum='.$info["ExposureTime"].';return $fnum;');
				$time=$e_func();
				if($time>0.25){
					$sys_par["exif_exp_time"]=$time;
				}else{
					$sys_par["exif_exp_time"]="1/".(1/$time);	
				}
				
			}
	  		$sys_par["exif_iso"]=$info["ISOSpeedRatings"];
	  		if(isset($info["DateTimeOriginal"])){
	  			$sys_par["exif_datetime"]=exiftime_to_timestamp($info["DateTimeOriginal"]);
	  		}else{
	  			if(isset($info["DateTime"])){
	  				$sys_par["exif_datetime"]=exiftime_to_timestamp($info["DateTime"]);	  				
	  			}
	  		}
		}
  		//var_dump($info);
    }
	
	$dir_path[0]['name']=t('ID_PHOTO_DIR');
	$dir_path[0]['link']="main.php?cmd=album&var2=".$quality;

	$dirs=explode('/',$var1);
	$act_dir="";
	for($i=0;$i<count($dirs)-1;$i++){
		$act_dir.=$dirs[$i]."/";
		$ss=get_directory_settings($act_dir,0);
		if(strlen($ss[0]["alias"])>0){
			$dir_path[$i+1]['name']=pa_html_decode($ss[0]["alias"]);
		}else{
			$dir_path[$i+1]['name']=conv_out($dirs[$i]);
		}
		$dir_path[$i+1]['link']="main.php?cmd=album&var1=".urlencode($act_dir)."&var2=".$quality;
		
	}
	
	$qualities=db_select_all("quality","enabled=='true'"); // select all enabled qualities
	$quality_links=Array();
	if(count($qualities)>1){
		foreach($qualities as $key=>$val){
			$quality_links[]=Array("name"=>$val["name"],
								   "link"=>"main.php?cmd=setquality&var1=".$val["id"]."&var2=$cmd&var3=".urlencode($var1_orig).get_keyword_parameter_for_link(),
								   "actual" => ($val["id"]==$pa_quality["id"])?1:0
								   );
		}
	}
/*testing for next and previous image ..*/
if($newest===true){
	if($position==1){$prev_link="main.php?cmd=imageviewsearch&var1=".($var1_orig-1).get_keyword_parameter_for_link();}else{$prev_link="";}
	if(isset($newest_objects[$position+1])){$next_link="main.php?cmd=imageviewsearch&var1=".($var1_orig+1).get_keyword_parameter_for_link();}else{$next_link="";}
}else{
	list( $prev,$next) = get_next_prev_image($var1);
	if( $prev != "null" ) { 
		$prev_link = "main.php?cmd=imageview&var1=".urlencode($prev); 
	}else{
		$prev_link ="";
	};
	if( $next != "null" ) { 
		$next_link = "main.php?cmd=imageview&var1=".urlencode($next);
	}else{
		$next_link = "";
	};
}

list($width, $height) = get_resized_imagesize($var1);
$image_link="main.php?cmd=image&var1=".urlencode($var1)."&var2=".$qq;
$imageview_link="main.php?cmd=imageview&var1=".urlencode($var1);

    $sett_b=get_directory_settings(dirname("/".$var1),0);
    $sett=$sett_b[0];//dir settings
    
    $rec=db_select_all("files_".$sett["seq_files"],"file_name=='".prepdb(basename($var1))."'");
    $file=$rec[0];
   	$img_desc=$file["desc"];
    if($pa_theme["show_filenames"]=="true" && $img_desc==""){
    		$img_desc=conv_out(basename($var1));
    }
	$img_desc_long=$file["long_desc"];
	
      
 /* store typed comments*/
  if($var3=="send_ecard"){
 	$security_checked=true;
	if($pa_setup["antispam_code_enabled"]=="true"){
	 	$rec=db_select_all("anti_spam_codes","pic_seq==".$_POST["p_code_seq"]);
		if($rec[0]["code"]==$_POST["p_code_enter"]){
			$security_checked=true;
		}else{
			$security_checked=false;
		}
		db_delete("anti_spam_codes","pic_seq==".$_POST["p_code_seq"]);
	}
	if($security_checked){
			send_ecard($_POST["p_recipient_name"],$_POST["p_recipient_email"],
					   $_POST["p_sender_name"],$_POST["p_sender_email"],
					   $_POST["p_your_message"],$var1);
	 	}
 	}
	

 if($var3=="save_comment"){
 	$security_checked=true;
	if($pa_setup["antispam_code_enabled"]=="true"){
	 	$rec=db_select_all("anti_spam_codes","pic_seq==".$_POST["p_code_seq"]);
		if($rec[0]["code"]==$_POST["p_code_enter"]){
			$security_checked=true;
		}else{
			$security_checked=false;
		}
		db_delete("anti_spam_codes","pic_seq==".$_POST["p_code_seq"]);
	}
	if($security_checked){
	 	if(isset($_POST['p_text'])){
	 		if(strlen($_POST['p_name'])==0){
	 				$p_name="Anonymous";
	 		}else{
	 			  $p_name=$_POST['p_name'];
	 		}
	 		if( isset($_POST['p_name']))setcookie("comment_name",$_POST['p_name'],time()+60*60*24*365);
	 		if( isset($_POST['p_email']))setcookie("comment_email",$_POST['p_email'],time()+60*60*24*365);
	 		save_comment($var1,$_POST['p_text'],$p_name,$_POST['p_email'],time());
	 	}
 	}
 }
 if(substr($var3,0,15)=="delete_comment-"){
 	 update_stats("imageview",$var1,"comment","del");
 	  $id=substr($var3,15);
 	  delete_comment($var1,$id);
 }
$comments=get_comments($var1);

/*parameters*/
	$rec=db_select_all("photo_param");
	
	if($rec)foreach($rec as $param){
	 if($sett["show_parameters"]=="default" && $param["default_displayed"]=="true" ||
	   isset($sett["show_parameters_custom_id"][$param["id"]])
	  ){
		
		if($param["type"]=="user"){
			if(isset($file["params"][$param["id"]]) && strlen($file["params"][$param["id"]])>0 ){
				$parameters[$param["name"]]=$file["params"][$param["id"]];
			}elseif(isset($param["default"]) && strlen($param["default"])>0){
				$parameters[$param["name"]]=$param["default"];
			}
		}
		if($param["type"]=="userlov"){
			if(isset($file["params"][$param["id"]]) && $file["params"][$param["id"]]>=0 ){
				$parameters[$param["name"]]=$param["lov"][$file["params"][$param["id"]]];
			}elseif(isset($param["default_lov"]) && $param["default_lov"] >=0){
				$parameters[$param["name"]]=$param["lov"][$param["default_lov"]];
			}
		}
		if($param["type"]=="system"){
				/*"dim"=>"Picture dimensions",
				  "siz"=>"File size in KB",
				  "cdt"=>"Creation date of picture",
				  "fnm"=>"Filename",
				  "fnl"=>"Filename with fullsize download link",
				  "dwl"=>"Fullsize download link"*/
			switch($param["default_lov"]){
				case "siz":
					$parameters[$param["name"]]=t("ID_SYS_PAR_SIZ",round($sys_par["size"]/1024,1));
					break;
				case "dim":
					$parameters[$param["name"]]=t("ID_SYS_PAR_DIM",$sys_par["width"],$sys_par["height"]);
					break;
				case "fnm":
					$parameters[$param["name"]]=t("ID_SYS_PAR_FNM",$sys_par["name"]);
					break;
				case "fnl":
					$parameters[$param["name"]]=t("ID_SYS_PAR_FNL",$sys_par["link"],$sys_par["name"]);
					break;
				case "dwl":
					$parameters[$param["name"]]=t("ID_SYS_PAR_DWL",$sys_par["link"]);
					break;
				case "cdt":
					$parameters[$param["name"]]=t("ID_SYS_PAR_CDT",date($pa_setup["date_format"],$sys_par["time"]));
					break;
				case "exif_iso":
					if(isset($sys_par["exif_iso"]))
						$parameters[$param["name"]]=t("ID_SYS_PAR_EXIF_ISO",$sys_par["exif_iso"]);
					break;
				case "exif_f":
					if(isset($sys_par["exif_f"]))
						$parameters[$param["name"]]=t("ID_SYS_PAR_EXIF_F",$sys_par["exif_f"]);
					break;
				case "exif_fl":
					if(isset($sys_par["exif_fl"]))
						$parameters[$param["name"]]=t("ID_SYS_PAR_EXIF_FL",$sys_par["exif_fl"]);
					break;
				case "exif_model":
					if(isset($sys_par["exif_model"]))
						$parameters[$param["name"]]=$sys_par["exif_model"];
					break;
				case "exif_exp_time":
					if(isset($sys_par["exif_exp_time"]))
						$parameters[$param["name"]]=t("ID_SYS_PAR_EXIF_EXP_TIME",$sys_par["exif_exp_time"]);
					break;
				case "exif_datetime":
					if(isset($sys_par["exif_datetime"])){
						$parameters[$param["name"]]=date($pa_setup["date_format"],$sys_par["exif_datetime"]);
					}
					break;
				case "iptc_caption":
					if(isset($iptc["2#120"])){
						$parameters[$param["name"]]=$iptc["2#120"][0];
					}
					break;
				case "iptc_caption_writer":
					if(isset($iptc["2#122"])){
						$parameters[$param["name"]]=$iptc["2#122"][0];
					}
					break;
				case "iptc_headline":
					if(isset($iptc["2#105"])){
						$parameters[$param["name"]]=$iptc["2#105"][0];
					}
					break;
				case "iptc_spec_ins":
					if(isset($iptc["2#040"])){
						$parameters[$param["name"]]=$iptc["2#040"][0];
					}
					break;
				case "iptc_byline":
					if(isset($iptc["2#080"])){
						$parameters[$param["name"]]=$iptc["2#080"][0];
					}
					break;
				case "iptc_byline_title":
					if(isset($iptc["2#085"])){
						$parameters[$param["name"]]=$iptc["2#085"][0];
					}
					break;
				case "iptc_credits":
					if(isset($iptc["2#110"])){
						$parameters[$param["name"]]=$iptc["2#110"][0];
					}
					break;
				case "iptc_source":
					if(isset($iptc["2#115"])){
						$parameters[$param["name"]]=$iptc["2#115"][0];
					}
					break;
				case "iptc_object_name":
					if(isset($iptc["2#005"])){
						$parameters[$param["name"]]=$iptc["2#005"][0];
					}
					break;
				case "iptc_date":
					if(isset($iptc["2#055"])){
						$parameters[$param["name"]]=$iptc["2#055"][0];
					}
					break;
				case "iptc_city":
					if(isset($iptc["2#090"])){
						$parameters[$param["name"]]=$iptc["2#090"][0];
					}
					break;
				case "iptc_subloc":
					if(isset($iptc["2#092"])){
						$parameters[$param["name"]]=$iptc["2#092"][0];
					}
					break;
				case "iptc_state":
					if(isset($iptc["2#095"])){
						$parameters[$param["name"]]=$iptc["2#095"][0];
					}
					break;
				case "iptc_country":
					if(isset($iptc["2#101"])){
						$parameters[$param["name"]]=$iptc["2#101"][0];
					}
					break;
				case "iptc_otr":
					if(isset($iptc["2#103"])){
						$parameters[$param["name"]]=$iptc["2#103"][0];
					}
					break;
				case "iptc_category":
					if(isset($iptc["2#015"])){
						$parameters[$param["name"]]=$iptc["2#015"][0];
					}
					break;
				case "iptc_subcategory":
					if(isset($iptc["2#020"])){
						foreach($iptc["2#020"] as $key=>$value){
							if(isset($parameters[$param["name"]])){
								$parameters[$param["name"]]=$parameters[$param["name"]]." , ".$value;
							}else{
								$parameters[$param["name"]]=$value;
							}
						}
					}
					break;
				case "iptc_priority":
					if(isset($iptc["2#010"])){
						$parameters[$param["name"]]=$iptc["2#010"][0];
					}
					break;
				case "iptc_keyword":
					if(isset($iptc["2#025"])){
						foreach($iptc["2#025"] as $key=>$value){
							if(isset($parameters[$param["name"]])){
								$parameters[$param["name"]]=$parameters[$param["name"]]." , ". get_keyword_link($value);
							}else{
								$parameters[$param["name"]]=get_keyword_link($value);
							}
						}
					}
					break;
				case "iptc_copyright":
					if(isset($iptc["2#116"])){
						$parameters[$param["name"]]=$iptc["2#116"][0];
					}
					break;
			}
		}
	  }
	}

theme_generate_imageview_page($dir_path,$quality_links,$img_desc,$img_desc_long,$next_link,$prev_link,$image_link,$imageview_link,$width,$height,$var3,$comments,$parameters,$ecard,$file["photonotes"]);
}


function generate_theme($var1){
	if($var1=="style_css"){
		theme_get_style_css();
		return;
	}
}
?>
