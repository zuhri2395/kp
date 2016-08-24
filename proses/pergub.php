<?php
include_once '../includes/koneksi.php';

$noPergub = $_POST['noPergub'];
$keterangan = $_POST['keterangan'];
$tanggal = $_POST['tanggal'];
$tahun = $_POST['tahun'];

$sql = "INSERT INTO pergub(noPergub, keterangan, tanggal, tahun) VALUES(?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssss', $noPergub, $keterangan, $tanggal, $tahun);

if($stmt->execute()) {
	header('location:../index.php?posisi=pergub');
} else {
	header('location:../index.php?posisi=pergub');
}