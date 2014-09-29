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
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Cloud Billing System</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="reset.css">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="intro1">
<div id="abch">
<a href="index.php">
Cloud Billing System
</a>
</div>
<div id="user">
<a href="">Logged in as &nbsp;: 
<?php
mysql_select_db($db_name);
$sql="SELECT * FROM $tb_name where id='$id'";
$result=mysql_query($sql);
$info=mysql_fetch_array($result);
echo $info['username'];
?>
</a>
</div>
<div id="setting">
<a href="">Setting</a>
</div>
<div id="signout">
<a href="">Sign Out</a>
</div>
</div>

<div id="font">
Set Content And Date Of Email :

</div>
<div id="compute_detail">
<br/>
<?php
mysql_select_db($db_name);
$sql="SELECT * FROM $tb_name10";
$result=mysql_query($sql);
$info=mysql_fetch_array($result);
$content=$info['mail_content'];
$date=$info['date'];
?>

<form action="update_email.php" method="post">
Enter Date :
<input type="date" name="date" value=<?php echo $date;?>><br/><br/>
Enter Content of Email :<br/><br/>
<textarea name="content" cols="70" rows="9">
<?php echo $content; ?>
</textarea><br/><br/>
<input type="submit" name="UPDATE"/>
</form>
 
</div>






</body>
</html>