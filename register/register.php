<?php
require("../db/connect.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO register(username, email,  password) VALUES('$username','$email', '$password')";
    
    $res = $conn->query($sql);

    if($res) {
        header("location: /WebJournal/mainpage/index.php");
    }else{
        echo "Couldn't insert";
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
            <span></span>
            
        </div>
        <div class="field-group">
            <label for="email">E-Mail</label>
            <input type="text" id="email" name="email" value=""/>
            <span></span>
            
        </div>
        <div class="field-group">
            <label for="fname">Password</label>
            <input type="password" id="password" name="password" value="" />
            <span></span>
        </div>
        <!-- <a name="submit" >Create Account</a> -->
        <!-- <button  type="submit"  id="submit"></button> -->
        <div class="button-block">
            <button type="submit" class="btn" name="submit">Register</button>
        </div>
    </form>

</div>
<script type="text/javascript">
        let form = document.forms[0];
        let username = form.username,
            email = form.email,
            password = form.password;

            let unameRgx = /^[a-z0-9_-]{3,15}$/g;
            let emailRgx = /^(.+)@(.+)$/g;
            let pwdRgx  = /^(?=.*[0-9])(?=.{8,})/g;
        

        form.addEventListener("submit", function(e) {
            console.log("Submitted");
            if(username.value == '' || 
            email.value == '' || 
            password.value == '') {
                e.preventDefault();
                alert("All fields are required!");
            }
        });
        username.addEventListener("change", function() {
            if(unameRgx.test(this.value) == false) {
                this.nextElementSibling.innerHTML = "Username format not matched.";
            }else{
                this.nextElementSibling.innerText = "";
            }
        });
        email.addEventListener("change", function(){
            if(emailRgx.test(this.value) == false){
                this.nextElementSibling.innerText = "email format not valid.";
            }else{
                this.nextElementSibling.innerText = "";
            }
           
        });
        password.addEventListener("change", function(){
            if(pwdRgx.test(this.value) == false){
                this.nextElementSibling.innerText = "Password format not valid.";
            } else{
                this.nextElementSibling.innerText = "";
            }
        });
    </script>
</body>
</html>