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

    <h1>php Session Register</h1>

    <div class="register-container">

        <form id="formid">

            <input type="text" id="userID" name="user_name" placeholder="User name...">
            <span id="userErr" class="errorText"></span>
            <br><br>
            <input type="text" id="emailId" name="user_email" placeholder="Enter your email...">
            <span id="emailErr" class="errorText"></span>
            <br><br>
            <input type="password" id="passwordId" name="user_password" placeholder="Enter your password...">
            <span id="passwordErr" class="errorText"></span>
            <br><br>
            <button type="submit" name="register-btn" id="register-btn">register</button>
            <p>Already have account <a href="login.php">login</a></p>
        </form>

        <p id="dataGetting"></p>
    </div>










    <script src="../js/script.js"></script>
</body>

</html>