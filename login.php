<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>

    <form action="login.php" method="post">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label for="">Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="login" class="btn">Login</button>
        </div>
        <p>
        Not yet a member? <a href="register.php">Sign Up</a>
        </p>
    </form>
</body>
</html>