<?php include'header/header.php' ?>
<html>
<body >
<?php
include 'dbcon/dbcon.php';
$id=$_GET['id'];
$typ=$_GET['typ'];
$sql = "SELECT dat,area,type,com,user FROM fir WHERE id=$id";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql)){
		while ($row = mysqli_fetch_assoc($result)) {
				$type=$row['type'];
				$date=$row['dat'];
				$area=$row['area'];
				$com=$row['com'];
				$user=$row['user'];
				echo '<div id="fi">';
				echo "<fieldset><legend align='center' id='l'><div id='h'><u>FIR NO:$id</u></div></legend>";
				echo "<br><br>DATE OF INCIDENT:$date";
				echo "<br>AREA OF INCIDENT:$area";
				echo "<br>COMPLAINT:$com";
				echo "<hr>";
			}
	}
$sql1= "SELECT fname,lname,mailid,address,mno FROM signup WHERE mailid='$user'";
$result1=mysqli_query($conn,$sql1);
if(mysqli_query($conn,$sql1)){
		while ($row1 = mysqli_fetch_assoc($result1)){
			$fn=$row1['fname'];
			$ln=$row1['lname'];
			$addr=$row1['address'];
			$no=$row1['mno'];
			echo "&nbsp &nbsp    -$fn $ln, $user<br>&nbsp &nbsp    Address: $addr<br>&nbsp &nbsp    Contact No: $no";
			echo "</fieldset>";
			echo "</div>";
		}
	}
echo "<div id='upd'>";
$sql1= "SELECT update1,update2 FROM fir WHERE id='$id'";
$result1=mysqli_query($conn,$sql1);
if(mysqli_query($conn,$sql1)){
		while ($row1 = mysqli_fetch_assoc($result1)){
			$u1=$row1['update1'];
			$ud1=explode("/",$u1);
			$u2=$row1['update2'];
			$ud2=explode("/",$u2);
			if($ud1!="/" && $ud2[0]!="/"){
			echo "Updates:<br>$ud1[0]<br>&nbsp&nbsp-$ud1[1]";
			echo "<hr width='650'>$ud2[0]<br>&nbsp&nbsp-$ud2[1]";
				}
			}
		}
if($typ=="u"){
if($ud1[2]!="v" && $ud1[0]!=""){
		$u1=$u1."v";
		$sql1= "UPDATE fir SET update1='$u1' WHERE id='$id'";
		if(mysqli_query($conn,$sql1))
			echo "";
}
if($ud2[2]!="v" && $ud2[0]!=""){
		$u2=$u2."v";
		$sql2= "UPDATE fir SET update2='$u2' WHERE id='$id'";
		if(mysqli_query($conn,$sql2))
			echo "";
}
}
?>
</div>
</body>
</html>

<style type="text/css">
	#h{
		font-size:40px;
		color:#E60026;
	}
	#fi{
		width:700px;
		margin-top:20px;
		font-size:20px; 
		position: absolute;
		left:28%;
		background-color:white;
	}
#upd{
	background-color:white;
	position: relative;
		top:43%;
		left:29%;
		font-size:20px;
	width:700px;
}
#fir{
	background-color:white;
}
</style>
</html><?php include 'footer/footer.html' ?>