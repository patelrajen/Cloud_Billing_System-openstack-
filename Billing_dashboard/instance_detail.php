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
<?php
mysql_select_db($db_name1);
$id=$_GET['id'];
$sql="SELECT * FROM $tb_name3 where id='$id'";
$result=mysql_query($sql);
$info=mysql_fetch_array($result);
$host=$info['hostname'];
echo "Details of ".$host." Instance :";
?>

</div>
<div id="compute_detail">
<?php
     $user_id=$info['user_id'];
	 $project_id=$info['project_id'];
	 $image_ref=$info['image_ref'];
	 $instance_type_id=$info['instance_type_id'];
	 mysql_select_db($db_name2);
	 $sql1="SELECT * FROM $tb_name4 where id='$user_id'";
     $result1=mysql_query($sql1);
	 $info1=mysql_fetch_array($result1);
	 $user=$info1['name'];
	 $sql1="SELECT * FROM $tb_name6 where id='$project_id'";
     $result1=mysql_query($sql1);
	 $info1=mysql_fetch_array($result1);
	 $project=$info1['name'];
	 mysql_select_db($db_name3);
	 $sql1="SELECT * FROM $tb_name5 where id='$image_ref'";
     $result1=mysql_query($sql1);
	 $info1=mysql_fetch_array($result1);
	 $image_name=$info1['name'];
	 $image_status=$info1['status'];
	 
	 echo "Instance Name : ".$info['hostname'];
	 echo "<br/>Image on Instance : ".$image_name;
	 echo "<br/>Instance User : ".$user;
	 echo "<br/>Created At : ".$info['created_at'];
	 echo "<br/>Updated At : ".$info['updated_at'];
	 echo "<br/>Launches At : ".$info['launched_at'];
	 echo "<br/>Deleted At : ".$info['deleted_at'];
	 echo "<br/>Project Name : ".$project;
	 echo "<br/>VM Status :".$info['vm_state'];
	 echo "<br/>Host Name : ".$info['host'];
	 echo "<br/>(on which instance is running)";
	 $instance_type_id=$info['instance_type_id'];
	 mysql_select_db($db_name1);
	 $sql1="SELECT * FROM $tb_name7 where id='$instance_type_id'";
     $result1=mysql_query($sql1);
	 $info1=mysql_fetch_array($result1);
	 echo "<br/><br/>Allocated Resources to Instance : ";
	 echo "<br/>R.A.M (MB) : ".$info1['memory_mb'];
	 echo "<br/>Virtual CPU : ".$info1['vcpus'];
	 echo "<br/>Root Storage (GB) :".$info1['root_gb'];
	 echo "<br/>Ephemeral Storage (GB) :".$info1['ephemeral_gb'];
	 $sql1="SELECT * FROM $tb_name8 where instance_id='$id'";
     $result1=mysql_query($sql1);
	 $info1=mysql_fetch_array($result1);
	 echo "<br/>Fixed Ip Address : ".$info1['address'];
	 
	 echo "<div id='instance_detail_inner'>";
	 
	 echo "Network Information :";
	 $sql1="SELECT * FROM $tb_name9 where id='$id'";
     $result1=mysql_query($sql1);
	 $info1=mysql_fetch_array($result1);
	 echo "<br/>Extra Info :".$info1['network_info'];
	  
	  echo "</div>";
?>
</div>






</body>
</html>