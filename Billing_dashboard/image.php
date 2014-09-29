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
Details of Images And Flavors :
</div>



<?php
mysql_select_db($db_name3);
$sql="SELECT * FROM $tb_name5";
$result=mysql_query($sql);
$i=1;
echo "<div id='long'>";
while($info=mysql_fetch_array($result))
 {
	 $id=$info['id'];
	 
	 echo "<div id='compute".$i."'>";
	 echo "Images Details<hr/>";
	 echo "Name of Image : ".$info['name'];
	 echo "<br/>Size  of Image : ".$info['size'];
	 echo "<br/>Status of Image : ".$info['status'];
	 echo "<br/>Created At :".$info['created_at'];
	 echo "<br/>Updated At :".$info['updated_at'];
	 echo "<br/>Deleted At :".$info['deleted_at'];
	 echo "<br/>Disk Format  :".$info['disk_format'];
	 echo "<br/>Container Format ".$info['container_format'];
	 echo "<br/>Minimum Disk :".$info['min_disk'];
	 echo "<br/>Mimimum R.A.M :".$info['min_ram'];
	 echo "</div>";
     $i++; 
 }
 
mysql_select_db($db_name1);
$sql="SELECT * FROM $tb_name7";
$result=mysql_query($sql);
$j=1;
while($info=mysql_fetch_array($result))
 {
	 
	 if($j%2!=0)
	  {
	  echo "<div id='compute".$i."'>";
	  echo "Flavors Details<hr/>";
	  $i++;
	  }
	 echo "Name of Flavor : ".$info['name'];
	 echo "<br/>Number of VCPUS : ".$info['vcpus'];
	 echo "<br/>R.A.M (MB) : ".$info['memory_mb'];
	 echo "<br/>Root Disk Memory :".$info['root_gb'];
	 echo "<br/>Ephemeral Disk Memory :".$info['ephemeral_gb'];
	 echo "<br/>RXTX Factor :".$info['rxtx_factor'];
	 echo "<br/>SWAP Memory  :".$info['swap'];
	 echo "<br/><br/><br/>";
	 if($j%2==0)
	 echo "</div>";
	 $j++;
	 
 }

echo "</div>";
?>





</body>
</html>