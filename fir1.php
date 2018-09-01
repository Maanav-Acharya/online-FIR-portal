<?php 
session_start();
if(isset($_SESSION['admin'])==false)
	header("Location:http://127.0.0.1:8012/project/home.php");
include 'header/header.php';
?>
<!DOCTYPE html>
<html>
<body>
<?php $ps=$_GET['ps'];
$mid=$_SESSION['admin'];
echo "<br style='text-align:center;'>Welcome $mid<br>";?>
<form  method="POST">
<div id="ua">
<p style="font-size:25px;font-weight:bold;background-color:white">Current FIRS</p>
<?php
include 'dbcon/dbcon.php';
$sql = "SELECT id,dat,type,com,update1,update2 FROM fir WHERE area='$ps' AND assi='F'";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql)){
		while ($row = mysqli_fetch_assoc($result)) {
				$id=$row['id'];
				$type=$row['type'];
				$date=$row['dat'];
				echo '<div id="new">';
				echo "<a href='firv.php?id=$id' class='g1'>view</a>&nbsp &nbsp";
				echo "<a href='assign.php?ps=sion&id=$id' class='g1'>assign</a><br><br>";		
				echo "FIR NO:$id   $type<br><br>";
				echo "DATE:$date";
				echo "</div><br>";	
		}
}
?>
</div>
<div id="st">
<p style="font-size:25px;font-weight:bold;background-color:white">FIR STATUS</p>
<?php
include 'dbcon/dbcon.php';
$sql1 = "SELECT id,dat,type,officer,update1,done FROM fir WHERE area='$ps' AND assi='T' ";
$result=mysqli_query($conn,$sql1);
if(mysqli_query($conn,$sql1)){
		while ($row = mysqli_fetch_assoc($result)) {
				$id=$row['id'];
				$type=$row['type'];
				$date=$row['dat'];
				$off=$row['officer']; 
				$status="Assigned";
				$u1=explode("/",$row['update1']);
				$d=$row['done'];
				if($u1[0]!=null)
					$status="Investigating";				
				if($d=="T")
					$status="Completed";
				echo '<div id="stat">';
				echo "<a href='firv.php?id=$id' class='g2'>view</a>&nbsp &nbsp<br>";		
				echo "FIR NO:$id   $type<br>";
				echo "DATE:$date<br>";
				echo "ASSIGNED TO: $off <br>";
				if($status=="Investigating")
					echo "<script>document.getElementById('stat').style.backgroundColor = '#FFD300';</script>";
				if($status=="Completed")
					echo "<script>document.getElementById('stat').style.backgroundColor = '#4CBB17';</script>";
				echo "STATUS:$status";
				echo "</div><br>";	
		}
}
?>
</div>
</form>
</body>
</html>

<style type="text/css">

#new{		
		line-height:25px;
		font-weight:bold;
		color:black;
		background-color:#3dc6c2; 			
		width:200px;
		height:130px;
		padding:0px 10px; 
		box-shadow: 5px 5px 20px #888888;
}
.g1{
	font-weight:normal;
	color:white;
}

#stat{		
		line-height:25px;
		font-weight:bold;
		color:black;
		background-color:#3dc6c2; 			
		width:200px;
		height:130px;
		padding:0px 10px; 
		box-shadow: 5px 5px 20px #888888;
}
.g2{
	font-weight:normal;
	color:white;
}
#st{
		position:absolute;
		top:150px;
		left:45%;
		padding:5px 20px 5px;
		width:250px;
		border:solid;
}
#ua{
	position:absolute;
	top:150px;
	padding:5px 20px 5px;
	left:15%;
	width:250px;
	border:solid;
}
</style>
<?php include 'footer/footer.html' ?>