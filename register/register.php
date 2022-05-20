<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="function.js"></script>
    <title>Document</title>
</head>
<body class="text-center">
    <main class="form-signin">
    <form action="registration.php" method="post">
        <a href="../home/index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="#0D6EFD" class="bi bi-box-seam mb-4" viewBox="0 0 16 16">
                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
            </svg>
        </a>
        
        <h1 class="h3 mb-3 fw-bold text-primary">GETTING YOU IN</h1>
        <?php if( isset($_GET['error']) ) {?>
            <p class="text-danger" style="font-size: 1.3 rem;"><?php echo $_GET['error'];?> </p>
        <?php } ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" name="fname" class="form-control" id="firstName" placeholder="John" required>
                    <label for="firstName">First name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" name="lname" class="form-control" id="lastName" placeholder="Smith" required>
                    <label for="lastName">Last name</label>
                </div>
            </div>
            
        </div>
        
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
            <label for="email">Email Address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" name="cfpassword" class="form-control mb-2" id="cfpassword" placeholder="cfpassword" required>
            <label for="cfpassword">Confirm Password</label>
        </div>
        <small class="text-secondary">Already have one? <a href="../login/login.php">Sign In</a></small>
        <input type="submit" value="Sign Up" class="w-100 btn btn-lg btn-primary mt-2">
        <p class="mt-3 text-muted">© Andy's</p>
    </form>
    </main>
</body>
</html>