<?php
session_start();

$con = mysqli_connect('localhost','root','','asm2');
if(mysqli_connect_error()){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
}
$s="select * from users where id =".$_SESSION['currentuserID'];
$result=mysqli_query($con,$s);
$row=mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="function.js"></script>
    <title>Document</title>
</head>
<body class="">
   <main>
        <a href="../home/index.php" class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="#0D6EFD" class="bi bi-box-seam mb-3" viewBox="0 0 16 16">
                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
            </svg>
            <h3 class="text-primary">Andy's</h3>
        </a>
        <table class="table w-100 text-left">
            <thead>
                <tr>
                <th colspan="3" scope="col">User information</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="text-primary">ID</th>
                    <td>
                    <?php
                        echo "<strong>".$row['id']."</strong>"
                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="text-primary">Name</th>
                    <td>
                        <?php
                        echo "<strong >".$row['firstName'].", ".$row['lastName']."</strong>"
                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="text-primary">Email</th>
                    <td>
                    <?php
                        echo "<strong>".$row['email']."</strong>"
                        ?>
                    </td>
                </tr>
               
                
            </tbody>
        </table>
    </main>
</body>
</html>