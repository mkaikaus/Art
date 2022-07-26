<?php include_once('database.php');
    if($connect){
        $sqlcus="SELECT * from art_info";
        $rescus=mysqli_query($connect,$sqlcus);
        if($rescus){
            }
    }
?>
<?php 
include_once('database.php');
if($connect){
    if(isset($_POST['enter'])){
        $Title=$_POST['title'];
        $Amount=$_POST['amount'];
        $price="SELECT Price FROM art_info where ArtTitle='$Title'";
        $resprice=mysqli_query($connect,$price);
        if($resprice){
            $row2=mysqli_fetch_array($resprice);
            $tprice=$Amount*$row2['Price'];
        }
    }
    else{
        $Title="";
        $Amount="";
    }
}
?>
<?php
    session_start();
    include_once('database.php');
    if($connect){
        if(isset($_SESSION['CustomerID'])){
            if(isset($_POST['order'])){
                $Title=$_POST['title'];
                $Amount=$_POST['amount'];
                $Payment=$_POST['payment'];
                $CustomerID=$_SESSION['CustomerID'];
                $price="SELECT Price FROM art_info where ArtTitle='$Title'";
                $resprice=mysqli_query($connect,$price);
                if($resprice){
                    $row2=mysqli_fetch_array($resprice);
                    $tprice=$Amount*$row2['Price'];
                }
                $input="INSERT INTO order_info(ArtTitle,TotalAmount,TotalCost,PaymentMethod,flag,CustomerID) 
                VALUES('$Title','$Amount','$tprice','$Payment','0','$CustomerID')";
                $result= mysqli_query($connect, $input);
                if($result){
                    $_SESSION['CustomerID']=$CustomerID;
                    header('location:order_overview.php');
                }
                else{
                    echo "not added";
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
    <link rel="stylesheet" href="../css/booking.css">
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
    <div class="container order" style="background-color: beige">
        <form method="post" action="booking.php" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputName">Art Title</label>
                    <!-- <select class="form-select form-select" aria-label="Default select example" name="title"> -->
                    <select id="inputName" class="form-control" name="title" value="<?php echo $Title;?>">
                        <option selected>Select Art</option>
                        <?php while($row=mysqli_fetch_array($rescus)):?>
                        <option><?php echo $row['ArtTitle'];?></option>
                        <?php endwhile ; ?>
                        <?php 
                            if(isset($_POST['enter'])){?>
                        <option selected><?php echo $Title;?></option>
                        <?php }
                        ?>
                    </select>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputAmount">Amount</label>
                    <input id="demoInput" type="number" name="amount" min="1" max="10" value="<?php echo $Amount;?>">
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary" name="enter">Confirm Details</button>
            <br>
            <div class="form-row">
                <div class="form-group col-md-12 mt-3">
                    <p class="text-1">Price:
                        <?php 
                 if(isset($_POST['enter'])){?>
                        <span class="ans"><?php echo $tprice;?></span>
                        <?php }
                ?>
                    </p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputPayment">Payment method</label>
                    <select class="form-control" name="payment">
                        <option selected>Select Payment Method</option>
                        <option value="bkash">Bkash</option>
                        <option value="rocket">Rocket</option>
                        <option value="cash on delivery">Cash on delivery</option>
                        <option value="bank">Bank</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="order">Order Confirm</button>
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
    <script>
    function increment() {
        document.getElementById('demoInput').stepUp();
    }

    function decrement() {
        document.getElementById('demoInput').stepDown();
    }
    </script>
    <script src="../js/main.js"></script>
</body>

</html>