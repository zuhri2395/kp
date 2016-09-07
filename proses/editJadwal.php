<?php
include_once '../includes/koneksi.php';
include_once '../includes/function.php';

$nip = $_POST['nip'];
$no = $_POST['no'];
$tanggalBerangkat = $_POST['tanggalBerangkat'];
$tanggalBerakhir = $_POST['tanggalBerakhir'];

$sql = "SELECT * FROM jadwal_dinas WHERE nip='$nip'";
$query = $conn->query($sql);
$inpBerangkat = convertMonth($tanggalBerangkat);
$inpPulang = convertMonth($tanggalBerakhir);
$inpBerangkat = strtotime($tanggalBerangkat);
$inpPulang = strtotime($tanggalBerakhir);
$crash = 0;

while($row = $query->fetch_object()) {
	$dbBerangkat = strtotime(convertMonth($row->tanggalBerangkat));
	$dbPulang = strtotime(convertMonth($row->tanggalBerakhir));

	if(($inpBerangkat == $dbBerangkat) || ($inpBerangkat == $dbPulang) || ($inpPulang == $dbPulang) || ($inpPulang == $dbBerangkat )) {
		$crash++;
	} else if(($inpBerangkat > $dbBerangkat) && ($inpBerangkat < $dbPulang)) {
		$crash++;
	} else if(($inpPulang > $dbBerangkat) && ($inpPulang < $dbPulang)) {
		$crash++;
	}
}

if($crash > 0) {
	header('location:../index.php?posisi=jadwal');
} else {	
	$sql = "UPDATE jadwal_dinas SET nip=?, tanggalBerangkat=?, tanggalBerakhir=? WHERE no=?";
	$prepared = $conn->prepare($sql);
    $prepared->bind_param("ssss", $nip, $tanggalBerangkat, $tanggalBerakhir, $no);
    $prepared->execute();
	header('location:../index.php?posisi=jadwal');
}
