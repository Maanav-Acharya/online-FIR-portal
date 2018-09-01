<?php 
session_start();
if(isset($_SESSION['off'])==false)
	header("Location:http://127.0.0.1:8012/project/home.php");
include'header/header.php';
 ?>
<html>
<body>
<form method="POST">
<?php 
$mid=$_SESSION['off'];
$ps=$_GET['ps'];
echo "<br>Welcome $mid<br>";
 ?>
<div id="cur">
<p style="font-size:25px;font-weight:bold;background-color:white">Current FIRS</p>
<?php
include 'dbcon/dbcon.php';
session_start();
$sql = "SELECT firids FROM $ps WHERE officers='$mid'";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql)){
		while ($row = mysqli_fetch_assoc($result)) {
				$id=$row['firids'];
	}
}
$id1=explode(",",$id);
$i=0;
while($id1[$i]!=""){
$sql = "SELECT dat,area,type,com,user,update1,update2,done FROM fir WHERE id=$id1[$i] AND done='F'";
$result=mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)){
				$type=$row['type'];
				$date=$row['dat'];
				$area=$row['area'];
				$com=$row['com'];
				$user=$row['user'];
				$u=$row['update1'];
				echo "<br>";
				$status="&emsp;---";				
				echo '<div id="nd">';
				if($u!="/")
					$status="Investigating";
				echo "<a href='firv.php?id=$id1[$i]&typ=o' class='g1'>view</a>&emsp;&emsp;&emsp;";
				echo "<a href='update.php?id=$id1[$i]' class='g1'>update</a>";
				echo "<br>FIR NO:$id1[$i] &emsp;TYPE: $type";
				echo "<br>DATE:$date";
				echo "<br>STATUS:$status";
				echo '</div><br>';
				if($status=="Investigating")
					echo "<script>document.getElementById('nd').style.backgroundColor = '#FFD300';</script>";
		}
	$i++;
}
?>
</div>
<div id="comp">
<p style="font-size:25px;font-weight:bold;background-color:white">Completed FIRS</p>
<?php
$i=0;
while($id1[$i]!=""){
$sql = "SELECT dat,area,type,com,user FROM fir WHERE id=$id1[$i] AND done='T'";
$result=mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)){
				$type=$row['type'];
				$date=$row['dat'];
				$area=$row['area'];
				$com=$row['com'];
				$user=$row['user'];
				echo "<br>";
				echo '<div id="done">';
				echo "<a href='firv.php?id=$id1[$i]&typ=o' class='g2'>view</a>";
				echo "<br>FIR NO:$id1[$i]&emsp;TYPE:$type";
				echo "<br>DATE:$date";
				echo "<br>STATUS:Completed";
				echo '</div><br>';
		}
	$i++;
}
?>
</div>
</form>
</form>
</body>
</html>
<style type="text/css">
#bor{
	top:20%;
	background-color:white;
	width:7px;
	height:550px;
	position:relative;
	left:30%;
	border-left:6px #191919 solid; 
}
#nd {		
		line-height:25px;
		font-weight:bold;
		color:black;
		background-color: #3dc6c2; 			
		width:200px;
		height:120px;
		padding:5px 10px; 
		box-shadow: 5px 5px 20px #888888;
}
.g1{
	font-weight:normal;
	color:white;
	cursor:pointer;
}
#done {		

		line-height:25px;
		font-weight:bold;
		color:black;
		background-color: #4CBB17; 			
		width:200px;
		height:120px;
		padding:5px 10px; 
		box-shadow: 5px 5px 20px #888888;
}
.g2{
	font-weight:normal;
	color:white;
	cursor:pointer;
}
#comp{
		position:absolute;
		top:150px;
		left:45%;
		padding:5px 20px 5px;
		width:300px;
		border:solid;
}
#cur{
	position:absolute;
	top:150px;
	padding:5px 20px 5px;
	left:15%;
	width:300px;
	border:solid;
}
</style>
<?php include 'footer/footer.html' ?>