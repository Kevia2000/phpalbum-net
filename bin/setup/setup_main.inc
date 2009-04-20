<table><tr><td><h6><?php p("ID_SETUP_MENU_MAIN");?></h6>
</td></tr>
<tr><td>
<form name="main_setup" action="main.php" method="post">
<div class="description"><?php p("ID_SETUP_DESC_MAIN")?></div>
<fieldset><legend><?php p("ID_SETUP_MENU_MAIN")?></legend><div class="form-item">
<!-- checking the form -->

<?php  if(!file_exists($pa_setup["album_dir"])){
		print_error(t("ID_MSG_DIR_NOT_EXISTS"),$pa_setup["album_dir"]);
		$album_dir_error=" error";
	 }
	 if(!file_exists($pa_setup["cache_dir"])){
		print_error(t("ID_MSG_DIR_NOT_EXISTS"),$pa_setup["cache_dir"]);
		$cache_dir_error=" error";
	 }else{
	 	 if(!pa_check_writable($pa_setup["cache_dir"])){
			print_error(t("ID_MSG_DIR_NOT_WRITABLE"),$pa_setup["cache_dir"]);
			$cache_dir_error=" error";
		 }
	 }
	 if(!$mbstring && $pa_lang["character_set"]!=$pa_setup["filesystem_charset"]){
	 	print_error(t("ID_MSG_MBSTRING_MISSING"));
	 	$charset_error=" error";
	 }
	 
?>

<!-- album_dir -->
<div class="form-item">
<label><?php p("ID_SETUP_ALBUM_DIR")?></label></br>
<input name="p_album_dir" size="30" class="form-text<?php echo $album_dir_error?>" value="<?php echo $pa_setup["album_dir"]?>">
<div class="description"><?php p("ID_SETUP_ALBUM_DIR_DESC")?></div>
</div>

<!-- cache_dir -->
<div class="form-item">
<label><?php p("ID_SETUP_CACHE_DIR")?></label></br>
<input name="p_cache_dir" size="30" class="form-text<?php echo $cache_dir_error?>" value="<?php echo $pa_setup["cache_dir"]?>">
<div class="description"><?php p("ID_SETUP_CACHE_DIR_DESC")?></div>
</div>

<!-- character_set -->
<div class="form-item">
<label><?php p("ID_SETUP_LANGUAGE")?></label></br>
<select name="p_language" class="form-text<?php echo $charset_error?>">
	<?php 	
		$recset=db_select_all("languages");
		foreach($recset as $rec){
			echo "<option value=\"".$rec["name"]."\" ";
			if($rec["name"]==$pa_setup["language"]){
				echo "selected";
			}
			echo ">".$rec["desc"]."</option>";
		}
	?>
</select>
<div class="description"><?php p("ID_SETUP_LANGUAGE_DESC")?></div>
</div>

<!-- character_set -->
<div class="form-item">
<label><?php p("ID_FILESYSTEM_CHARSET")?></label></br>
<select name="p_filesystem_charset" class="form-text<?php echo $charset_error?>">
	<?php
		$encodings=split(",","UCS-4,UCS-4BE,UCS-4LE,UCS-2,UCS-2BE,UCS-2LE,UTF-32,UTF-32BE,UTF-32LE,UTF-16,UTF-16BE,UTF-16LE,UTF-7,UTF7-IMAP,UTF-8,ASCII,EUC-JP,SJIS,eucJP-win,SJIS-win,ISO-2022-JP,JIS,ISO-8859-1,ISO-8859-2,ISO-8859-3,ISO-8859-4,ISO-8859-5,ISO-8859-6,ISO-8859-7,ISO-8859-8,ISO-8859-9,ISO-8859-10,ISO-8859-13,ISO-8859-14,ISO-8859-15,byte2be,byte2le,byte4be,byte4le,BASE64,HTML-ENTITIES,7bit,8bit,EUC-CN,CP936,HZ,EUC-TW,CP950,BIG-5,EUC-KR,CP949,ISO-2022-KR,CP1251,CP1252,IBM866,KOI8-R"); 	
		foreach($encodings as $rec){
			echo "<option value=\"".$rec."\" ";
			if($rec==$pa_setup["filesystem_charset"]){
				echo "selected";
			}
			echo ">".$rec."</option>";
		}
	?>
</select>
<div class="description"><?php p("ID_FILESYSTEM_CHARSET_DESC")?></div>
</div>
<!-- site-name -->
<div class="form-item">
<label><?php p("ID_SETUP_SITE_NAME")?></label></br>
<input name="p_site_name" class="form-text" value="<?php echo prepit($pa_setup["site_name"])?>">
<div class="description"><?php p("ID_SETUP_SITE_NAME_DESC")?></div>
</div>

<!-- return_home_url -->
<div class="form-item">
<label><?php p("ID_SETUP_HOME_URL")?></label></br>
<input name="p_return_home_url" class="form-text" value="<?php echo $pa_setup["return_home_url"]?>">
<div class="description"><?php p("ID_SETUP_HOME_URL_DESC")?></div>
</div>

<!-- new_DIR_INDIC -->
<div class="form-item">
<label><?php p("ID_SETUP_NEW_DIR_INDIC")?></label></br>
<input name="p_new_dir_indic" class="form-text" value="<?php echo $pa_setup["new_dir_indic"]?>">
<div class="description"><?php p("ID_SETUP_NEW_DIR_INDIC_DESC")?></div>
</div>

<!-- Date Format -->
<div class="form-item">
<label><?php p("ID_SETUP_DATE_FORMAT")?></label></br>
<input name="p_date_format" class="form-text" value="<?php echo $pa_setup["date_format"]?>">
<div class="description"><?php p("ID_SETUP_DATE_FORMAT_DESC")?></div>
</div>

<!-- ftp server -->
<div class="form-item">
<label><?php p("ID_SETUP_FTP_SERVER")?></label></br>
<input name="p_ftp_server" class="form-text" value="<?php echo $pa_setup["ftp_server"]?>">
<div class="description"><?php p("ID_SETUP_FTP_SERVER_DESC")?></div>
</div>

<!-- return_home_url -->
<div class="form-item">
<label><?php p("ID_SETUP_FTP_PHOTO_DIR")?></label></br>
<input name="p_ftp_server_photos_dir" class="form-text" value="<?php echo $pa_setup["ftp_server_photos_dir"]?>">
<div class="description"><?php p("ID_SETUP_FTP_PHOTO_DIR_DESC")?></div>
</div>

<!-- default_sorting -->
<div class="form-item">
<label><?php p("ID_SETUP_DEFAULT_SORT")?></label></br>
		<SELECT class="form-text" name="p_default_sorting">
			<?php 
				$srt=get_all_sortings();
				foreach($srt as $key => $sort){
					if($key!="default"){
						if($key==$pa_setup["default_sorting"]){
						  echo "<OPTION selected value=\"$key\">$sort</OPTION>";
						}else{
						  echo "<OPTION value=\"$key\">$sort</OPTION>";
						}
					}
				}
					?>
				</SELECT>
<div class="description"><?php p("ID_SETUP_DEFAULT_SORT_DESC")?></div>
</div>

<!-- scan_iptc -->
<div class="form-item">
<input type="checkbox" name="p_use_iptc_desc" <?php  if($pa_setup["use_iptc_desc"]=="true"){echo "checked";}?>><label><?php p("ID_SETUP_USE_IPTC_DESC")?></label></input></br>
<div class="description"><?php p("ID_SETUP_USE_IPTC_DESC_DESC")?></div>
<div>

<!-- return_home_url -->
<div class="form-item">
<label><?php p("ID_SETUP_TRACKING_CODE")?></label><br/>
<textarea cols="80" rows="5" name="p_tracking_code" ><?php echo $pa_setup["tracking_code"]?></textarea>
<div class="description"><?php p("ID_SETUP_TRACKING_CODE_DESC")?></div>
</div>

</div>
</fieldset>
<input type="hidden" name="cmd" value="setup"/>
<input type="hidden" name="var1" value="main"/>
<input type="hidden" name="var2" value="save"/>
<input type="submit" class="form-submit" value="<?php p("ID_SETUP_SAVE_CONFIG")?>"  />
<input type="reset" class="form-submit" value="<?php p("ID_SETUP_RESET_CONFIG")?>"  />
</form>
</td></tr>
</table>       
