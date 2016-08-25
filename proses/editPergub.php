<?php
include_once '../includes/koneksi.php';

$noPergub = $_POST['noPergub'];
$keterangan = $_POST['keterangan'];
$tanggal = $_POST['tanggal'];
$tahun = $_POST['tahun'];

$sql = "UPDATE pergub SET keterangan=?, tanggal=?, tahun=? WHERE noPergub=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssss', $keterangan, $tanggal, $tahun, $noPergub);

if($stmt->execute()) {
	header('location:../index.php?posisi=pergub');
} else {
	header('location:../index.php?posisi=pergub');
}