<?php
include_once '../includes/koneksi.php';

$nomorRekening = $_POST['nomorRekening'];

$sql = "DELETE FROM rekening WHERE nomorRekening=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $nomorRekening);

if($stmt->execute()) {
	header('location:../index.php?posisi=rekening');
} else {
	header('location:../index.php?posisi=rekening');
}