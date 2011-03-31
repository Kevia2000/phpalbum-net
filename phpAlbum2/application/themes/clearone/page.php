<html>
<?php if($head){ echo $head; } ?>
<body>
<table>
<?php if($header){ ?>
    <tr><td>
<?php echo $header; ?>
    </td></tr>
<?php } ?>
    <tr>
<?php
    if($left) echo "<td id=\"left\">$left</td>";
    if($content) echo "<td id=\"content\">$content</td>";
    if($right) echo "<td id=\"right\">$right</td>";
?>
</tr>
</table>
</body>
</html>
