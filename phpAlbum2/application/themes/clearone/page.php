<html>
<?php if($head){ echo $head; } ?>
<body>
<table>
<?php 
    if($header){
    	echo "<tr><td>$header</td></tr>";
	}
	echo "<tr>";	
    if($left) echo "<td id=\"left\">$left</td>";
    if($content) echo "<td id=\"content\">$content</td>";
    if($right) echo "<td id=\"right\">$right</td>";
    echo "</tr>";
    if($footer){
    	echo "<tr><td>$header</td></tr>";
	}
?>
</table>
</body>
</html>
