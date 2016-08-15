<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kp";

$conn = new mysqli($host, $user, $pass, $db);

if($db->connect_errno > 0) {
	die("Tidak dapat tersambung dengan [" . $db->connect_error . "]");
}
