<?php
include_once '../includes/koneksi.php';

$noDPA = $_POST['noDPA'];
$kegiatan = $_POST['kegiatan'];
$tanggal = $_POST['tanggal'];

$sql = "INSERT INTO dpa(noDPA, kegiatan, tanggal) VALUES(?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $noDPA, $kegiatan, $tanggal);

if($stmt->execute()) {
	header('location:../index.php?posisi=dpa');
} else {
	header('location:../index.php?posisi=dpa');
}