<table><tr><td><h6><?php p("ID_SETUP_MENU_SEARCH");?></h6>
</td></tr>
<tr><td>
<form name="main_setup" action="main.php" method="post">
<div class="description"><?php p("ID_SETUP_DESC_SEARCH")?></div>
<fieldset><legend><?php p("ID_SETUP_MENU_SEARCH")?></legend><div class="form-item">

<div class="form-item">
	<label><?php p("ID_SETUP_INDEX_KEYWORDS")?></label><br/>
	<input type="checkbox" name="p_index_keywords" <?php if($pa_setup["index_keywords"]=="true"){echo "checked";}?>">
	<div class="description"><?php p("ID_SETUP_INDEX_KEYWORDS_DESC")?></div>
</div>

<div class="form-item">
	<label><?php p("ID_SETUP_INDEX_SHORT_DESC")?></label><br/>
	<input type="checkbox" name="p_index_short_desc" <?php if($pa_setup["index_short_desc"]=="true"){echo "checked";}?>">
	<div class="description"><?php p("ID_SETUP_INDEX_SHORT_DESC_DESC")?></div>
</div>

<div class="form-item">
	<label><?php p("ID_SETUP_INDEX_LONG_DESC")?></label><br/>
	<input type="checkbox" name="p_index_long_desc" <?php if($pa_setup["index_long_desc"]=="true"){echo "checked";}?>">
	<div class="description"><?php p("ID_SETUP_INDEX_LONG_DESC_DESC")?></div>
</div>

<div class="form-item">
	<label><?php p("ID_SETUP_INDEX_FILENAMES")?></label><br/>
	<input type="checkbox" name="p_index_filenames" <?php if($pa_setup["index_filenames"]=="true"){echo "checked";}?>">
	<div class="description"><?php p("ID_SETUP_INDEX_FILENAMES_DESC")?></div>
</div>

<div class="form-item">
	<label><?php p("ID_SETUP_INDEX_DIRNAMES")?></label><br/>
	<input type="checkbox" name="p_index_directory_names" <?php if($pa_setup["index_directory_names"]=="true"){echo "checked";}?>">
	<div class="description"><?php p("ID_SETUP_INDEX_DIRNAMES_DESC")?></div>
</div>

<div class="form-item">
	<label><?php p("ID_SETUP_INDEX_DID_YOU_MEAN")?></label><br/>
	<input type="checkbox" name="p_index_did_you_mean" <?php if($pa_setup["index_did_you_mean"]=="true"){echo "checked";}?>">
	<div class="description"><?php p("ID_SETUP_INDEX_DID_YOU_MEAN_DESC")?></div>
</div>

<div class="form-item">
<label><?php p("ID_SETUP_INDEX_STOPWORDS")?></label></br>
<textarea cols="80" rows="5" name="p_index_stopwords" ><?php echo $pa_setup["index_stopwords"]?></textarea>
<div class="description"><?php p("ID_SETUP_INDEX_STOPWORDS_DESC")?></div>
</div>

</div>
</fieldset>
<input type="hidden" name="cmd" value="setup"/>
<input type="hidden" name="var1" value="search"/>
<input type="hidden" name="var2" value="save"/>
<input type="submit" class="form-submit" value="<?php p("ID_SETUP_SAVE_CONFIG")?>"  />
<input type="reset" class="form-submit" value="<?php p("ID_SETUP_RESET_CONFIG")?>"  />
</form>
</td></tr>
</td></tr>
</table>