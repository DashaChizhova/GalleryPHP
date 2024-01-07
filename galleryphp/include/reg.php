<?php
session_start();
require_once("db_connect.php");

$login = $_POST["login"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$repeat_password = $_POST["repeat_password"];
$rights = $_POST["rights"];

if($password === $repeat_password) {
    $path = 'uploads_images/'.time().$_FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$path)) {
        $_SESSION['message'] = 'Error loading the image';
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    $password = $password;
    $sql = "INSERT INTO `user` (`id`, `login`, `pass`, `name`, `phone`, `email`, `text`, `image`, `rights`)
            VALUES 
            (NULL, '$login','$password','$name','$phone','$email',NULL,'$path','$rights')
    ";
    mysqli_query($mysqli, $sql);
    $_SESSION['message'] = 'Registration was successful!';
    header('Location: ../aut.php');

} else {
        $_SESSION['message'] = 'Passwords dont match!';
        header("Location: {$_SERVER['HTTP_REFERER']}");
}