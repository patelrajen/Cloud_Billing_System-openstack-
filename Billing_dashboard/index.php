<?php
$host="localhost";
$user="root";
$pass="";
$db_name="cloud";
$tb_name="credential";
mysql_connect($host,$user,$pass);
mysql_select_db($db_name);
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

Cloud Billing System

</div>
<div id="user">
<a href="">Logged in as &nbsp;: 
<?php
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
Billing Dashboard :
</div>



<a href="compute.php">
<div id="sq1">
<center><img src="images/Computer2.png" height="90" width="110"/></center>
<center>Details of Compute Nodes</center>
</div>
</a>
<a href="set_unit_price.php">
<div id="sq2">
<center><img src="images/shiny-gold-dollar-sign.png" height="90" width="110"/></center>
<center>Set Unit Price of Resources</center>
</div>
</a>
<a href="mail.php">
<div id="sq3">
<center><img src="images/mail9.png" height="90" width="110"/></center>
<center>Set/Configure Mail </center>
</div>
</a>
<a href="user.php">
<div id="sq4">
<center><img src="images/user-icon1.png" height="90" width="110"/></center>
<center>Users Details </center>
</div>
</a>
<a href="instances.php">
<div id="sq5">
<center><img src="images/instance-factory.png" height="90" width="110"/></center>
<center>Instances Details</center>
</div>
</a>
<div id="sq6">
<center><img src="images/watermeter-icon-319x300.png" height="90" width="110"/></center>
<center>Billing/Metering </center>
</div>
<div id="sq7">
<center><img src="images/graph.png" height="90" width="110"/></center>
<center>Usage Graph</center> 
</div>
<div id="sq8">
<center><img src="images/Search-icon.png" height="90" width="110"/></center>
<center>Search Option</center>
</div>

<a href="image.php">
<div id="sq9">
<center><img src="images/Virtualbox_icon_by_ShortyExclusives.png" height="90" width="110"/></center>
<center>
Details Of Images </center>
</div>
</a>




</body>
</html>