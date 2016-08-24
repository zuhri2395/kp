<?php
include_once '../includes/koneksi.php';

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$pangkat = $_POST['pangkat'];
$golongan = $_POST['golongan'];
$jabatan = $_POST['jabatan'];
$npwp = $_POST['npwp'];

$sql = "UPDATE pegawai SET nama=?, jabatan=?, pangkat=?, golongan=?, npwp=? WHERE nip=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nama, $jabatan, $pangkat, $golongan, $npwp, $nip);

if($stmt->execute()) {
	header('location:../index.php?posisi=pegawai');
} else {
	header('location:../index.php?posisi=pegawai');
}