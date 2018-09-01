<?php include'header/header.php' ?>
<html>
<head>
</head>
<body>

<table id="log"><form method="POST" action="">
                <tr>
                        <td>Email id:</td>
                        <td><input type="text" name='mid'></td>
                </tr>
                <tr>
                        <td>Password:</td>
                        <td><input type="password" name='pas'></td>
                </tr>     
                <tr>
                        <td rowspan="3" align="center"><input type="SUBMIT" value="Login" name="go" id="b" ></td>
                </tr>
        </form>
</table>
<br>    
<div id="here">Dont have an account? Sign up <a href="signup.php">here!</a></div>
</body>
</html>
<?php include'footer/footer.html' ?>

<?php 
include 'dbcon/dbcon.php';
if(isset($_POST['go']))
{
        $flag=0;
        $cpas='9999999999';
        $mid=$_POST['mid'];
        $pas=$_POST['pas'];
        $sql = "SELECT pass FROM signup WHERE mailid='$mid'";
        $result=mysqli_query($conn,$sql);

        if(mysqli_query($conn,$sql) && $pas!="" && $mid!=""){
                while ($row = mysqli_fetch_assoc($result)){
                        $cpas=$row['pass'];
                        break;
                }
        }
        if($cpas==$pas && $pas!=""){
                        session_start();
                        $_SESSION['user']=$mid;
                        header("Location:http://127.0.0.1:8012/project/user.php?");
        }
        else
                echo "<script> alert('Email or password Invalid!') </script>";
        
        if(preg_match("/_sion/",$mid))
        {
                if($mid=="admin_sion" && $pas=="accsion")
                {
                        session_start();
                        $_SESSION['admin']="admin_sion";
                        header("Location:http://127.0.0.1:8012/project/fir1.php?ps=Sion"); 
                                
                }
                $cpas='9999999999';
                $name=explode('_',$mid);
                echo "$name[0]";
                $sql = "SELECT passw FROM sion WHERE officers='$name[0]'";
                $result=mysqli_query($conn,$sql);
                if(mysqli_query($conn,$sql) && $pas!="" && $mid!=""){
                        while ($row = mysqli_fetch_assoc($result)){
                                $cpas=$row['passw'];
                                        break;
                        }
                }
                if($cpas==$pas && $pas!=""){
                        session_start();
                        $_SESSION['off']=$name[0];
                        header("Location:http://127.0.0.1:8012/project/officer.php?ps=Sion");
                }
                else
                        echo "<script> alert('Email or password Invalid') </script>";
        }
}
?>    
<style type="text/css">
        #log{
                position:absolute;
                left:33%;
                font-size:29px;
                top:33%;
                background-color:#3dc6c2;
                height:210px;
                width:360px;
                padding:10px;
                border-radius: 15px;
        }
        #b{
        font-size:15px;
        position: absolute;
        left:50%;
        top:60%;
        }
        #here
        {
                position: relative;
                left:37%;
                top:36%;
                font-size:16px;
        }

</style>