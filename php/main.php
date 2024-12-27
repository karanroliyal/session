<?php

session_start();
if (!isset($_SESSION['name'])) {
    header('Location: register.php');
    exit;
}

echo "Welocme {$_SESSION['name']} to our home page";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
    <h1>Home page</h1>


    <a href="logout.php" >Logout</a>

    
</body>
</html>