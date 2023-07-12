<?php
require("../db/connect.php");
var_dump($_POST);

if (isset($_POST["save-btn"])){
    if (isset($_POST["note_content"])){
        $note_content = $_POST["note_content"];
        $insert_query = "INSERT INTO notes(content) VALUES('$note_content')";
    
        $res = $conn->query($insert_query);
    
        if ($res){
            echo "Sucessfully Inserted";
            header("location: ../content/page2.php");
        }else{
            echo "Failed";
        }
    }else{
        echo "Cannot Insert Empty";
    }
}