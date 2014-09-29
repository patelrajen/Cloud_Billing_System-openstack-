<?php
$id=$_GET['id'];
echo "Available Resources : ";
echo "<br/>";
$sql="SELECT * FROM $tb_name4 where id='$id'";
$result=mysql_query($sql);
$info=mysql_fetch_array($result);
echo $info['resource_name'];
?>
