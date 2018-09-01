<?php 
session_start();
if(isset($_SESSION['user'])==false)
    header("Location:http://127.0.0.1:8012/project/home.php");
include 'header/header.php';
?>
<?php 
session_start();
$mid=$_SESSION['user'];
echo "<br>Welcome $mid<br>";
?>
<html>
<body>
<div id="inc">
<p style="font-size:25px;font-weight:bold;background-color:white">Filed FIRs</p>
<?php
include 'dbcon/dbcon.php';
$sql = "SELECT id,dat,area,type,officer,update1,update2,done FROM fir WHERE user='$mid' AND done='F'";
$result=mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
				$id=$row['id'];
				$type=$row['type'];
				$date=$row['dat'];
				$p=$row['area'];
				$o=$row['officer'];
				$up1=explode("/",$row['update1']);
				$up2=explode("/",$row['update2']);
				echo "<br><br>";
				echo '<div id="g">';
				echo "<a href='firv.php?id=$id&typ=u' class='g'>VIEW FIR</a>&emsp;&emsp;&emsp;&emsp;";
				echo "<div style='color:red;display:none' id='update'><img src='images/warning-3-512.png' style='height:18px;width:18px;'>&nbsp New Update</div>";
				echo "<br>FIR ID: $id &emsp; &emsp; &emsp; TYPE: $type";
				$status="Sent to $p police station";
				if($up1[0]!="")
					$status="Investigating";				
				echo "<br>DATE: $date";
				echo "<br>OFFICER ASSIGNED: <a href='http://127.0.0.1:8012/project/offv.php?officer=$o' class='g'>$o</a>";
				echo "<br>STATUS: $status &emsp; &emsp;";
				if($status=="Investigating")
					echo "<script>document.getElementById('g').style.backgroundColor = '#FFD300';</script>";
				if($up1[0]!="" && $up2[0]!=""){
				if($up1[2]!="v" || $up2[2]!="v")
					echo "<script>document.getElementById('update').style.display = 'inline';</script>";
				}
				echo '</div>';
				echo "<br>";

		}
?>
</div>
<div id="don">
<p style="font-size:25px;font-weight:bold;background-color:white">Completed FIRs</p>
<?php
include 'dbcon/dbcon.php';
session_start();
$mid=$_SESSION['user'];
$sql = "SELECT id,dat,area,type,officer,done FROM fir WHERE user='$mid' AND done='T'";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql)){
		while ($row = mysqli_fetch_assoc($result)) {
				$id=$row['id'];
				$type=$row['type'];
				$date=$row['dat'];
				$p=$row['area'];
				$o=$row['officer'];
				echo "<br><br>";
				echo '<div id="g1">';
				echo "<a href='firv.php?id=$id&typ=u' class='g1'>VIEW FIR</a>&emsp;&emsp;&emsp;&emsp;";
				echo "<div style='display:inline;color:red;display:none' id='update'><img src='images/warning-3-512.png' style='height:18px;width:18px;'>&nbsp New Update</div>";
				echo "<br>FIR ID: $id &emsp; &emsp; &emsp; TYPE: $type";
				$status="Completed";
				echo "<br>DATE: $date";
				echo "<br>OFFICER ASSIGNED: <a href='http://127.0.0.1:8012/project/offv.php?officer=$o' class='g'>$o</a>";
				echo "<br>STATUS: $status &emsp; &emsp;";
				echo '</div>';
				echo "<br>";
				echo "<script>document.getElementById('g1').style.backgroundColor = '#4CBB17';</script>";
	}
}
?>
</div>
<div align="center" style="position:absolute;bottom:30px;left:40%">
<input type="button" align="c" name="new_fir" value="New FIR" id="b" onclick="goto()">
</div>
</div>
</body>
</html>
<script>
		function goto()
		{
			window.location.href="http://127.0.0.1:8012/project/fir.php?";
		}
</script>
<style type="text/css">
#g {		
		line-height:23px;
		font-weight:bold;
		color:black;
		background-color: #3dc6c2; 			
		width:290px;
		height:120px;
		padding:5px 10px; 
		box-shadow: 5px 5px 20px #888888;
}
.g{
	font-weight:normal;
	color:white;
}
#g1{		
		line-height:23px;
		font-weight:bold;
		color:black;
		background-color: #3dc6c2; 			
		width:290px;
		height:120px;
		padding:5px 10px; 
		box-shadow: 5px 5px 20px #888888;
}
.g1{
	font-weight:normal;
	color:white;
}
 #b{
 	font-size:20px;
 	background-color:#FFD300;
 	padding:15px 20px; 
 	border:none;
	cursor:pointer;
	}

#b:hover{
	text-decoration:underline;
}
#don{
		position:absolute;
		top:150px;
		left:45%;
		padding:5px 20px 10px 10px; 
		width:300px;
		border:solid;
}
#inc{
	position:absolute;
	top:150px;
	padding:5px 20px 20px 10px;
	left:15%;
	width:300px;
	border:solid;
}
</style>
<?php include 'footer/footer.html' ?>