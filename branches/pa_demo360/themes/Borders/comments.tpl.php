<table cellspacing="0" id="COMMENT">
<?php    if($adding_comment){ ?>
			<!-- dialog for adding comment-->
			<tr><td  colspan="2" align="left">
				 <form method="post" action="<?php echo $post_comment_link?>">
				 <table >
				  <tr><td colspan="2"><?php p("ID_NAME_EMAIL");?></td></tr>
				  <tr><td colspan="2"><?php p("ID_NAME");?><input name="p_name" size="25" value="<?php echo $comment_name?>"/>&nbsp;&nbsp;<?php p("ID_EMAIL");?>
				  	<input name="p_email" size="30" value="<?php echo $comment_email?>"/><td></tr>
				  <?php  if($antispam_enabled){?> 
				  	<tr><td nowrap><?php p("ID_ENTER_ANTISPAM_CODE")?>&nbsp;&nbsp;<input name="p_code_enter" size="10"/><input type="hidden" name="p_code_seq" value="<?php echo $code_seq?>"/></td><td align="left" width="100%"><IMG border="1" src="<?php print $code_image?>"/></td></tr>
				  <?php }?>
				 	<tr><td colspan="2"><?php p("ID_COMMENT_INSTR");?></td></tr>
				  <tr><td colspan="2"><textarea name="p_text" cols="70" rows="6"></textarea>
				  <tr><td colspan="2"><input type="submit" value="<?php p("ID_ADD_COMMENT");?>"/></td>
				 </table>
			</td></tr>
<?php    } ?>
<?php    if(is_array($messages)){?>
		<br/><br/>
				<?php foreach($messages as $comment){ ?>
	  			<tr><td><a href="mailto:<?php echo $comment['email']?>" class="me"><?php echo $comment['name']?></a></td><td nowrap width="100%" align="right">
	  				<?php  if ($delete_comment_link){?>
	  					<a class="me" href="<?php echo $delete_comment_link.$comment['id']?>"><?php p("ID_DELETE_COMMENT");?></a>&nbsp;&nbsp;&nbsp;
	  			  <?php }?>
	  			  <font class="desc"><?php echo date($pa_setup["date_format"],$comment['time'])?></font></td></tr>
	  		  <tr><td class="boxbody" colspan="2"><?php echo $comment['text']?></td></tr>
		      <tr height="10"><td colspan="2"></td></tr>
<?php       } ?>
<?php    } ?>
</table>

