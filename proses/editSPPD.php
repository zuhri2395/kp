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
$noRekening = ($akun == "dalam daerah" ? "1.25.1.07.01.09.15.19.5.2.2.15.01" : "1.25.1.07.01.09.15.19.5.2.2.15.02");

$sql = "UPDATE sppd SET noSPT=?, kuasaAnggaran=?, pelaksanaDinas=?, tingkatBiaya=?, transportasi=?, tempatBerangkat=?, tempatTujuan=?, akun=?, noRekening=? WHERE noSPPD=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $noSPT, $kuasaAnggaran, $pelaksanaDinas, $tingkatBiaya, $transportasi, $tempatBerangkat, $tempatTujuan, $akun, $noRekening, $noSPPD);

if($stmt->execute()) {
	header('location:../index.php?posisi=sppd');
} else {
	header('location:../index.php?posisi=sppd');
}