<?php
    session_start();
    include_once('database.php');
    if($connect){
        if(isset($_SESSION['Email'])){
            $find="SELECT * FROM customer_info where Email='$_SESSION[Email]'";
            $resFind=mysqli_query($connect, $find);
            $row=mysqli_fetch_assoc($resFind);
            if(isset($_POST['update'])){
                $CustomerID=$_POST['CustomerID'];
                $CustomerName=$_POST['CustomerName'];
                $Email=$_POST['Email'];
                $Password=$_POST['Password'];
                $Address=$_POST['Address'];
                $PhoneNumber=$_POST['PhoneNumber'];
                $sql="UPDATE customer_info SET CustomerName='$CustomerName',Email='$Email',Password='$Password',Address='$Address'
                ,PhoneNumber= '+88".$PhoneNumber."' where CustomerID='$CustomerID'";
                $res=mysqli_query($connect,$sql);
                if($res){
                    $_SESSION['Email']=$Email;
                    header('location:customer_query.php');
                   }
                   else{
                       echo "not found";
                   }
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
    <link rel="stylesheet" href="../css/customer_update.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand logo" href="#">Art Gallary</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="container update">
        <div class="text-center">
            <h2>Update Your Information</h2>
        </div>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">CustomerID</label>
                    <input type="text" class="form-control" id="inputName" name="CustomerID"
                        value="<?php echo $row["CustomerID"];?>" readonly placeholder="Enter Your ID">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputName">CustomerName</label>
                    <input type="text" class="form-control" id="inputName" name="CustomerName"
                        value="<?php echo $row["CustomerName"];?>" placeholder="Enter Your Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="Email"
                        value="<?php echo $row["Email"];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="Password"
                        value="<?php echo $row["Password"];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="Address"
                        value="<?php echo $row["Address"];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputNumber">Phone Number</label>
                    <input type="text" class="form-control" id="inputNumber" name="PhoneNumber"
                        pattern="[0]{1}[1]{1}[0-9]{9}" value="<?php echo $row["PhoneNumber"];?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>

            <!-- <a class="btn btn-info" href="customer_query.html" role="button">Log in</a> -->
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