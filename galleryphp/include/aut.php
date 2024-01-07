<?php
session_start();
require_once("db_connect.php");

$email = $_POST['email'];
$password = $_POST['password'];

$check_user = mysqli_query($mysqli, "SELECT * FROM `user` 
                            WHERE `email` = '$email' AND `pass` = '$password'");

if(mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id" => $user["id"],
        "email"=> $user["email"],
        "login"=> $user["login"],
        "avatar"=> $user["image"],
        "rights" => $user["rights"]
    ];
    header('Location: ../lk.php');
} else {
    $_SESSION['message'] = 'Passwords dont match!';
    header("Location: {$_SERVER['HTTP_REFERER']}");
}