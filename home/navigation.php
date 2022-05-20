
<!--Navigation-->
<nav class="navbar navbar-expand-md bg-light justify-content-between">
        <div class="container-fluid ">
            <!--the logo-->
            <a class="navbar-brand col-md-3 col-sm-2" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                  </svg>
                Andy's
              </a>
             <!--the logo-->
             <!--the toggler-->
             <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                 <span class="navbar-toggler-icon"></span>
                </button>
            <!--the toggler-->
            <div class="collapse navbar-collapse col-md-9 col-sm-10" id="mynavbar">
                <!--The buttons-->
                <ul class="navbar-nav col-md-8 col-sm-10 d-flex justify-content-evenly">
                    <li class="nav-item"><a class="nav-link" href="../home/index.php">Home</a></li>
                    <?php 
                    if(isset($_SESSION['currentuserID']))
                    { echo
                     '<li class="nav-item"><a class="nav-link" href="../profile/profile.php" style="padding:0;"><i class="bi bi-person-circle" style="font-size: 2.5rem; padding:0;"></i></a></li> 
                      <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
                    }
                  else
                  {
                    echo          
                      '<li class="nav-item"><a class="nav-link" href="../login/login.php">Sign In</a></li>
                      <li class="nav-item"><a class="nav-link" href="../register/register.php">Sign Up</a></li>'; 
                  }
                    ?>

                </ul>
                <!--The buttons-->
                <!--The shopping bag-->
                <div class="col-md-4 col-sm-2 d-flex justify-content-md-end">
                    <a href="cart.php" class="me-3">
                        <button type="button" class="btn btn-outline-primary" >
                            <i class="bi bi-bag" style="font-size: 24px;"></i>                       
                                <?php
                                    
                                    if(isset($_SESSION['currentuserID'])){
                                        $con = mysqli_connect('localhost','root','','asm2');
                                        $s="select * from cart where userid =".$_SESSION['currentuserID']."";
                                        $result=mysqli_query($con,$s);
                                        $num=mysqli_num_rows($result);     
                                        echo "<strong>$num</strong>";
                                    }
                                    else{
                                                                          
                                        echo "<strong>0</strong>";

                                    }
                                ?>
                        </button>
                    </a>
                </div>
                <!--The shopping bag-->
            </div>
        </div>
  </nav>