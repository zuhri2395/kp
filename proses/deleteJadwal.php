<?php
include_once '../includes/koneksi.php';

$no = $_POST['no'];

$sql = "DELETE FROM jadwal_dinas WHERE no=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $no);

if($stmt->execute()) {
	header('location:../index.php?posisi=jadwal');
} else {
	header('location:../index.php?posisi=jadwal');
}