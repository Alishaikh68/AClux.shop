<?php
$username=$_POST["username"];
$password=$_POST["password"];
$con=mysqli_connect("localhost","root","","ACluxShop");
$sql= "insert into users values('$username','$password')";
$result=mysqli_query($con,$sql);
if($result);
{
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result =  $con->query($sql);

if ($result->num_rows > 0) {
    echo "<script>
             alert('Signup successfully redirected on Login Page ');
              window.location.href = 'login.html';
          </script>";
} 
else
{
    
    echo "<script>alert('user already exist')</script>";
}
}
?>