<?php
include_once '../includes/koneksi.php';

$noSPPD = $_POST['noSPPD'];
$hariUangHarian = $_POST['hariUangHarian'];
$biayaUangHarian = $_POST['biayaUangHarian'];
$biayaTransport = $_POST['biayaTransport'];
$biayaPenginapan = $_POST['biayaPenginapan'];
$hariSewa = $_POST['hariSewa'];
$biayaSewa = $_POST['biayaSewa'];
$bendaharaPengeluaran = $_POST['bendaharaPengeluaran'];
$penerima = $_POST['penerima'];
$kuasaAnggaran = $_POST['kuasaAnggaran'];
$pelaksanaKegiatan = $_POST['pelaksanaKegiatan'];

$sql = "INSERT INTO rincian VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssss", $noSPPD, $hariUangHarian, $biayaUangHarian, $biayaTransport, $biayaPenginapan, $hariSewa, $biayaSewa, $bendaharaPengeluaran, $penerima, $kuasaAnggaran, $pelaksanaKegiatan);

if($stmt->execute()) {
	header('location:../index.php?posisi=rincianbiaya');
} else {
	header('location:../index.php?posisi=rbp');
}