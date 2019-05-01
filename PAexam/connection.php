<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "padb";

    $conn = mysqli_connect($host,$username,$password,$database);

    if(!$conn){
        echo "error while connection to databse..!!!".mysqli_connect_error($conn);
    }

?>