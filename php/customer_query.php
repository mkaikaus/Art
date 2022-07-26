<?php
  session_start();
  include_once('database.php');
  if($connect){
    if(isset($_SESSION['Email'])){
        
      $sql="SELECT * FROM customer_info where Email='$_SESSION[Email]'";
      $res=mysqli_query($connect, $sql);
      $row=mysqli_fetch_assoc($res);
      $CustID=$row['CustomerID'];
      $sql2="SELECT * FROM order_info where CustomerID='$CustID'";
      $res2=mysqli_query($connect, $sql2);
      $row2=mysqli_fetch_assoc($res2);
    }
  }
?>
<?php
    if(isset($_GET['delete'])){
        $CustomerID=$_GET['delete'];
        $del="DELETE FROM customer_info where CustomerID='$CustomerID'";
        $res3=mysqli_query($connect,$del);
        if($res3){
            header('location:index.php');
        }
    }
?>
<?php
    if(isset($_GET['order'])){
        $_SESSION['CustomerID']=$row['CustomerID'];
        header('location:booking.php');
        }
?>

<?php
    if($connect){
        if(isset($_SESSION['CustomerID'])){
            $CustomerID=$_SESSION['CustomerID'];
            $sql2="SELECT * FROM order_info where CustomerID='$CustomerID'";
            $res2=mysqli_query($connect, $sql2);
            $row2=mysqli_fetch_assoc($res2);
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
    <link rel="stylesheet" href="../css/admin_query.css">
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

    <div class="container heading">
        <h1>Welcome <?php echo $row['CustomerName'];?></h1>
        <h3>Operation</h3>
    </div>
    <div class="menu bg-light">
        <div class="container">
            <div class="row text-center info">
                <div class="col-sm">
                    <a href="customer_update.php" class="btn  btn-light">Update Details</a>
                    <!-- <button type="submit" class="btn btn-light" name="update">Update Details</button> -->
                </div>
                <div class="col-sm">
                    <a href="customer_query.php?delete=<?php echo $row['CustomerID'];?>" class="btn  btn-light">Delete Your Account</a></button>
                </div>
                <div class="col-sm">
                <a href="order_overview.php" class="btn  btn-light">Order Overview</a>
                </div>
                <div class="col-sm">
                <a href="customer_query.php?order=<?php echo $row['CustomerID'];?>" class="btn  btn-light">Place an order</a>
                </div>
                <div class="col-sm">
                <a href="index.php" class="btn  btn-light">Log Out</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container heading">
        <h3>Your Information</h3>
    </div>
    <table class="table table-striped text-center">
        <div class="container">
            <thead class="thead-dark container">
                <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                </tr>
            </thead>
            <tbody class="container">
                <tr>
                    <th scope="row"><?php echo $row['CustomerID'];?></th>
                    <td><?php echo $row['CustomerName'];?></td>
                    <td><?php echo $row['Email'];?></td>
                    <td><?php echo $row['Address'];?></td>
                    <td><?php echo $row['PhoneNumber'];?></td>
                </tr>
            </tbody>
        </div>
    </table>
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
