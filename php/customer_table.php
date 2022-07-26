<?php
  session_start();
  include_once('database.php');
  if($connect){
    if(isset($_SESSION['Email'])){
      $sql="SELECT * FROM admin where Email='$_SESSION[Email]'";
      $res=mysqli_query($connect, $sql);
      $row=mysqli_fetch_assoc($res);
    }
  }
?>
<?php
    include_once('database.php');
    if(isset($_GET['delete'])){
        $CustomerID=$_GET['delete'];
        $del="DELETE FROM customer_info where CustomerID='$CustomerID'";
        $res3=mysqli_query($connect,$del);
        if($res3){
            $sqlcus="SELECT * from customer_info";
        }
    }

?>
<?php
include_once('database.php');
if(isset($_POST['search'])){
    $valuetosearch=$_POST['valueTosearch'];
    $query="SELECT * FROM customer_info where concat(`CustomerName`,`Email`,`Address`) LIKE '%$valuetosearch%'";
    $result=mysqli_query($connect,$query);
}
else{
    $query="SELECT * FROM customer_info";
    $result=mysqli_query($connect,$query);
    $valuetosearch="";
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
        <h1>Welcome <?php echo $row['AdminName'];?></h1>
        <h3>Information</h3>
    </div>
    <div class="menu bg-light">
        <div class="container">
            <div class="row text-center info">
                <div class="col-sm">
                    <a href="customer_table.php" class="btn btn-light">Customer Information</a>
                </div>
                <div class="col-sm">
                    <a href="art_table.php" class="btn btn-light">Art's Information</a>
                </div>
                <div class="col-sm">
                <a href="order_table.php" class="btn btn-light">Order's Information</a>
                </div>
                <div class="col-sm">
                <a href="index.php" class="btn  btn-light">Log Out</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <form action="customer_table.php" method="POST">
        <div class="input-group align-self-center">
            <div class="form-outline" style="margin-left: 37.5vw; width: 20vw;">
            <input type="search" id="form1" class="form-control" name="valueTosearch" placeholder="Value to search" value="<?php echo $valuetosearch;?>"/>
            </div>
            <button type="submit" class="btn btn-info" name="search" style="width: 5vw">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <br>
                    <h3 CLASS="text-info font-weight-bolder text-center"> Customer's information</h3>
                    <table class="table table-striped table-hover table-bordered ">
                        <thead class="bg-dark text-light text-center">
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>PhoneNumber</th>
                            <th>Delete Account</th>
                        </thead>
                    <?php
                            while($row=mysqli_fetch_array($result)):
                            ?>
                    <!-- <table class="table table-striped table-hover table-bordered "> -->
                        <tr class="text-center">
                            <td><?php echo $row['CustomerID'];?></td>
                            <td><?php echo $row['CustomerName'];?></td>
                            <td><?php echo $row['Email'];?></td>
                            <td><?php echo $row['Address'];?></td>
                            <td><?php echo $row['PhoneNumber'];?></td>
                            <td><a href="customer_table.php?delete=<?php echo $row['CustomerID'];?>" class="btn  btn-danger">Delete Account</a></button></td>
                        </tr>
                        <?php endwhile ; ?>
                    </table>
                    </form>
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