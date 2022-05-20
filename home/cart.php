<?php
session_start();
if(!isset($_SESSION['currentuserID'])){
    header('location:../register/register.php');
    exit();
}
$con = mysqli_connect('localhost','root','','asm2');
$s="DELETE FROM cart WHERE amount=0";
mysqli_query($con,$s);
if(isset($_POST['remove'])){  
    $s="DELETE FROM cart WHERE userid=".$_SESSION['currentuserID']." AND prodid=".$_GET['id'];
    mysqli_query($con,$s);
    echo "<script> alert(\"Product has been removed!\") </script>
    <script> window.location=\"cart.php\" </script>";
    //  print_r($_GET['id']);
}
if(isset($_POST['plus'])){
    $s="UPDATE cart
    SET amount=amount+1
    WHERE userid=".$_SESSION['currentuserID']." AND prodid=".$_GET['id'];
    mysqli_query($con,$s);
    echo "<script> alert(\"DONE!\") </script>
    <script> window.location=\"cart.php\" </script>";
    //  print_r($_GET['id']);
}
if(isset($_POST['minus'])){
    $s="UPDATE cart
    SET amount=amount-1
    WHERE userid=".$_SESSION['currentuserID']." AND prodid=".$_GET['id'];
    mysqli_query($con,$s);
    echo "<script> alert(\"DONE!\") </script>
    <script> window.location=\"cart.php\" </script>";
    //  print_r($_GET['id']);
}
function spawnThings(){
    $con = mysqli_connect('localhost','root','','asm2');
    $s="SELECT * FROM cart JOIN products ON cart.prodid=products.id
        WHERE userid=".$_SESSION['currentuserID']."";
    $result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    if($num==0){
        echo "";
    }
    while($row=mysqli_fetch_assoc($result)){
        Items($row['name'],$row['price'],$row['imageLink'],$row['prodid'],$row['amount']);
    }

}
function total(){
    $con = mysqli_connect('localhost','root','','asm2');
    $total=0;
    $s="SELECT * FROM cart JOIN products ON cart.prodid=products.id
        WHERE userid=".$_SESSION['currentuserID']."";
    $result=mysqli_query($con,$s);
    while($row=mysqli_fetch_assoc($result)){
        $total+=$row['price']*$row['amount'];
    }
    return (int)$total;
}
function Items($name,$price,$imageLink,$id,$amount){
    $element="
                <form action=\"cart.php?action=remove&id=$id\" method=\"post\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3\">
                                <img src=\"$imageLink\" alt=\"\" class=\"img-fluid\">
                                
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$name</h5>
                                <h5 class=\"pt-2\">$$price</h5>
                                <button type=\"submit\" name=\"remove\" class=\"btn btn-outline-danger my-3\"><i class=\"bi bi-bag-dash-fill bi-3x\" style=\"font-size: 1.3rem;\"></i></button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button formaction=\"cart.php?action=plus&id=$id\" name=\"plus\" class=\"btn bg-light border rounded-circle\"><i class=\"bi bi-plus\"></i></button>
                                    <input type=\"text\" value=\"$amount\" class=\"form-control w-25 d-inline\">
                                    <button formaction=\"cart.php?action=minus&id=$id\" name=\"minus\" class=\"btn bg-light border rounded-circle\"><i class=\"bi bi-dash\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>";
        echo $element;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
      <!--Navigation-->
<?php
    require_once('../home/navigation.php');
?>
  <!--Navigation-->
<!--Item listing-->
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h2 class="text-primary my-3">My Cart</h2>
                <?php
                    spawnThings();
                ?>           
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>TOTAL</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <h6>Item price:</h6>
                        <h6>Delivery charge:</h6>
                        <hr>
                        <h6>Total amount:</h6>
                    </div>
                    <div class="col-md-6">
                    <?php
                        $shipping=0;
                        echo "<h6>".total()."$</h6>";
                        if(total()!=0){
                            if(total()>200){
                                echo "<h6 class=\"text-success\">FREE</h6>";
                            }
                            else{
                                $shipping=20;
                                echo "<h6 class=\"\">20$</h6>";
                            }
                        }
                        else{
                            echo "<h6 class=\"\">0$</h6>";
                        }
                        
                        
                    ?>
                        
                        <hr>
                    <?php
                        echo "<h6>".total()+$shipping."$</h6>";
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Item listing-->
    <!-- Footer -->
    <?php
    require_once('../home/footer.php');
?>
  <!-- Footer -->
</body>
</html>