<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <!--phpalbum <?php echo $phpalbum_version?> -->
 <head>
   <title><?php echo $site_name;?></title>
   <link rel="stylesheet" href="<?php echo $stylesheet_link?>" type="text/css" />
   <?php  if($slimbox_enabled){ ?> 
   		<link rel="stylesheet" href="addons/slimbox/css/slimbox.css" type="text/css" media="screen" />
   		<script type="text/javascript" src="addons/slimbox/js/mootools-release-1.11.js"></script>
   		<script type="text/javascript" src="addons/slimbox/js/slimbox.js"></script>
   <?php  } ?>
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
<!--main content-->
<?php if ($directories) {?>
<div id="directories" class="box">
	<div class="boxhead"><?php p("ID_ALBUMS");?></div>
    <div><?php echo $directories?></div>
</div>

<?php  } ?>

<div class="content">
   <?php  if($newest_thumbnails){ ?>
    <div class="box">
		<div class="boxhead"><?php p("ID_NEWEST_PICTURES");?></div>
	    <?php echo $newest_thumbnails?>
	</div>
   <?php  } ?>
	<div class="box">
		<div class="boxhead">
			<?php  if ( $previous_page_link || $next_page_link ) { ?>
				<div style="float:right;">
				    <?php  if($previous_page_link){?>
				        <a href="<?php echo $previous_page_link?>"><?php  p("ID_PREV_PAGE");?></a>
				    <?php  }else{?>
				        <b><?php  p("ID_PREV_PAGE"); ?></b>
				    <?php }?>
				    &nbsp;&nbsp;&nbsp;
				    <?php  if($next_page_link){?>
				        <a href="<?php echo $next_page_link?>"><?php  p("ID_NEXT_PAGE"); ?></a>
				    <?php  }else{?>
				        <b><?php  p("ID_NEXT_PAGE"); ?></b>
				    <?php }?>
				    &nbsp;&nbsp;&nbsp;
				</div>
			<?php  } ?>
			<?php p("ID_PICTURES");?>
		</div>

		<?php if($did_you_mean_link!=null){?>
			<div><h3>&nbsp;&nbsp;&nbsp;&nbsp;<?php p("ID_DID_YOU_MEAN"); echo $did_you_mean_link;?></h3></div>	
		<?php } ?>
		
		<?php  if($dir_long_desc){ ?>
			<div class="dir_desc"><?php echo $dir_long_desc?></div>
		<?php  } ?>
		<table><tr><td><?php  print $thumbnails; ?></td></tr></table>
	</div>
<?php  if($disable_bottom_nextprev=="false"){?>
<div>
	<?php  if ( $previous_page_link || $next_page_link ) { ?>
		    <?php  if($previous_page_link){?>
		        <a href="<?php echo $previous_page_link?>"><?php  p("ID_PREV_PAGE");?></a>
		    <?php  }else{?>
		        <b><?php  p("ID_PREV_PAGE"); ?></b>
		    <?php }?>
		    &nbsp;&nbsp;&nbsp;
		    <?php  if($next_page_link){?>
		        <a href="<?php echo $next_page_link?>"><?php  p("ID_NEXT_PAGE"); ?></a>
		    <?php  }else{?>
		        <b><?php  p("ID_NEXT_PAGE"); ?></b>
		    <?php }?>
		    &nbsp;&nbsp;&nbsp;
	    
<?php  } ?>
</div>
<?php }?>

<?php  if( $footer_message ) { ?>
	<div class="footer"><?php echo $footer_message; ?></div>
<?php  } ?>

</div>
<?php  if($tracking_code) { print $tracking_code; } ?>
</body></html>
