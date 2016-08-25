<?php
include_once '../includes/koneksi.php';

$nomorRekening = $_POST['nomorRekening'];
$judul = $_POST['judul'];
$uraian = $_POST['uraian'];

$sql = "UPDATE rekening SET judul=?, uraian=? WHERE nomorRekening=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $judul, $uraian, $nomorRekening);

if($stmt->execute()) {
	header('location:../index.php?posisi=rekening');
} else {
	header('location:../index.php?posisi=rekening&status=gagal');
}