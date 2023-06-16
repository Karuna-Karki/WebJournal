<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>User Management</title>
</head>
<body>
    <div class="form-container">
        <h1>Login User</h1>
        <form action="#" methods="POST" name="login Form">
            <div class="field-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value=""/>
                
            </div>
            <div class="field-group">
            <label for="password">Password:</label>
                <input type="password" id="password" name="password" value=""/>
            </div>
            <button type="submit" name="login_btn">Login</button>
        </form>
        <div class="extra-box">
            <span>Dont you have user account?</span>
            <a href="register.php" title="register user">Register User</a>
        </div>
    </div>
    
</body>
</html>