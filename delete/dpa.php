<?php
include_once '../includes/koneksi.php';

$noDPA = $_GET['noDPA'];

$sql = "DELETE FROM dpa WHERE noDPA=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $noDPA);

if($stmt->execute()) {
	header('location:../index.php?posisi=dpa');
} else {
	header('location:../index.php?posisi=dpa');
}