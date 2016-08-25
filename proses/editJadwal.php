<?php
include_once '../includes/koneksi.php';
include_once '../includes/function.php';

$nip = $_POST['nip'];
$no = $_POST['no'];
$tanggalBerangkat = convertMonth($_POST['tanggalBerangkat']);
$tanggalBerakhir = convertMonth($_POST['tanggalBerakhir']);

$sql = "SELECT * FROM jadwal_dinas WHERE nip='$nip'";
$query = $conn->query($sql);
$inpBerangkat = strtotime($tanggalBerangkat);
$inpPulang = strtotime($tanggalBerakhir);
$crash = 0;

while($row = $query->fetch_object()) {
	$dbBerangkat = strtotime(convertMonth($row->tanggalBerangkat));
	$dbPulang = strtotime(convertMonth($row->tanggalBerakhir));

	if($inpBerangkat < $dbBerangkat) {
		if($inpPulang < $dbBerangkat) {
			
		} else {
			$crash++;
		}
	} else {
		if($inpBerangkat != $dbPulang) {
			
		} else {
			$crash++;
		}
	}
}

if($crash > 0) {
	header('location:../index.php?posisi=jadwal');
} else {
	$tanggalBerangkat = convertMonth($tanggalBerangkat, 1);
	$tanggalBerakhir = convertMonth($tanggalBerakhir,1);

	
	$sql = "UPDATE jadwal_dinas SET nip=?, tanggalBerangkat=?, tanggalBerakhir=? WHERE no=?";
	$prepared = $conn->prepare($sql);
    $prepared->bind_param("ssss", $nip, $tanggalBerangkat, $tanggalBerakhir, $no);
    $prepared->execute();
	header('location:../index.php?posisi=jadwal');
}
