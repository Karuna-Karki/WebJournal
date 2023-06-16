<?php
require("connect.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO register(username, email,  password) VALUES('$username','$email', '$password')";
    
    $res = $conn->query($sql);

    if($res) {
        echo "registration successfull";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="background-image">
        <img src="./Main image.jpg" alt="">
    </div>
    <div class="wrapper">
        <h1>Register</h1>
    <form action="#" method="POST" name="form_name">
        <div class="field-group">
            <label for="fname">Username</label>
            <input type="text" id="username" name="username" value="" />
            
        </div>
        <div class="field-group">
            <label for="email">E-Mail</label>
            <input type="text" id="email" name="email" value=""/>
            
        </div>
        <div class="field-group">
            <label for="fname">Password</label>
            <input type="password" id="password" name="password" value="" />
        </div>
        
        <div class="button-block">
                <a href="../content/page2.php" class="btn">Create account</a>
            </div>
    </form>
</div>
</body>
</html>