<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['name'])) {
    header('Location: ../php/main.php'); 
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Login page</title>
</head>

<body>

    <h1>php Session Login</h1>

    <div class="login-container">

        <input type="text" id="userID" name="user_name" placeholder="User name...">
        <span id="userErr"></span>
        <br><br>
        <input type="password" id="passwordId" name="user_password" placeholder="Enter your password...">
        <span id="passwordErr"></span>
        <br><br>
        <button name="login-btn" id='login-btn'>login</button>
        <p id="dataGetting"></p>
        <p>Don't have account ? <a href="register.php">Register</a></p>

    </div>



    <script src="../js/login.js"></script>
</body>

</html>