<?php
include_once '../includes/koneksi.php';

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$pangkat = $_POST['pangkat'];
$golongan = $_POST['golongan'];
$jabatan = $_POST['jabatan'];
$npwp = $_POST['npwp'];

$sql = "INSERT INTO pegawai(nip, nama, jabatan, pangkat, golongan, npwp) VALUES(?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nip, $nama, $jabatan, $pangkat, $golongan, $npwp);

if($stmt->execute()) {
	header('location:../index.php?posisi=pegawai');
} else {
	header('location:../index.php?posisi=pegawai');
}