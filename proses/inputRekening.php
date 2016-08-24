<?php
include_once '../includes/koneksi.php';

$nomorRekening = $_POST['nomorRekening'];
$judul = $_POST['judul'];
$uraian = $_POST['uraian'];

$sql = "INSERT INTO rekening(nomorRekening, judul, uraian) VALUES(?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $nomorRekening, $judul, $uraian);

if($stmt->execute()) {
	header('location:../index.php?posisi=rekening');
} else {
	header('location:../index.php?posisi=rekening&status=gagal');
}