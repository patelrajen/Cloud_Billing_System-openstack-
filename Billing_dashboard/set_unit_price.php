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
Set Unit Price Of Resources :
</div>


<div id="long">



<?php

$sql="SELECT * FROM $tb_name4";
$result=mysql_query($sql);
$i=1;
while($info=mysql_fetch_array($result))
 {
	 echo "<div id='compute".$i."'>";
	 echo "Resource Name :".$info['resource_name'];
	 echo "<hr/>";
	 echo "<br/>Price Per :".$info['price_per']." hour";
	 echo "<br/>Price ($) :".$info['price'];
	 echo "<br/>Primary Cost ($) :".$info['primary_cost'];
	 echo "<br/>Unit :".$info['unit'];
	 echo "<hr/>";
	 echo "<form action='update.php' method='post'>";
	 echo "<input type='hidden' name='id' value='$info[id]'/>";
	 echo "Price ($) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type='text' name='price' value='$info[price]'/><br/>";
	 echo "Price Per &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type='text' name='price_per' value='$info[price_per]'/><br/>";
	 echo "Primary Cost: <input type='text' name='primary_cost' value='$info[primary_cost]'/><br/> ";
	 echo "Unit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type='text' name='unit' value='$info[unit]'/><br/>";
	 echo "<br/>";
	 echo "<input type='submit' value='UPDATE'/>";
	 echo "</form>";
	 echo "</div>";
	$i++; 
 }
 ?>
</div>









</body>
</html>