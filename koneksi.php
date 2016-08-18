<?php
ini_set('session.cookie_lifetime', 60*60);
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "kp";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_errno > 0) {
	die("Tidak dapat tersambung dengan [" . $conn->connect_error . "]");
}
