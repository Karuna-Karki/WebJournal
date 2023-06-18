<?php
    //database connection
    $conn = mysqli_connect('localhost', 'root', '', 'project');
    if (!$conn){
        die("connection failed" . mysqli_connect_error());
    } else {
        echo "Connected Sucessfully";
    }
?>