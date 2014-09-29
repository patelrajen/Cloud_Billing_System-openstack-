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
$tb_name8="user_tenant_membership";
$tb_name9="resource_usage";
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
Details of Users :
</div>



<?php
mysql_select_db($db_name2);
$sql="SELECT * FROM $tb_name4";
$result=mysql_query($sql);
$i=1;
echo "<div id='long'>";
while($info=mysql_fetch_array($result))
 {
	 $id=$info['id'];
	 echo "<div id='compute".$i."'>";
	 $user_id=$info['id'];
	 echo "Username : ".$info['name'];
	 echo "<br/>Email Id :";
	 $detail=$info['extra'];
	 $j=0;
	 $k=1;
	 $p=0;
	 $l=strlen($detail);
	 while($j!=$l)
	  {
		  if($detail[$j]==',')
		   {
			   $k++;
		   }
		  if($k==3)
		   {
			   if($detail[$j]==':')
			   {
			   $p++;
			   $j++;
			   }
			   if($p==1)
			   {
			   if($detail[$j]!='"')
			   echo $detail[$j];
			   }
		   }
		  $j++;
	  }
	 mysql_select_db($db_name2);
	 $sql1="SELECT * FROM $tb_name8 where user_id='$user_id'";
     $result1=mysql_query($sql1);
     $info1=mysql_fetch_array($result1);
     $tenant_id= $info1['tenant_id'];
	 $sql1="SELECT * FROM $tb_name6 where id='$tenant_id'";
     $result1=mysql_query($sql1);
     $info1=mysql_fetch_array($result1);
	 echo "<br/>Project Name :".$info1['name'];
	 mysql_select_db($db_name1);
	 $sql1="SELECT * FROM $tb_name3 where user_id='$user_id'";
     $result1=mysql_query($sql1);
	 echo "<br/>Instances Of User : <br/>";
	 $cpu=0;
	 $memory=0;
	 $hd=0;
	 while($info1=mysql_fetch_array($result1))
	  {
		  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Instance-00".$info1['id']."<br/>";
		  $a_cpu=$info1['vcpus'];
		  $a_memory=$info1['memory_mb'];
		  $a_hd=$info1['root_gb']+$info1['ephemeral_gb'];
		  mysql_select_db($db_name);
		  $instance_id="Instance-00".$info1['id'];
	      $sql2="SELECT * FROM $tb_name9 where instance_name='$instance_id'";
		  $result2=mysql_query($sql2);
          while($info2=mysql_fetch_array($result2))
		   {
			   $c=$info2['cpu_usage'];
			   $c=($c*$a_cpu)/(100);
			   $cpu=$cpu+$c;
			   $m=$info2['memory'];
			   $m=($m*$a_memory)/(100);
			   $memory=$memory+$m;
			   $h=$info2['hard_disk_used'];
			   $h=($h*$a_hd)/(100);
			   $hd=$hd+$h;
		   }
			   
			   
		  
	  }
	 echo "<br/>Total Usage of User : ";
	 echo "<br/>&nbsp;&nbsp;&nbsp; CPU USAGE (GHZ) : ".$cpu;
	 echo "<br/>&nbsp;&nbsp;&nbsp; Memory Usage (MB) :".$memory;
	 echo "<br/>&nbsp;&nbsp;&nbsp; Hard Disk Usage (MB) :".$hd;
	 
	 echo "<br/>Total Bill of User :";
	 echo "</div>";
     $i++; 
 }
echo "</div>";
?>





</body>
</html>