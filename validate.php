<?php
session_start();
require 'classes/Database.php';
require 'classes/User.php';

$db = (new Database())->getConnection();
$user = new User($db);

$username = $_POST['username'];
$password = $_POST['password'];

if ($user->login($username, $password)) {
    $_SESSION['username'] = $username;
    header('Location: form.php');
} else {
    echo "Login gagal! <a href='login.php'>Coba lagi</a>";
}
