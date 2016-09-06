<?php
include_once '../includes/koneksi.php';

$noSPPD = $_POST['noSPPD'];
$noSPT = $_POST['noSPT'];
$kuasaAnggaran = $_POST['kuasaAnggaran'];
$pelaksanaDinas = $_POST['pelaksanaDinas'];
$tingkatBiaya = $_POST['tingkatBiaya'];
$transportasi = $_POST['transportasi'];
$tempatBerangkat = $_POST['tempatBerangkat'];
$tempatTujuan = $_POST['tempatTujuan'];
$akun = $_POST['akun'];

$sql = "UPDATE sppd SET noSPT=?, kuasaAnggaran=?, pelaksanaDinas=?, tingkatBiaya=?, transportasi=?, tempatBerangkat=?, tempatTujuan=?, akun=? WHERE noSPPD=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $noSPT, $kuasaAnggaran, $pelaksanaDinas, $tingkatBiaya, $transportasi, $tempatBerangkat, $tempatTujuan, $akun, $noSPPD);

if($stmt->execute()) {
	header('location:../index.php?posisi=sppd');
} else {
	header('location:../index.php?posisi=sppd');
}