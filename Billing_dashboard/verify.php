<?php
$host="localhost";
$user="root";
$pass="";
$db_name="cloud";
$db_name1="keystone_new";
$tb_name="credential";
$tb_name1="user";
$tb_name2="user_tenant_membership";
mysql_connect($host,$user,$pass);
session_start();

$username=$_POST['username'];
$password=$_POST['password'];

mysql_select_db($db_name);
$sql="SELECT * FROM $tb_name where username='$username' AND password='$password'";
$result=mysql_query($sql);
$info=mysql_fetch_array($result);
$count=mysql_num_rows($result);

if($count==1)
 {
 $id=$info['id'];
 $_SESSION['id']=$id;
 mysql_query("UPDATE $tb_name SET live='1' where id='$id'");
 mysql_select_db($db_name1);
 $sql="SELECT * FROM $tb_name1 where name='$username'";
 $result=mysql_query($sql);
 $info=mysql_fetch_array($result);
 $_SESSION['user_id']=$info['id'];
 $user_id=$_SESSION['user_id'];
 $sql="SELECT * FROM $tb_name2 where user_id='$user_id'";
 $result=mysql_query($sql);
 $info=mysql_fetch_array($result);
 $_SESSION['tenant_id']=$info['tenant_id'];
 $tenant_id=$_SESSION['tenant_id'];
 echo $_SESSION['user_id'];
 echo  "<br/>";
 echo $_SESSION['tenant_id'];
 header("location:index.php");
 }
 else
 {
 session_destroy();
 echo "fail";	 
 header("location:login.php");
 }
?>