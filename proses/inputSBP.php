<?php
include_once '../includes/koneksi.php';

$noSBP = $_POST['noSBP'];
$noSPT = $_POST['noSPT'];
$tahunAnggaran = $_POST['tahunAnggaran'];
$tanggalInventaris = $_POST['tanggalInventaris'];
$jumlahUang = $_POST['jumlahUang'];
$untukPembayaran = $_POST['untukPembayaran'];
$rekening = $_POST['rekening'];
$tipePajak = $_POST['tipePajak'];
$pegawaiPajak = (isset($_POST['pegawaiPajak']) ? $_POST['pegawaiPajak'] : NULL);
$tipeBelanja = (isset($_POST['tipeBelanja']) ? $_POST['tipeBelanja'] : NULL);
$jumlahBelanja = (isset($_POST['jumlahBelanja']) ? $_POST['jumlahBelanja'] : 0);
$penerimaPembayaran = $_POST['penerimaPembayaran'];
$penerimaBarang = $_POST['penerimaBarang'];
$bendaharaPengeluaran = $_POST['bendaharaPengeluaran'];
$kuasaAnggaran = $_POST['kuasaAnggaran'];
$nipPA = $_POST['nipPA'];

$sql = "INSERT INTO buktipengeluaran VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssssssssssssss', $noSBP, $noSPT, $tahunAnggaran, $tanggalInventaris, $jumlahUang, $untukPembayaran, $rekening, $tipePajak, $pegawaiPajak, $tipeBelanja, $jumlahBelanja, $penerimaPembayaran, $penerimaBarang, $bendaharaPengeluaran, $kuasaAnggaran, $nipPA);

if($stmt->execute()) {
	header('location:../index.php?posisi=buktipengeluaran');
} else {
	header('location:../index.php?posisi=buktipengeluaran');
}