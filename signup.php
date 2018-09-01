<?php include 'header/header.php' ?>
<!DOCTYPE html>
<html >
<body>

<h3 align="center">Sign Up</h3>
<table id="y">
        <form method="POST" name="a" action="" onsubmit="return validate()">
                <tr>
                        <td>First Name:</td>
                        <td><input type="text" name="fname"></td>
                </tr>
                <tr>
                        <td>Last Name:</td>
                        <td><input type="text" name="lname"></td>
                </tr>
                <tr>
                        <td>Address:</td>
                        <td><textarea rows="2" cols="22" name="addr"></textarea></td>
                </tr>
                <tr>
                        <td>Email id:</td>
                        <td><input type="text" name="email"></td>
                </tr>
                <tr>
                        <td>Mobile Number:</td>
                        <td><input type="text" name="num"></td>
                </tr>
                <tr>
                        <td>Password:</td>
                        <td><input type="Password" name="pass1"></td>

                </tr>
                <tr>
                        <td>Confirm Password:</td>
                        <td><input type="Password" name="pass2"></td>
                </tr>
                <tr>
                        <td colspan="3" align="center"><input type="SUBMIT" value="SUBMIT" name="submit" style="border:none;font-size:20px;cursor:pointer;"></td>
                </tr>
        </form>
</table>
</body>
</html>
<?php include 'footer/footer.html'; ?>

<script type="text/javascript">
function validate(){
                var x=document.a.fname.value;
                var y=document.a.lname.value;
                var n=document.a.num.value;
                var m=document.a.email.value;
                var ad=document.a.addr.value;
                var i=0;
                var f=0;
                var flag=[0,0,0,0,0,0,0];
                var pas1=document.a.pass1.value;
                var pas2=document.a.pass2.value;
                var alpha=/[A-Z|a-z]/g;
                var no=/[0-9]-*[0-9]/g;
                var mail=/[a-z|A-Z|0-9|_|\.]@[a-z]|[A-Z]\.com/g;
                
                if(alpha.test(x) && alpha.test(y))
                        flag[1]=1;

                else
                        alert("Plz enter a valid input for name!");
                
                if(ad=="")
                        alert("Plz Enter address!");
                
                else    
                        flag[2]=1;
                
                if(no.test(n))
                        flag[3]=1;
                
                else
                        alert("Plz enter a valid phone no.!");

                        
                if(mail.test(m))
                        flag[4]=1;
                
                else
                        alert("Plz enter a valid email id!");
      
                if(pas1!=null && pas1.length>=6)
                        flag[5]=1;
                
                else
                        alert("Plz enter Password(should be more than 6 characters)!");
       
                
                if(pas1==pas2 && pas1!="")
                        flag[6]=1;
                
                else
                        alert("Passwords do not match!");

                for(i=1;i<=6;i++)
                {
                        if(flag[i]==0){
                                f=0;
                                break;
                        }
                        else
                                f=1;
                }
                
                if(f==1){
                        alert ("Form Submitted Successfully");
                        window.location.replace("http://127.0.0.1:8012/project/login.php");        
                }
                else
                        return false;

}
</script>

<?php 
include 'dbcon/dbcon.php';
if(isset($_POST['submit']))
{
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $add=$_POST['addr'];
        $email=$_POST['email'];
        $cno=$_POST['num'];
        $pas=$_POST['pass1'];
        $sql="INSERT INTO signup (fname,lname,address,mailid,mno,pass) VALUES ('$fname','$lname','$add','$email','$cno','$pas')";
        if(mysqli_query($conn,$sql))
                echo "done";
        else
                echo "fail";

}
?>

<style type="text/css">
        #y{
                background-color:#3dc6c2;
                position:relative;
                left:20%;
                font-size:25px;
                padding:20px;
                line-height:40px;
                width:500px;
                border-radius:20px;
                height:500px;
        }
</style>