<?php
if(mysqli_connect_error()){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
}
function component($itemName,$itemPrice,$imageLink,$id){
  
  $markedPrice=$itemPrice*1.1;
  
  $element="
    <div class=\"col-xl-3 col-lg-4 col-sm-6 py-3\">
      <form action=\"addcart.php\" method=\"post\">
        <div class=\"card shadow\">
          <div>
            <img src=\"$imageLink\" 
            alt=\"\" class=\"img-fluid card-img-top\">
          </div>
          <div class=\"card-body\">
            <h6 class=\"card-title\">$itemName</h6>
            <h6 class=\"text-primary\">
              <i class=\"bi bi-star-fill\"></i>
              <i class=\"bi bi-star-fill\"></i>
              <i class=\"bi bi-star-fill\"></i>
              <i class=\"bi bi-star-fill\"></i>
              <i class=\"bi bi-star-half\"></i>
            </h6>
            <h5>
              <small><s class=\"text-secondary\">$$markedPrice</s></small>
              <span class=\"price\">$$itemPrice</span>
            </h5>
            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to cart <i class=\"bi bi-cart-plus-fill\"></i></button>
            <input type='hidden' name='product_id' value='$id'>
          </div>
        </div>
      </form>
    </div>";
    echo $element;
}
function spawnItems(){
  $con = mysqli_connect('localhost','root','','asm2');
  $s="select * from products";
  $result=mysqli_query($con,$s);
  while($row=mysqli_fetch_assoc($result)){
    component($row['name'],$row['price'],$row['imageLink'],$row['id']);
  }
}
?>
