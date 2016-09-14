<?php
include_once '../includes/koneksi.php';

$noSBP = $_POST['noSBP'];

$sql = "DELETE FROM buktipengeluaran WHERE noSBP=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $noSBP);

if($stmt->execute()) {
	header('location:../index.php?posisi=buktipengeluaran');
} else {
	header('location:../index.php?posisi=buktipengeluaran');
}