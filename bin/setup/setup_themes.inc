<table><tr><td><h6><?php p("ID_SETUP_MENU_THEMES");?></h6>
</td></tr>
<tr><td>
<form name="main_setup" action="main.php" method="post">
<div class="description"><?php p("ID_SETUP_DESC_THEMES")?></div>
<!-- choose theme -->
<div class="form-item">
<label><?php p("ID_SETUP_THEME")?></label></br>
   <SELECT name="p_theme" onchange="submit();">
   	<?php 
	$themes=get_themes();
	asort($themes);
   	foreach($themes as $num => $dir){
		if($dir==$pa_setup["site_theme"]){
		  echo "<OPTION selected value=\"$dir\">$dir</OPTION>";
		}else{
		  echo "<OPTION value=\"$dir\">$dir</OPTION>";
		}
	}
	?>
   </SELECT>
<div class="description"><?php p("ID_SETUP_THEME_DESC")?></div>
</div>
<fieldset><legend><?php p("ID_SETUP_THEME_SETTINGS")?> - <b><?php echo $pa_setup["site_theme"]?></b></legend><div class="form-item">
<!-- checking the form -->
<?php  if($pa_theme["logo_path"]){
	if(!file_exists($pa_theme["logo_path"])){
		print_error(t("ID_MSG_FILE_NOT_EXISTS"),$pa_theme["logo_path"]);
		$logo_path_error=" error";
	 }
}
?>


<!-- logo_style -->
<div class="form-item">
<label><?php p("ID_SETUP_LOGO_STYLE")?></label></br>
		<SELECT name="p_logo_style">
			<?php 
			$styles=theme_get_logo_styles();
			asort($styles);
		   	foreach($styles as $num => $style){
				if($style==$pa_theme["logo_style"]){
				  echo "<OPTION selected value=\"$style\">$style</OPTION>";
				}else{
				  echo "<OPTION value=\"$style\">$style</OPTION>";
				}
			}
			?>
		</SELECT>
<div class="description"><?php p("ID_SETUP_LOGO_STYLE_DESC")?></div>
</div>

		
<!-- logo_path -->
<div class="form-item">
<label><?php p("ID_SETUP_LOGO_PATH")?></label></br>
<input name="p_logo_path" size="30" class="form-text<?php echo $logo_path_error?>" value="<?php echo $pa_theme["logo_path"]?>">
<div class="description"><?php p("ID_SETUP_LOGO_PATH_DESC")?></div>
</div>

<!-- logo_text -->
<div class="form-item">
<label><?php p("ID_SETUP_LOGO_TEXT")?></label></br>
<input name="p_logo_text" size="30" class="form-text" value="<?php echo prepit($pa_theme["logo_text"])?>">
<div class="description"><?php p("ID_SETUP_LOGO_TEXT_DESC")?></div>
</div>

<!-- show_filenames -->
<div class="form-item">
<input type="checkbox" name="p_show_filenames" <?php  if($pa_theme["show_filenames"]=="true"){echo "checked";}?>><label><?php p("ID_SETUP_SHOW_FILENAMES")?></label></input></br>
<div class="description"><?php p("ID_SETUP_SHOW_FILENAMES_DESC")?></div>
<div>

<!-- show_filenames -->
<div class="form-item">
<input type="checkbox" name="p_disable_bottom_nextprev" <?php  if($pa_theme["disable_bottom_nextprev"]=="true"){echo "checked";}?>><label><?php p("ID_SETUP_DISABLE_BOTTOM_NEXTPREV")?></label></input></br>
<div class="description"><?php p("ID_SETUP_DISABLE_BOTTOM_NEXTPREV_DESC")?></div>
<div>

<!-- show_search_box -->
<div class="form-item">
<input type="checkbox" name="p_show_search_box" <?php  if($pa_theme["show_search_box"]=="true"){echo "checked";}?>><label><?php p("ID_SETUP_SHOW_SEARCH_BOX")?></label></input></br>
<div class="description"><?php p("ID_SETUP_SHOW_SEARCH_BOX_DESC")?></div>
<div>

<!-- logo_style -->
<div class="form-item">
<label><?php p("ID_SETUP_DIR_LOGO_STYLE")?></label></br>
		<SELECT name="p_dir_logo_style" onchange="submit();">
	            <OPTION value="logo" <?php if($pa_theme["dir_logo_style"]=="logo") echo "selected";?>><?php p("ID_SETUP_DIR_LOGO_STYLE_LOGO");?></OPTION>;
	            <OPTION value="pic_thmb_size" <?php if($pa_theme["dir_logo_style"]=="pic_thmb_size") echo "selected";?>><?php p("ID_SETUP_DIR_LOGO_STYLE_PIC1");?></OPTION>;
	            <OPTION value="pic_other_size" <?php if($pa_theme["dir_logo_style"]=="pic_other_size") echo "selected";?>><?php p("ID_SETUP_DIR_LOGO_STYLE_PIC2");?></OPTION>;
		</SELECT>
<div class="description"><?php p("ID_SETUP_DIR_LOGO_STYLE_DESC")?></div>
</div>
<?php  if($pa_theme["dir_logo_style"]=="pic_other_size"){?>
	<div class="form-item">
	  	<label><?php p("ID_SETUP_QUALITY_THMB")?></label><br/>
	  	<input class="form-text" size="6" name="p_dir_logo_size" value="<?php echo $pa_theme["dir_logo_size"]?>"></input>&nbsp;/&nbsp;
		<input class="form-text" size="6" name="p_dir_logo_quality" value="<?php echo $pa_theme["dir_logo_quality"]?>"></input>&nbsp;&nbsp;<input type="checkbox" name="p_dir_logo_square_thumbnail" <?php  if($pa_theme["dir_logo_square_thumbnail"]=="true"){echo "checked";}?>><?php p("ID_SETUP_SQUARE_THMB")?></input></br>
		<div class="description"><?php p("ID_SETUP_QUALITY_THMB_DESC")?></div>
	</div>
		
<?php }?>

<table width="100%"><tr><td width="100%">
<fieldset><legend><?php p("ID_SETUP_THEME_BORDERS")?></legend><div class="form-item">
	<div class="form-item">
		<label><?php p("ID_SETUP_THEME_PIC_BORDER_SIZE")?></label></br>
		<input name="p_picture_border_size" size="10" class="form-text" value="<?php echo $pa_theme["picture_border_size"]?>">
		<div class="description"><?php p("ID_SETUP_THEME_PIC_BORDER_SIZE_DESC")?></div>
	</div>
	<div class="form-item">
		<label><?php p("ID_SETUP_THEME_THMB_BORDER_SIZE")?></label></br>
		<input name="p_thumbnail_border_size" size="10" class="form-text" value="<?php echo $pa_theme["thumbnail_border_size"]?>">
		<div class="description"><?php p("ID_SETUP_THEME_THMB_BORDER_SIZE_DESC")?></div>
	</div>
	<!-- display shadows -->
	<div class="form-item">
	<input type="checkbox" name="p_display_shadows" <?php  if($pa_theme["display_shadows"]=="true"){echo "checked";}?>><label><?php p("ID_SETUP_THEME_DISPLAY_SHADOWS")?></label></input></br>
	<div class="description"><?php p("ID_SETUP_THEME_DISPLAY_SHADOWS_DESC")?></div>
	<div>
</fieldset>
</td></tr></table>

<div class="form-item">
	<label><?php p("ID_SETUP_THEME_THUMBNAILS_STYLE")?></label>
	<table><tr><td valign="top" width="50%">
	
	<fieldset><legend><?php p("ID_SETUP_THEME_FLOWING_STYLE")?></legend><div class="form-item">
		<table><tr><td><img src="res/flowing.png" /></td><td width="100%">
			<div class="form-item">
				<input type="radio" value="flowing" name="p_directory_style" <?php if($pa_theme["directory_style"]=="flowing"){echo "checked";}?> /><?php p("ID_SETUP_THEME_FLOWING_STYLE")?>
			</div>
			<!-- logo_text -->
			<div class="form-item"></td></tr>
			<tr><td colspan="2">
				<label><?php p("ID_SETUP_MAX_PHOTO_PER_PAGE")?></label></br>
				<input name="p_maximum_photos_per_page" size="10" class="form-text" value="<?php echo $pa_theme["maximum_photos_per_page"]?>">
				<div class="description"><?php p("ID_SETUP_MAX_PHOTO_PER_PAGE_DESC")?></div>
		</td></tr>
			<tr><td colspan="2">
				<label><?php p("ID_SETUP_ADD_THMB_HEIGHT")?></label></br>
				<input name="p_additional_thmb_height" size="10" class="form-text" value="<?php echo $pa_theme["additional_thmb_height"]?>">
		</td></tr>
		<tr><td colspan="2">
				<label><?php p("ID_SETUP_ADD_THMB_WIDTH")?></label></br>
				<input name="p_additional_thmb_width" size="10" class="form-text" value="<?php echo $pa_theme["additional_thmb_width"]?>">
				<div class="description"><?php p("ID_SETUP_ADD_THMB_HEIGHT_WIDTH_DESC")?></div>
		</td></tr></table>
	</fieldset>
	</td><td valign="top" width="50%">
	<fieldset><legend><?php p("ID_SETUP_THEME_RASTER_STYLE")?></legend><div class="form-item">
		<table><tr><td><img src="res/raster.png" /></td><td width="100%">
			<div class="form-item">
				<input type="radio" value="raster" name="p_directory_style" <?php if($pa_theme["directory_style"]=="raster"){echo "checked";}?> /><?php p("ID_SETUP_THEME_RASTER_STYLE")?>
			</div></td></tr>
			<tr><td colspan="2">
				<label><?php p("ID_SETUP_RASTER_SIZE")?></label></br>
				<input name="p_raster_dir_x" size="10" class="form-text" value="<?php echo $pa_theme["raster_dir_x"]?>">&nbsp;/&nbsp;
				<input name="p_raster_dir_y" size="10" class="form-text" value="<?php echo $pa_theme["raster_dir_y"]?>">
				<div class="description"><?php p("ID_SETUP_RASTER_SIZE_DESC")?></div>
				</div>
			
		</td></tr></table>
	</fieldset>
	</td></tr></table>
</div>

<div class="form-item">
	<fieldset><legend><?php p("ID_SETUP_THEME_CUSTOM_PARAMETERS")?></legend>
		<?php  foreach($cfg["parameter"] as $key=>$param){ if($param["type"]!="color"){ ?>
			<?php if($param["type"]=="text"){ ?>
				<div class="form-item">
					<label><?php echo $param["desc"]?></label></br>
					<input name="p_cs_<?php echo $key?>" size="<?php echo $param["length"]?>" class="form-text" value="<?php echo $pa_theme["custom_parameters"][$key]?>">
					<div class="description"><?php echo $param["help"]?></div>
				</div>
			<?php }?>
			<?php if($param["type"]=="checkbox"){ ?>
				<div class="form-item">
					<input type="checkbox" name="p_cs_<?php echo $key?>" class="form-text" <?php  if($pa_theme["custom_parameters"][$key]==$param["checked"]){echo "checked";}?>>
					<label><?php echo $param["desc"]?></label></br>
					<div class="description"><?php echo $param["help"]?></div>
				</div>
			<?php }?>
			<?php if($param["type"]=="combobox"){ ?>
				<div class="form-item">
					<label><?php echo $param["desc"]?></label></br>
					<select name="p_cs_<?php echo $key?>">
						<?php  foreach ($param["list"] as $pos => $option){
							if($pa_theme["custom_parameters"][$key]==$option["value"]){?>
								<option selected value="<?php echo $option["value"]?>"><?php echo $option["desc"]?></option>
							<?php }else{?>
								<option value="<?php echo $option["value"]?>"><?php echo $option["desc"]?></option>
							<?php }?>
						<?php }?>
					</select>
					<div class="description"><?php echo $param["help"]?></div>
				</div>
			<?php }?>
		<?php }}?>
	
	
	</fieldset>
</div>

	<a href="main.php?cmd=setup&var1=themes&var2=add_color"><img border="0" src="res/new.png" /><?php p("ID_SETUP_ADD_COLOR_MAP")?></a>
	<div class="form-item">
	<fieldset><legend><?php p("ID_SETUP_COLOR_SETTINGS")?>
	   <SELECT name="p_color_map" onchange="submit();">
	   	<?php 
		$maps=db_select_all("color_map","theme=='".$pa_theme["name"]."'");
	   	foreach($maps as $num => $color){
			if($pa_color_map["id"]==$color["id"]){
			  echo "<OPTION selected value=\"".$color["id"]."\">".$color["name"]."</OPTION>";
			}else{
			  echo "<OPTION value=\"".$color["id"]."\">".$color["name"]."</OPTION>";
			}
		}
		?>
	   </SELECT>
	   
	</legend><div class="form-item">
	<!-- name -->
	
	<div class="form-item">
	<label><?php p("ID_SETUP_COLOR_NAME")?></label></br>
	<input name="p_color_name" size="30" class="form-text" value="<?php echo prepit($pa_color_map["name"])?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php  if (count($maps)>1){ ?><a href="main.php?cmd=setup&var1=themes&var2=del_color&var3=<?php echo $pa_color_map["id"]?>" class="red"><img border="0" src="res/red_x.png" /><?php p("ID_SETUP_COLOR_DELETE")?></a> <?php }?>
	<div class="description"><?php p("ID_SETUP_COLOR_NAME_DESC")?></div>
	</div>
	<div class="form-item">
	<?php  foreach($cfg[parameter] as $name =>$value) { if($value["type"]=="color"){?>
			<div nowrap class="form-item" style="float: left; width: 130px; padding: 5px;">
				<label><?php echo $value["desc"]?></label><br />
				<input  name="p_cs_<?php echo $name?>" style="width: 130px;" class="form-text" value="<?php echo $pa_colors[$name]?>" onKeyUp="document.getElementById('<?php echo $name?>').style.backgroundColor=('#'+this.value);"></input>
				<div class="description"><?php echo $value["help"]?></div>
				<div id="<?php echo $name?>" style="border: 1px solid #888; background-color: #<?php echo $pa_colors[$name]?>; width: 130px; height: 50px;"/>
				</div>
			</div>
	<?php }}?>
	</div>
		
	</div></fieldset>
</div>


</div>
</fieldset>


<input type="hidden" name="cmd" value="setup"/>
<input type="hidden" name="var1" value="themes"/>
<input type="hidden" name="var2" value="save"/>
<input type="submit" class="form-submit" value="<?php p("ID_SETUP_SAVE_CONFIG")?>"  />
<input type="reset" class="form-submit" value="<?php p("ID_SETUP_RESET_CONFIG")?>"  />
</form>
</td></tr>
</table>       
