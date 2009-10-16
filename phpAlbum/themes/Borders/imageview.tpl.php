<!DOCTYPE html 
              PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
              "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <!--phpalbum <?php echo $phpalbum_version?> -->
 <head>
   <title><?php echo $site_name;?></title>
   <link rel="stylesheet" href="<?php echo $stylesheet_link?>" type="text/css" />
   <?php if($photonotes_script){ ?>
   		<link rel="stylesheet" href="addons/photonotes/PhotoNotes.v1.css" type="text/css"/>
   		<script type="text/javascript" src="addons/photonotes/PhotoNotes.v1.js"></script>
   <?php } ?>
 </head>
 <body>
 <div class="body">

   <!-- global links -->

	<div style="float:right;">
	 	<?php  if($register_enabled){?>
			<a href="main.php?cmd=setup&var1=user&var2=register"><?php p("ID_REGISTER")?></a>
	 	<?php }?>
			<a style="margin-left:8px;" href="main.php?cmd=setup&var1=user&var2=register"><?php p("ID_REQUEST_PASSWD")?></a>
	</div>
   
   <!--logo-->

   <div><?php print $logo;?></div>

   <!--menu-->
	<?php  if($show_search_box) { ?>
		<div class="searchbox">
			<form method="get">
				<input class="login" type="text" size="20" name="keyword" value="<?php echo $search_text?>"/>
				<input class="login_btn" type="submit" value="<?php p("ID_SEARCH");?>"/>
				<input type="hidden" name="cmd" value="search"/>
			</form>
		</div>
	<?php  } ?>

	<div class="box" id="menu">
	   	<div style="float:right;">
		  <?php  foreach( $quality_links as $link){ ?>
	  		<?php  if ( $link['actual']) {?>
				<b><?php  print $link['name']; ?></b>&nbsp;&nbsp;		
			<?php  } else { ?>
				<a href="<?php  print $link['link']; ?>"><?php  print $link['name']; ?></a>&nbsp;&nbsp;		
			<?php  } ?>
		  <?php  } ?>
		  	<?php if($login_enabled && !$logged_in){?>
		  		<a href="<?php print $login_logout_link;?>"><?php print $login_logout_text?></a>&nbsp;
		  	<?php }?>	
		  	<?php if($logged_in){?>
		  		<a href="main.php?cmd=setup"><?php p("ID_SETUP");?>&nbsp;</a>
				<a href="main.php?cmd=album&logout"><?php p("ID_LOGOUT");?>&nbsp;</a>
		  	<?php }?>
		</div>
	    <?php if($login_clicked){ ?>
			<div style="clear:both; float:right;"><?php echo $login_dialog?></div>
		<?php }?>
   		<div>
	      <?php  if ( $return_home_url != "") { ?>
	      	      <a href="http://<?php echo $return_home_url?>"><?php  p("ID_HOME"); ?></a>&nbsp;|&nbsp;
	      <?php  } ?>
	      <?php  p('ID_ALBUM_NAME');?>
	      <?php  foreach( $dir_path as $num => $dir ) {?>
	 		<b>&nbsp;::&nbsp;&nbsp;</b><a href="<?php echo $dir['link']?>"><?php echo $dir['name']?></a>
	      <?php  } ?>
		</div>
	</div>	
 <div>
     <div class="box">
		<div class="boxhead"> 
		 	<?php if ($prev_link || $next_link) {?>
				<div style="float:right;">
			    <?php  if($prev_link){?>
			        <a class="me" href="<?php  print $prev_link; ?>"><?php p("ID_PREV");?></a>
			    <?php  }else{?>
			        <font class="te"><b><?php p("ID_PREV");?></b></font>
			    <?php }?>
			    &nbsp;&nbsp;&nbsp;
			    <?php  if($next_link){?>
			        <a class="me" href="<?php  print $next_link; ?>"><?php  p("ID_NEXT");?></a>
			    <?php  }else{?>
			        <font class="te"><b><?php p("ID_NEXT");?></b></font>
			    <?php }?>
			    &nbsp;&nbsp;&nbsp;
			    </div>
			<?php }?>
			<?php print $short_desc;?>
		</div>
			<!--main content-->
			<div style="text-align:center;">
				<span style="display:inline-block;">
			   <?php  if($display_shadows=="true"){ ?><div class="ishadow1"><div class="ishadow2"><div class="ishadow3"><div class="ishadow4"><div class="ishadow5"><?php }?>
				 <div style="padding:10px;background-color:white;">
				 <div class="imageContainer" id="ImageContainer">
			         <?php if($next_link){?><a class="me" href="<?php  print $next_link; ?>"><?php }?>
			         	<img class="view" alt="<?php  print $short_desc;?>" width="<?php  print $width;?>" height="<?php  print $height;?>" src="<?php  print $image;?>"/><br/>
			         <?php if($next_link){?></a><?php }?>
				 </div>
				 </div>
			   <?php  if($display_shadows=="true"){ ?></div></div></div></div></div><?php }?>
			    </span>
			  	<div>
				      <?php  if($short_desc){?>
				      	<b><font class="photodesc" size="5"><?php  print $short_desc;?></font></b>
				      <?php  } ?>
				      <?php  if($long_desc){?>
				      <font class="photodesc"><?php  print $long_desc?></font>
				      <?php  } ?>
				      <?php  print $parameters; ?>
				</div>
			 	<div class="spacer"/>
			</div>
	<?php  if($disable_bottom_nextprev=="false"){?>
	<div class="boxfoot"> 
			 	<?php if ($prev_link || $next_link) {?>
					<div style="float:right;">
				    <?php  if($prev_link){?>
				        <a class="me" href="<?php  print $prev_link; ?>"><?php p("ID_PREV");?></a>
				    <?php  }else{?>
				        <font class="te"><b><?php p("ID_PREV");?></b></font>
				    <?php }?>
				    &nbsp;&nbsp;&nbsp;
				    <?php  if($next_link){?>
				        <a class="me" href="<?php  print $next_link; ?>"><?php  p("ID_NEXT");?></a>
				    <?php  }else{?>
				        <font class="te"><b><?php p("ID_NEXT");?></b></font>
				    <?php }?>
				    &nbsp;&nbsp;&nbsp;
				    </div>
				<?php }?>
				&nbsp;
			</div>
	<?php  } ?>
</div>
</div>

<div align="left">
<?php  if( $post_ecard_link ){ ?>
<a class="me" href="<?php echo $post_ecard_link?>"><?php p("ID_WRITE_ECARD");?></a>&nbsp;&nbsp;&nbsp;&nbsp;
<?php  } ?>
<?php  if( $post_comment_link ){ ?>
	<a class="me" href="<?php echo $post_comment_link?>"><?php p("ID_ADD_COMMENT");?></a>
<?php  } ?>
<?php  print $ecards;   ?>
<?php  print $comments; ?>
</div>
<?php  if( $footer_message ) { ?>
	<table width="100%"><tr height="30"><td valign="bottom" align="center" width="100%">
		<?php  print $footer_message; ?>
		<!-- <font size="2">Powered by <a class="me"href="http://www.phpalbum.net">PHP Photo Album</font></a> -->
	</td></tr></table>
<?php  } ?>

</div>
<?php  if($tracking_code) { print $tracking_code; } ?>
<?php  if($photonotes_script) echo $photonotes_script;?>
<!--end of page -->
</body></html>
