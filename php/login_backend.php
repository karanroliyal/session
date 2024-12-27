<?php
session_start();


$conn = new mysqli("localhost" , "root" , "" , "users") or die("Failed to connect");


// Hash the password before storing it
$password = $_POST['user_password'];

$sql = "select user_name , user_password from users_detail where user_name  LIKE '{$_POST['user_name']}' limit 1";

$result = $conn->query($sql);

if($result->num_rows == 1){

    $user = $result->fetch_assoc();
    // print_r($user);

    if (password_verify($password, $user['user_password'])) {
        echo "success";
        $_SESSION['name'] = $_REQUEST['user_name'];
    } else {
        echo "unsuccessful";
    }
}
else{
    echo "no record found";
}

$conn->close();


?>