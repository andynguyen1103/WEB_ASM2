<?php
session_start();
$con = mysqli_connect('localhost','root','','asm2');
$productid= $_POST['product_id'];
if(mysqli_connect_error()){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
}
if(isset($_SESSION['currentuserID'])){
        
        $s="SELECT * FROM cart 
            WHERE userid =" .$_SESSION['currentuserID']." AND prodid = $productid";
        $result=mysqli_query($con,$s);
        if(mysqli_num_rows($result)==0)
        {
           $i1="INSERT into cart(userid,prodid,amount) values (".$_SESSION['currentuserID'].",$productid,1)";
            mysqli_query($con,$i1);
            header('location:../home/index.php');

        }
        else
        {
            $i2="UPDATE cart
                SET amount=amount+1
                WHERE userid=".$_SESSION['currentuserID']." and prodid= $productid";
            echo $i2;
            mysqli_query($con,$i2);
            header('location:../home/index.php');
        }
        
}
else
    {
        header('location:../register/register.php');
    }


?>