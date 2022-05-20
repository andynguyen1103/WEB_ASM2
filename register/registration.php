<?php
session_start();

$con = mysqli_connect('localhost','root','','asm2');
if(mysqli_connect_error()){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
}
$firstName=$_POST['fname'];
$lastName=$_POST['lname'];
$email = $_POST['email'];
$cfpass=$_POST['cfpassword'];
$password=$_POST['password'];
if( strlen($password) < 8 ){
    header('Location: register.php?error=Password must be longer than 8 characters');
    exit();
}
if($cfpass!=$password){
    header('Location: register.php?error=Not the same password');
    exit();
}
$hashedpass=hash('sha256', $password);
$s="select * from users where email ='$email'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num>0)
{
    header("Location: register.php?error=Email has already been taken!");
}
else{
    $reg = "insert into users(firstName, lastName, email, hashedPass) values('$firstName','$lastName','$email','$hashedpass')";
    mysqli_query($con,$reg);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['currentuserID']=$row['id'];
    header('location:../home/index.php');
}
?>