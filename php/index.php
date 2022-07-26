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
                        <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
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
    <section>
        <div class="hero">
            <img class="banner" src="../media/paint.jpg">
            <h1 class="text-center"><q>Art washes away from the soul the dust of everyday life.</q></h1>
        </div>
    </section>
    <div class="product container">
        <h1 class="mt-3">Our Art Gallary</h1>

        <?php
          include_once('database.php');
          if($connect){
            $art="SELECT * from art_info";
            $res=mysqli_query($connect, $art);
        ?>
        <div class="card-columns">
        <?php
                            while($row=mysqli_fetch_assoc($res)):
                            ?>
            <div class="card border-warning mt-4"  style="width: 20rem;">
                <img class="card-img-top" src="../user_image/<?php echo $row['Image'];?>" style="width: 20rem;height: 20rem;" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center text-danger"><?php echo $row['ArtTitle'];?></h5>
                    <h6 class="card-title"><span class="text-secondary">Artist: </span><?php echo $row['Artist'];?></h6>
                    <p class="card-text"><span class="text-secondary">Year of Making: </span><?php echo $row['YearOfMaking'];?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><span class="text-secondary">Price: </span><?php echo $row['Price'];?><span>TK.</span></small>
                </div>
            </div>
            <?php endwhile ; ?>
        </div>
        <?php
        }
        ?>
    </div>
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