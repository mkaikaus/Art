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
    if(isset($_GET['cancel'])){
        $OrderID=$_GET['cancel'];
        $del="DELETE FROM order_info where OrderID='$OrderID'";
        $res3=mysqli_query($connect,$del);
        if($res3){
            $sqlcus="SELECT * from order_info";
           // $sqlcus="SELECT * FROM order_info where CustomerID='$CustomerID'";
        }
    }

?>

<?php
include_once('database.php');
if(isset($_POST['search'])){
    $valuetosearch=$_POST['valueTosearch'];
    $query="SELECT * FROM order_info inner join customer_info using(CustomerID) where concat(`CustomerName`,`ArtTitle`) LIKE '%$valuetosearch%'";
    $res2=mysqli_query($connect,$query);
}
else{
    $query="SELECT * FROM order_info inner join customer_info using(CustomerID)";
    $res2=mysqli_query($connect,$query);
    $valuetosearch="";
}
?>

<?php
include_once('database.php');
if(isset($_GET['delivery'])){
    $OrderID=$_GET['delivery'];
    $sql="UPDATE order_info SET `flag` = '1' WHERE OrderID='$OrderID'";
    $res4=mysqli_query($connect,$sql);
    if($res4){
        header('location:order_table.php');
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
                    <button type="submit" class="btn btn-light">Order Information</button>
                </div>
                <div class="col-sm">
                    <a href="index.php" class="btn  btn-light">Log Out</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <form action="order_table.php" method="POST">
        <div class="input-group align-self-center">
            <div class="form-outline" style="margin-left: 37.5vw; width: 20vw;">
            <input type="search" id="form1" class="form-control" name="valueTosearch" placeholder="Value to search" value="<?php echo $valuetosearch;?>"/>
            </div>
            <button type="submit" class="btn btn-success" name="search" style="width: 5vw">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <h3 CLASS="text-success font-weight-bolder mt-3 text-center"> Order information</h3>
        <table class="table table-striped text-center table-hover table-bordered">
                <div class="container">
                    <thead class="thead-dark container">	
                            <th>OrderID</th>
                            <th>Customer Name</th>
                            <th>ArtTitle</th>
                            <th>Amount</th>
                            <th>TotalCost</th>
                            <th>PaymentMethod</th>
                            <th>Cancel Order</th>
                            <th>Order status</th>
                        </thead>
                    <?php
                            while($row2=mysqli_fetch_assoc($res2)):
                            ?>
                    <!-- <table class="table table-striped table-hover table-bordered "> -->
                        <tr class="text-center container">
                            <td><?php echo $row2['OrderID'];?></td>
                            <td><?php echo $row2['CustomerName'];?></td>
                            <td><?php echo $row2['ArtTitle'];?></td>
                            <td><?php echo $row2['TotalAmount'];?></td>
                            <td><?php echo $row2['TotalCost'];?></td>
                            <td><?php echo $row2['PaymentMethod'];?></td>
                            <?php
                                if($row2['flag']==0){
                                    ?>
                                    <td><a href="order_table.php?cancel=<?php echo $row2['OrderID'];?>" class="btn btn-danger">Cancel Order</a></button></td>
    
                                    <?php
                                }else{
                                    ?>
                                    <td><button type="button" class="btn btn-danger" disabled>Cancel order</button></td>
                                    <?php
                                }
                            ?>
                            <?php
                                if($row2['flag']==0){
                                    ?>
                                    <td><a href="order_table.php?delivery=<?php echo $row2['OrderID'];?>" class="btn btn-success">Confirm Delivery</a></td>
                                    <?php
                                }else{
                                    ?>
                                    <td><?php echo "Delivered"?><i class='fas fa-check-circle' style='color: green'></i></td>
                                    <?php
                                }
                            ?>
                        </tr>
                    <?php endwhile ; ?>
                    </div>
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