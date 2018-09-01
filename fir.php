<?php 
session_start();
if(isset($_SESSION['user'])==false)
    header("Location:http://127.0.0.1:8012/project/home.php");
include 'header/header.php';
?>
<html>
<body>
<br>
<div class="bd">
FIR
<table class="bd">
	<form method="POST" name="a" action="" onsubmit="return validate()">
                <tr>
                        <td>Date:</td>
                        <td><input type="date" name="date" min="2000-01-01" max="2020-12-31"></td>
                </tr>
                <tr>
                        <td>Area:</td>
                        <td><select id="area" name="area">
                                <option value="None">None</option>
                                <option value="Sion">Sion</option>
                                <option value="Wadala">Wadala</option>
								<option value="Chunabhatti">Chunabhatti</option>
                        </select></td>
                </tr>
                <tr>
                        <td>Type:</td>
                        <td><select id="type" name="type">
                                <option value="None">None</option>
                                <option value="Theft">Theft</option>
                                <option value="Assault">assault</option>
                                <option value="Cyber crime">cyber crime</option>
                        </select></td>
                 <tr>
                        <td>Comment</td>
			<td><textarea rows="3" cols="22" name="fir" placeholder="Write complaint here"></textarea></td>
                </tr>
                <tr>
                        <td><input type="submit" name="submit"></td>
                </tr>
        </form>
</table>
</div>
</body>
</html>
</html>


<script type="text/javascript">
        function validate()
        {
                var flag=0;
                var f=document.a.fir.value;
                var d=document.a.date.value; 
                var ar=document.a.area.value;
                var typ=document.a.type.value;
                var e = document.getElementById("area");
                var sel = e.options[e.selectedIndex].text;
                var e1 = document.getElementById("type");
                var sel1 = e.options[e.selectedIndex].text;
                
                if(d!="")
                        flag=1;
                else{
                        flag=0;
                        alert("Please fill date!");
                        return false;
                }
                if(sel=="None"){
                        flag=0;
                        alert("Please fill area!")
                        return false;
                }
                else
                        flag=1;
               
                if(sel1=="None"){
                        flag=0;
                        alert("Please fill type!")
                        return false;
                }
                else
                        flag=1;
                
                if(f!="")
                        flag=1;
                else{
                        flag=0;
                        alert("Please fill Comment!");
                        return false;
                }
        }
</script>
<?php include 'dbcon/dbcon.php';
if(isset($_POST['submit']))
{  
        session_start();
        $mid=$_SESSION['user'];
        $date=$_POST['date'];
        $are=$_POST['area'];
        $typ=$_POST['type'];
        $com=$_POST['fir'];
$sqlq="INSERT INTO fir (dat,area,type,com,user) VALUES ('$date','$are','$typ','$com','$mid')";
if (mysqli_query($conn,$sqlq)){
                echo "<script>alert('data sent to $are Police Station');</script>";
                echo '<script>window.location.href="http://127.0.0.1:8012/project/user.php"</script>';
    }
else
                echo "failed";
}
?>

<?php include 'footer/footer.html' ?>