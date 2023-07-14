<?php
require("../db/connect.php");
var_dump($_POST);

if (isset($_POST["save-button"])) {
    $started = $_POST['started_date'];
    $ended = $_POST['ended_date'];
    $title = $_POST['title'];
    $marked = $_POST['marked'];

    $sql = "INSERT INTO tracker(Started_Date,Ended_Date, Title, Marked) VALUES('$started', ' $ended', '$title', '$marked')";
    $res = $conn->query($sql);

    echo $started;
    echo $title;

    if ($res) {
        echo "Sucessfully Inserted";
        // header("location: ../content/page2.php");
    } else {
        echo "Failed";
    }
} else {
    echo "Cannot Insert Empty";
}
