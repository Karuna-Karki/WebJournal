<?php
require("../db/connect.php");

if (isset($_POST["save-button"])) {
    $started = $_POST['started_date'];
    $ended = $_POST['ended_date'];
    $title = $_POST['title'];
    $marked = count(explode(',', $_POST['marked']));

    $sql = "INSERT INTO tracker(Started_Date, Ended_Date, Title, Marked) VALUES('$started', ' $ended', '$title', '$marked')";
    $res = $conn->query($sql);

    if ($res) {
        echo "Sucessfully Inserted";
        header("location: ../content/page2.php");
    } else {
        echo "Failed";
    }
}
