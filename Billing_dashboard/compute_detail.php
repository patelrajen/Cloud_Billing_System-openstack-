<?php
$host="localhost";
$user="root";
$pass="";
$db_name="cloud";
$db_name1="nova_new";
$tb_name="credential";
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
<?php
mysql_select_db($db_name1);
$service_id=$_GET['service_id'];
$sql1="SELECT * FROM $tb_name2 where id='$service_id'";
$result1=mysql_query($sql1);
$info1=mysql_fetch_array($result1);
$host=$info1['host'];
echo "Details of ".$host." Host :";
?>

</div>
<div id="compute_detail">
<?php
$sql="SELECT * FROM $tb_name1 where service_id='$service_id'";
$result=mysql_query($sql);
$info=mysql_fetch_array($result);
     echo "Host Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$info1['host'];
	 echo "<br/>Virtual CPU &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$info['vcpus'];
	 echo "<br/>Used Virtual CPU &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$info['vcpus_used'];
	 echo "<br/>Available R.A.M &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$info['memory_mb'];
	 echo "<br/>Used R.A.M &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$info['memory_mb_used'];
	 echo "<br/>Free R.A.M (MB) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$info['free_ram_mb'];
	 echo "<br/>Available Disk (GB) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$info['local_gb'];
	 echo "<br/>Used Disk (GB) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$info['local_gb_used'];
	 echo "<br/>Disk Available Least(GB) &nbsp;: ".$info['disk_available_least'];
	 echo "<br/>hypervisor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$info['hypervisor_type'];
	 echo "<br/>Running Virtual Machines : ".$info['running_vms'];
	 echo "<br/>Current Workload &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$info['current_workload'];	
  	 echo "<br/>Services Running on It &nbsp;&nbsp;&nbsp;&nbsp;: ";
	 $host=$info1['host'];
	 $sql2="SELECT * FROM $tb_name2 where host='$host'";
     $result2=mysql_query($sql2);
	 while($info2=mysql_fetch_array($result2))
	 {
		 echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$info2['binary'];
	 }
	 echo "<br/>Instances Running on It &nbsp;&nbsp;&nbsp;: ";
	 $sql2="SELECT * FROM $tb_name3 where launched_on='$host'";
     $result2=mysql_query($sql2);
	 while($info2=mysql_fetch_array($result2))
	  {
		  echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instance-0".$info2['id'];
	  }
	  
	  
	  echo "<div id='compute_detail_inner'>";
	  echo "Created At : ".$info['created_at'];
	  echo "<br/>Updated At :".$info['updated_at'];
	  echo "<br/>Deleted At :".$info['deleted_at'];
	  $in=$info['cpu_info'];
	  echo "<br/>CPU Info : <br/>";
	  echo $in;
	  echo "</div>";
?>
</div>






</body>
</html>