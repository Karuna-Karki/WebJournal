<?php
require("../db/connect.php");
var_dump($_POST);

if (isset($_POST["save-button"])){
        $started = $_POST['Started_Date'];
        $ended = $_POST['Ended_Date'];
        $title = $_POST['Title'];
        $marked = $_POST['Marked'];

    $sql = "INSERT INTO register(Started_Date,Ended_Date, Title, Marked) VALUES('$started', ' $ended', '$title', '$marked')";
    $res = $conn->query($sql);


    
        if ($res){
            echo "Sucessfully Inserted";
            header("location: ../content/page2.php");
        }else{
            echo "Failed";
        }
    }else{
        echo "Cannot Insert Empty";
    }
    ?>
