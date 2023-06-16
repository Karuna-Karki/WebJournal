<?php
require("connect.php");

if (isset($_POST['register_btn'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $faculty = $_POST['faculty'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];
    $sql = "INSERT INTO users1(Fullname, Email, faculty, password, remember) VALUES('$fullname','$email', '$faculty','$password', $remember)";
    
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
    <link rel="stylesheet" href="style.css">
    <title>User Management</title>
</head>

<body>
    <div class="form-container">
        <h1>Register</h1>
        <form action="#" method="post" name="login-from">
            <p><em>* </em> Fields are mandatory</p>
            <div class="field-group">
                <label for="fullname">Fullname <span>*</span></label>
                <input type="text" id="fullname" name="fullname" value="" />

            </div>
            <div class="field-group">
                <label for="email">Email <span>*</span></label>

                <input type="text" id="email" name="email" value="" />
            </div>

            <div class="field-group">
                <label for="faculty">Faculty <span>*</span></label>
                <select name="faculty" id="faculty">
                    <option value="">Choose Faculty</option>
                    <option value="BCA">BCA</option>
                    <option value="BIM">BIM</option>
                    <option value="Bsc Csit">Bcs Csit</option>
                    <option value="BIT">BIT</option>
                </select>
            </div>

            <div class="field-group">
                <label for="password">Password <span>*</span></label>
                <input type="password" id="password" name="password" value="" />
            </div>
            <div class="field-group">
                <label for="cpassword">Confirm Password <span>*</span></label>
                <input type="cpassword" id="cpassword" name="cpassword" value="" />
            </div>
            <div class="field-group1">
                <input type="checkbox" name="remember" id="remember" value="1" />
                <label for="remember">Remember Details</label>
            </div>
            <button type="submit" name="register_btn">Register</button>
        </form>

        <div class="extra-box">
            <span class="span">Already have an account?</span>
            <a href="index.php" title="Login user">Login User</a>
        </div>
    </div>

</body>

</html>