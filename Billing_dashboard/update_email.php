<?php
$host="localhost";
$user="root";
$pass="";
$db_name="cloud";
$db_name1="nova_new";
$db_name2="keystone_new";
$db_name3="glance_new";
$tb_name="credential";
$tb_name1="compute_nodes";
$tb_name2="services";
$tb_name3="instances";
$tb_name4="user";
$tb_name5="images";
$tb_name6="tenant";
$tb_name7="instance_types";
$tb_name8="fixed_ips";
$tb_name9="instance_info_caches";
$tb_name10="mail_details";
mysql_connect($host,$user,$pass);
session_start();
$id=$_SESSION['id'];
$content=$_POST['content'];
$date=$_POST['date'];

mysql_select_db($db_name);
mysql_query("UPDATE $tb_name10 SET 	mail_content='$content' WHERE id=1");
mysql_query("UPDATE $tb_name10 SET date='$date' WHERE id=1");

header("location:mail.php");

?>
