<?php
include_once '../includes/koneksi.php';

$noPergub = $_POST['noPergub'];

$sql = "DELETE FROM pergub WHERE noPergub=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $noPergub);

if($stmt->execute()) {
	header('location:../index.php?posisi=pergub');
} else {
	header('location:../index.php?posisi=pergub');
}