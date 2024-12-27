<?php

session_start();

$conn = new mysqli("localhost", "root", "", "users") or die("failed to connect");

if (isset($_REQUEST['user_name'])) {

    $sql = 'SELECT user_name FROM users_detail';

    $result = $conn->query($sql);

    $output = [];

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

        if ($row['user_name'] == $_REQUEST['user_name']) {
            echo 0;
        }
    }

    $conn->close();
}
$conn = new mysqli("localhost", "root", "", "users") or die("failed to connect");

if (isset($_REQUEST['user_email'])) {

    $sql = 'SELECT user_email FROM users_detail';

    $result = $conn->query($sql);

    $output = [];

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

        if ($row['user_email'] == $_REQUEST['user_email']) {
            echo 1;
        }
    }

    $conn->close();
}
$conn = new mysqli("localhost", "root", "", "users") or die("failed to connect");

if (isset($_REQUEST['user_password'])) {


    // Hash the password before storing it
    $password = $_REQUEST['user_password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // echo $hashed_password;
    // echo "<br>";
    $sql = "INSERT INTO  users_detail values(null ,'" . $_REQUEST['user_name'] . "' , '" . $hashed_password . "' , '" . $_REQUEST['user_email'] . "' ) ";


    $conn->query($sql);
    if (!$conn->query($sql)) {
        $_SESSION['name'] = $_REQUEST['user_name'];
        echo "Form submitted successfully!!!!";
    } else {
        echo "Can't able to save your data";
    }

    $conn->close();
}
