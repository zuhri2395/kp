<?php
include_once '../includes/koneksi.php';

$noSPT = $_POST['noSPT'];

$sql = "DELETE FROM spt WHERE noSPT=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $noSPT);

if($stmt->execute()) {
	header('location:../index.php?posisi=spt');
} else {
	header('location:../index.php?posisi=spt');
}