
<?php
session_start();
require("../db/connect.php");

if (isset($_POST["loginBtn"])) {
    $email = $_POST["email"];
    $sql = "SELECT * FROM register WHERE email = '$email'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $password = $_POST["password"];
            if ($password == $row["password"]) {
                // Store user data in session
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_email'] = $row['email'];
                // Add more user data to the session as needed

                // Store user data in a cookie (example, adjust expiration time)
                $cookie_name = "user_data";
                $cookie_value = json_encode(['user_id' => $row['id'], 'user_email' => $row['email']]);
                $cookie_expiration = time() + 3600; // Cookie expires in 1 hour
                setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");

                header("Location: ../content/page2.php");
            } else {
                echo "Something is wrong";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Luxurious+Script&family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&family=Poly:ital@1&display=swap"
        rel="stylesheet">
    <title>Main Page</title>
</head>

<body>

    <header>
        <div class="L-block">
            <div>
                <a href="#" title="logo">
                    <img src="./logo.JPG" alt="logo" class="logo-block">
                </a>
            </div>

            <div class="title-block">
                <p>Web Journal</p>
            </div>

            <div class="button-block">
                <a href="../register/register.php" class="btn">Register</a>
            </div>
        </div>
    </header>
    <div id="H-block">
        <div class="background-image"></div>
        <div class="log-block">
            <div class="title">
                <h2>Welcome to Digital Haven,</h2>
                <h3>where the art of journaling meets the convenience of technology</h3>
                <p>whether you're looking to record your daily experiences,express your innermost emotions or capture
                    your progresses, our platform provides a safe and secure space to do so.</p>
            </div>

            <form action="#" method="POST">
                <div class="form-field">
                    <label for="email"><input type="text" name="email" placeholder="Enter Your email" /></label>
                    <button type="button" name="nextBtn" class="form-btn">Next</button>
                </div>
                <div class="form-field">
                    <label for="password"><input type="password" id="password" name="password"
                            placeholder="Password" /></label>
                    <button type="submit" name="loginBtn" class="loginBtn">Login</button> 
                </div>
            </form>
        </div>
    </div>

    <script>
        const form = document.forms[0];
        const loginBtn = document.querySelector(".loginBtn");
        loginBtn.style.display = "none";

        const password = document.forms[0].password;
        password.parentNode.style.display = "none";
        const nextBtn = document.forms[0].nextBtn;

        nextBtn.addEventListener("click", function () {
            password.parentNode.style.display = "block";
            loginBtn.style.display = "block";
            nextBtn.style.display = "none";
            document.forms[0].email.parentNode.style.display = "none";
        });
    </script> 

</body>
</html>