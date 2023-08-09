<?php
require("../db/connect.php");
if(isset($_POST["loginBtn"])){
    $username = $_POST["username"];
    $sql = "select * from admin where username = '$username'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
            $password = $_POST["password"];
            if ($password == $row["password"]){  
                header("location:./admindashboard.php");
            }else{
                echo "something is wrong";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="bg-image"></div>
    <div class="container">
        <form action="#" method="POST">
            <h1>Admin Login</h1>
            <div class="field-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="" placeholder="Enter username"/>
                
            </div>
            <div class="field-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="" placeholder="Enter Password" />
                <button type="submit" name="loginBtn" class="loginBtn">Submit</button>
        </form>
    </div>
</body>
</html>