<?php
require("../db/connect.php");
if ($conn){
    // var_dump($_POST["marked"]);
    $marked = $_POST["marked"];
    $started_date = $_POST["started_date"];
    $ended_date = $_POST["ended_date"];
    $title = $_POST["title"];
    var_dump($_POST);

    $stmt = "SELECT * FROM tracker;";
    $res = $conn->query($stmt);
    if ($res){
        $stmt = "INSERT into tracker(Started_Date, Ended_Date, Title, Marked) values('$started_date', '$ended_date', '$title', '$marked')";
        while($row = $res->fetch_assoc()){
            var_dump($row["Title"]);
            if ($row["Title"] == $title){
                echo "True";
                $stmt = "UPDATE tracker set Marked = '$marked' where Title = '$title'";
                break;
            }
        }
    }
    echo $stmt;
    $res = $conn->query($stmt);
    if ($res){
        echo "Sucessful";
    }else{
        echo mysqli_error($conn);
    }
}else{
    echo "False";
}
