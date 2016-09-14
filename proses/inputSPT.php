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

$sql = "INSERT INTO spt VALUES(null, ?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssss", $noSPT, $noPergub, $noDPA, $noSPD, $tanggalSPD, $tanggalDinas, $jsonNIP, $keterangan, $tanggalSPT, $kotaSPT, $statusKadin, $penandatanganSPT);

if($stmt->execute()) {
	header('location:../index.php?posisi=spt');
} else {
	header('location:../index.php?posisi=spt');
}