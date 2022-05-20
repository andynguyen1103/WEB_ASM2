<?php
session_start();

$con = mysqli_connect('localhost','root','','asm2');
if(mysqli_connect_error()){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
}
$email = $_POST['email'];
$hashedpass=hash('sha256', $_POST['password']);
$sql="select * from users where email ='$email' and hashedPass='$hashedpass'";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
if($num==0)
{
    header("Location: login.php?error=Incorrect email or password!");
}
else{
    $row = mysqli_fetch_assoc($result);
    $_SESSION['currentuserID']=$row['id'];
    header('location:../home/index.php');
}
?>