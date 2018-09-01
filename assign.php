<?php 
session_start();
if(isset($_SESSION['admin'])==false)
	header("Location:http://127.0.0.1:8012/project/home.php");
include 'header/header.php';
?>
<!DOCTYPE html>
<html>
<body>
<form method="POST">
<table rules="all" cellpadding="5" cellspacing="3" id="table" border="1">
<tr><th>Officer Name</th>
<th>FIR Count</th>
<th>FIRs Assigned</th>
</tr>
<?php 
include 'dbcon/dbcon.php';
	function assign($off,$ps,$id,$fids,$cnt){
		include 'dbcon/dbcon.php';
		$cnt++;
		$nfids=$fids.$id.",";
		$sql = "UPDATE $ps SET firids='$nfids', firc=$cnt WHERE officers='$off'";
		$sql1 = "UPDATE fir SET assi='T',officer='$off' WHERE id=$id";	
		if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql1))
			{
					echo "done";
					echo "<script>alert('FIR assigned to $off')</script>";
					echo '<script>window.location.href="http://127.0.0.1:8012/project/fir1.php?ps=Sion"</script>';
			}
		else
				echo "no record found!";
		}
$i=1;	
$id=$_GET['id'];
$ps=$_GET['ps'];
$sql="SELECT * FROM $ps WHERE 1";
$result=mysqli_query($conn,$sql);
if(mysqli_query($conn,$sql)){
	while ($row = mysqli_fetch_assoc($result)) {
    	$cnt[$i]=$row['firc'];
    	$off[$i]=$row['officers'];
    	$fids[$i]=$row['firids'];
    	echo "<tr><td>$off[$i]</td><td>$cnt[$i]</td><td>$fids[$i] &nbsp<input type='submit' value='assign' name='assi$i' id='as'></td></tr>";
			$i++;
	}
}
$n=$i;
for($i=1;$i<=$n;$i++){
if(isset($_POST["assi$i"]))
	assign($off[$i],$ps,$id,$fids[$i],$cnt[$i]);
}
?>
</table>
</form>
</body>
</html>
<?php include 'footer/footer.html' ?>

<style type="text/css">
	#table{
		position:absolute;
		top:30%;
		left:10%;
		font-size:30px;
	}
	#as{
 	background-color:#2f46a3;
 	padding:8px; 
 	border:none;
	cursor:pointer;
	color:white;
	}
</style>