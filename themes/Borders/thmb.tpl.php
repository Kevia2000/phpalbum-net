<div class="thmb">
<table style="margin:auto"><tr><td>
   <?php  if($display_shadows=="true"){ ?><div class="shadow1"><div class="shadow2"><div class="shadow3"><div class="shadow4"><div class="shadow5"><?php }?>
		<a href="<?php echo $image_view_link?>" title="<?php echo $image_short_desc?>" rel="lightbox[pic]"><img alt="<?php $image_short_desc?>" class="thmb" src="<?php echo $thmb_link?>"/></a>
   <?php  if($display_shadows=="true"){ ?></div></div></div></div></div><?php }?>
</td></tr></table>   
   <?php  if($image_short_desc){ ?>
  	<div class="row"><a href="<?php echo $image_view_link?>"><?php echo $image_short_desc?></a></div>
  <?php }?>
  <?php if(isset($view_count)){ ?>
   	<div class="row"><?php p("ID_MSG_VIEW_COUNT",$view_count);?></div>
  <?php }?>
  <?php if(isset($comment_count)){ ?>
   	<div class="row"><?php p("ID_MSG_COMMENT_COUNT",$comment_count);?></div>
  <?php }?>
</div>
