<?php
session_start();

$emailValid = "kelompok5@example.com";
$passwordValid = "Password123!";

$email = $_POST['email'];
$password = $_POST['password'];

if ($email == $emailValid && $password == $passwordValid) {
    $_SESSION['email'] = $email;
    echo "success";
} else {
    echo "Email atau password salah";
}
