<?php
include_once '../includes/koneksi.php';

$nip = $_POST['nip'];

$sql = "DELETE FROM pegawai WHERE nip=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $nip);

if($stmt->execute()) {
	header('location:../index.php?posisi=pegawai');
} else {
	header('location:../index.php?posisi=pegawai');
}