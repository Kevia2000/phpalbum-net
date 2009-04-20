<?php 
function sys_message($id,$err_id,$par1){
	 
}
?>
<table>
<tr><td>
<h6><?php  p("ID_SETUP_MENU_SYSCHECK");?></h6>
</td></tr>
<tr><td>
  <form name="main_setup" action="main.php" method="post">
  <div class="description"><?php  p("ID_SETUP_SYSCHECK_DESC")?></div>
  <fieldset><legend><?php  p("ID_SETUP_MENU_SYSCHECK")?></legend><div class="form-item">
    <table width="100%"  cellpadding="5" cellspacing="0" style="border: 1px solid #aaa;">
		<tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor=''" onmouseover="this.style.backgroundColor='#ccddFF'">
			<td><?php  var_dump(gd_info());?></td>
		</tr>
		<tr bgcolor="#EEEEEE" onmouseout="this.style.backgroundColor=''" onmouseover="this.style.backgroundColor='#ccddFF'">
			<td></td>
		</tr>
	</table>
  </td></tr>
</table>
