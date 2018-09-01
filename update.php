<?php 
session_start();
if(isset($_SESSION['off'])==false)
	header("Location:http://127.0.0.1:8012/project/home.php");
include'header/header.php';
 ?>
<html>
<form method="POST" id="upd">
</script>
<?php
		$id=$_GET['id'];
		include 'dbcon/dbcon.php';
		echo "<br><textarea rows='5' cols='35' name='updat' placeholder='Write update here'></textarea><br>";
		echo "<br><input type='submit' value='UPDATE FIR $id' name='submit' id='up'> &nbsp &emsp;";
		echo "<input type='submit' value='MARK FIR $id as Done' name='done' id='don'>";
		if(isset($_POST['submit'])){
			$d=date("d-m-Y");
			$text=$_POST['updat']."/".$d."/";
			$sql1 = "SELECT update1 FROM fir WHERE id=$id ";
			$result=mysqli_query($conn,$sql1);
			if(mysqli_query($conn,$sql1)){
					while ($row = mysqli_fetch_assoc($result))
						$t=$row['update1'];
			}
						if($t=="/")
						{
								$sql1 = "UPDATE fir SET update1 ='$text' WHERE id=$id";	
								if(mysqli_query($conn,$sql1)){
									echo "done";
									echo '<script>window.location.href="http://127.0.0.1:8012/project/officer.php?ps=Sion"</script>';
								}
						}
					
					else{
						$sql1 = "UPDATE fir SET update2 ='$text' WHERE id=$id";	
						if(mysqli_query($conn,$sql1)){
							echo "done";
							echo '<script>window.location.href="http://127.0.0.1:8012/project/officer.php?ps=Sion"</script>';
						}
					}
		}
	
	if(isset($_POST['done'])){
					include 'dbcon/dbcon.php';
					$sql1 = "UPDATE fir SET done ='T' WHERE id=$id";
					if(mysqli_query($conn,$sql1));
							echo "<script>alert('FIR $id marked as done')</script>";
							echo '<script>window.location.href="http://127.0.0.1:8012/project/officer.php?ps=Sion"</script>';
			}
?>
</form>
</html>
<?php include 'footer/footer.html' ?>
<style type="text/css">
	#upd{
		position:absolute;
		top:30%;
		left:10%;
		font-size:30px;
	}
 #don{
 	font-size:20px;
 	background-color:#e52935;
 	padding:15px 20px; 
 	border:none;
	cursor:pointer;
	}
	#up{
 	font-size:20px;
 	background-color:#FFD300;
 	padding:15px 20px; 
 	border:none;
	cursor:pointer;
	}
</style>