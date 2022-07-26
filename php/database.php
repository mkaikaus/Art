<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "art";
    $connect= mysqli_connect($servername,$username,$password,$dbname);
    if($connect){
        // echo "connected";
    }
    else{
        echo "not connected";
    }

?>