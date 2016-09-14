<?php
include_once '../includes/koneksi.php';

$noSPT = $_POST['noSPT'];
$noPergub = $_POST['noPergub'];
$noDPA = $_POST['noDPA'];
$noSPD = $_POST['noSPD'];
$tanggalSPD = $_POST['tanggalSPD'];
$tanggalDinas = $_POST['tanggalDinas'];
$nip = $_POST['nip'];
$keterangan = $_POST['keterangan'];
$tanggalSPT = $_POST['tanggalSPT'];
$kotaSPT = $_POST['kotaSPT'];
$statusKadin = $_POST['statusKadin'];
$penandatanganSPT = $_POST['penandatanganSPT'];

$jsonNIP = json_encode($nip);

$sql = "UPDATE spt SET noPergub=?, noDPA=?, noSPD=?, tanggalSPD=?, tanggalDinas=?, nip=?, keterangan=?, tanggalSPT=?, kotaSPT=?, statusKadin=?, penandatanganSPT=? WHERE noSPT=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssss", $noPergub, $noDPA, $noSPD, $tanggalSPD, $tanggalDinas, $jsonNIP, $keterangan, $tanggalSPT, $kotaSPT, $statusKadin, $penandatanganSPT, $noSPT);

if($stmt->execute()) {
	header('location:../index.php?posisi=spt');
} else {
	header('location:../index.php?posisi=spt');
}