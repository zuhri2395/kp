<?php
include_once '../includes/koneksi.php';
include '../includes/function.php';
session_start();

$nip = $_POST['nip'];
$tanggalBerangkat = $_POST['tanggalBerangkat'];
$tanggalBerakhir = $_POST['tanggalBerakhir'];
$pegawaiCrash = array();

foreach($nip as $list) {
	$sql = "SELECT * FROM jadwal_dinas WHERE nip='$list'";
	$query = $conn->query($sql);
	$inpBerangkat = convertMonth($tanggalBerangkat);
	$inpPulang = convertMonth($tanggalBerakhir);
	$inpBerangkat = strtotime($inpBerangkat);
	$inpPulang = strtotime($inpPulang);
	$crash = 0;

	while($row = $query->fetch_object()) {
		$dbBerangkat = strtotime(convertMonth($row->tanggalBerangkat));
		$dbPulang = strtotime(convertMonth($row->tanggalBerakhir));

		if(($inpBerangkat == $dbBerangkat) || ($inpBerangkat == $dbPulang) || ($inpPulang == $dbPulang) || ($inpPulang == $dbBerangkat )) {
			$crash++;
			array_push($pegawaiCrash, $list);
		} else if(($inpBerangkat > $dbBerangkat) && ($inpBerangkat < $dbPulang)) {
			$crash++;
			array_push($pegawaiCrash, $list);
		} else if(($inpPulang > $dbBerangkat) && ($inpPulang < $dbPulang)) {
			$crash++;
			array_push($pegawaiCrash, $list);
		}
	}

	if($crash > 0) {
		
	} else {
		$sql = "INSERT INTO jadwal_dinas(nip, tanggalBerangkat, tanggalBerakhir) VALUES(?, ?, ?)";
		$prepared = $conn->prepare($sql);
        $prepared->bind_param("sss", $list, $tanggalBerangkat, $tanggalBerakhir);
        $prepared->execute();
	}
}
$_SESSION['crash'] = $pegawaiCrash;
$_SESSION['assign'] = $tanggalBerangkat . " - " . $tanggalBerakhir;
header('location:../index.php?posisi=jadwal');