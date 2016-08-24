<?php
include_once '../includes/koneksi.php';

$noDPA = $_POST['noDPA'];
$kegiatan = $_POST['kegiatan'];
$tanggal = $_POST['tanggal'];

$sql = "UPDATE dpa SET kegiatan=?, tanggal=? WHERE noDPA=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $kegiatan, $tanggal, $noDPA);

if($stmt->execute()) {
	header('location:../index.php?posisi=dpa');
} else {
	header('location:../index.php?posisi=dpa');
}