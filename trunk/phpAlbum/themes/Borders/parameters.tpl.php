<table class="menu" style="border:1px solid" cellpadding="2" cellspacing="0">
	<tr><td style="border:1px solid" colspan="2"><b><?php p("ID_PHOTO_DETAILS");?></b></td></tr>
	<?php  foreach($params as $name => $value){?>
		<tr><td style="border:1px solid" width="25%" align="left">&nbsp;<?php echo $name?>&nbsp;</td>
		<td style="border:1px solid">&nbsp;&nbsp;&nbsp;<b><?php echo $value?></b></td></tr>
	<?php }?>
</table>