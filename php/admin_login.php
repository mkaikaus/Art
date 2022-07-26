<?php
  session_start();
    include_once('database.php');
    if($connect){
        if(isset($_POST['login'])){
            $Email=$_POST['Email'];
            $Password=$_POST['Password'];
            $check= "Select * from admin where Email='$Email' and Password='$Password'";
            $res2=mysqli_query($connect,$check);
            if(mysqli_num_rows($res2)>0){
              $_SESSION['Email']=$Email;
                header('location:admin_query.php');
            }else{
              echo '<script>alert("Wrong Email or Password.Try again with correct one.")</script>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallary</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/admin_login.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand logo" href="#">Art Gallary</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>      
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active bg-info" style="margin: 5px">
                <a class="nav-link text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item bg-info" style="margin: 5px">
                <a class="nav-link text-light" href="admin_login.php">Admin Login</a>
              </li>
              <li class="nav-item bg-info" style="margin: 5px">
                <a class="nav-link text-light" href="customer_login.php">Customer - Login/Sign up</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="container login">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="Password">
            </div>
            <button type="submit" class="btn btn-info" name="login">Log in</button> 
          </form>
    </div>
    
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/wow.js"></script>
    <script>
    new WOW.init();
    </script>
    <script src="../js/main.js"></script>
</body>
</html>