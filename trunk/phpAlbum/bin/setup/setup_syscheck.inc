<?php 
function print_message($id,$code){
	if($code=="OK"){
		print "<tr bgcolor=\"#FFFFFF\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\"><td><span class=\"green\"><strong>[OK]</strong></span>&nbsp;&nbsp;".t($id)."</td></tr>"; 
	}
	if($code=="ERROR"){
		print "<tr bgcolor=\"#FFFFFF\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\"><td><span class=\"red\"><strong>[ERROR]</strong></span>&nbsp;&nbsp;".t($id)."</td></tr>"; 
	}
	if($code=="WARNING"){
		print "<tr bgcolor=\"#FFFFFF\" onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#ccddFF'\"><td><span class=\"orange\"><strong>[WARNING]</strong></span>&nbsp;&nbsp;".t($id)."</td></tr>"; 
	}
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
    <table width="100%"  cellpadding="5" cellspacing="0">
			<?php
				$gdinfo = gd_info();
				$version = $gdinfo["GD Version"];
				if(preg_match("/[^\.0-9]*2\..*/",$version)==1){
					  print_message("ID_MSG_GD_INSTALLED","OK");
				}else{
					  print_message("ID_MSG_GD_NOT_INSTALLED","ERROR");
				}
				if($gdinfo["JPEG Support"]===true || $gdinfo["JPG Support"]===true){
					  print_message("ID_MSG_JPEG_SUPPORT_INSTALLED","OK");
				}else{
					  print_message("ID_MSG_JPEG_SUPPORT_NOT_INSTALLED","ERROR");
				}
				if($gdinfo["PNG Support"]===true){
					  print_message("ID_MSG_PNG_SUPPORT_INSTALLED","OK");
				}else{
					  print_message("ID_MSG_PNG_SUPPORT_NOT_INSTALLED","ERROR");
				}
				if($mbstring===true){
					  print_message("ID_MSG_MBSTRING_ENABLED","OK");
				}else{
					  print_message("ID_MSG_MBSTRING_MISSING","WARNING");
				}
				if($ftp_support===true){
					  print_message("ID_MSG_FTP_ENABLED","OK");
				}else{
					  print_message("ID_MSG_FTP_SUPPORT","WARNING");
				}
				//check memory limit
				$memory_limit_str=ini_get('memory_limit');
				if(preg_match("/[0-9]+M/",$memory_limit_str)){
					$memory_limit= (int)$memory_limit_str;
				}else if (preg_match("/[0-9]+K/",$memory_limit_str)){
					$memory_limit=(int)(((int)$memory_limit_str)/1024);
				}else{
					print_message("ID_MSG_NO_MEMORY_LIMIT","WARNING");
					$memory_limit=0;
				}
				if($memory_limit>24){
					print_message("MEMORY");
				}
				//check execution time limit				
									
			?>
	</table>
  </td></tr>
</table>
