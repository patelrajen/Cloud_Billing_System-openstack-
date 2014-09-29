<?php
$host="localhost";
$user="root";
$pass="";
$db_name="cloud";
$db_name1="nova_new";
$tb_name="credential";
$tb_name4="unit_price";
$tb_name1="compute_nodes";
$tb_name2="services";
$tb_name3="instances";
mysql_connect($host,$user,$pass);
session_start();
$id=$_SESSION['id'];

mysql_select_db($db_name);
$id=$_POST['id'];
$price=$_POST['price'];
$price_per=$_POST['price_per'];
$primary_cost=$_POST['primary_cost'];
$unit=$_POST['unit'];
mysql_query("UPDATE $tb_name4 SET price='$price' WHERE id='$id'");
mysql_query("UPDATE $tb_name4 SET price_per='$price_per' WHERE id='$id'");
mysql_query("UPDATE $tb_name4 SET primary_cost='$primary_cost' WHERE id='$id'");
mysql_query("UPDATE $tb_name4 SET unit='$unit' WHERE id='$id'");
header("location:set_unit_price.php");
?>
