<?php
include_once '../includes/koneksi.php';

$noSPPD = $_POST['noSPPD'];

$sql = "DELETE FROM sppd WHERE noSPPD=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $noSPPD);

if($stmt->execute()) {
	header('location:../index.php?posisi=sppd');
} else {
	header('location:../index.php?posisi=sppd');
}