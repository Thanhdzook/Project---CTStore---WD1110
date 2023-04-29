<?php
    $servername = "localhost";
    $database = "mobilephoneshop";
    $username = "root";
    $password = "Ttadhp2608.";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
    }
?>