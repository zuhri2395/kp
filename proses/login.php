<?php
include_once '../includes/koneksi.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$password = md5($password . "lpse");

$query = "SELECT * FROM user where username='$username' AND password='$password'";
$result = $conn->query($query);
$num = $result->num_rows;

if($num) {
  $_SESSION['username'] = $username;
  $_SESSION['login'] = true;
  header('location:../index.php');
} else {
  header('location:../login.php');
}