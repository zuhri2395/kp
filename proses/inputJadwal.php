<?php
include_once '../includes/koneksi.php';
include '../includes/function.php';

$nip = $_POST['nip'];
$tanggalBerangkat = $_POST['tanggalBerangkat'];
$tanggalBerakhir = $_POST['tanggalBerakhir'];

foreach($nip as $list) {
	$sql = "SELECT * FROM jadwal_dinas WHERE nip='$list'";
	$query = $conn->query($sql);
	$inpBerangkat = convertMonth($tanggalBerangkat);
	$inpPulang = convertMonth($tanggalBerakhir);
	$inpBerangkat = strtotime($tanggalBerangkat);
	$inpPulang = strtotime($tanggalBerakhir);
	$crash = 0;

	while($row = $query->fetch_object()) {
		$dbBerangkat = strtotime(convertMonth($row->tanggalBerangkat));
		$dbPulang = strtotime(convertMonth($row->tanggalBerakhir));

		// if($inpBerangkat < $dbBerangkat) {
		// 	if($inpPulang < $dbBerangkat) {
				
		// 	} else {
		// 		$crash++;
		// 	}
		// } else {
		// 	if($inpBerangkat != $dbPulang) {
		// 		if($inpPulang <= $dbPulang) {
  //                   $crash++;
  //               } else if($inpBerangkat != $dbBerangkat) {

  //               } else {
  //                   $crash++;
  //               }
		// 	} else {
		// 		$crash++;
		// 	}
		// }

		if(($inpBerangkat == $dbBerangkat) || ($inpBerangkat == $dbPulang) || ($inpPulang == $dbPulang) || ($inpPulang || $dbBerangkat )) {
			$crash++;
		} else if(($inpBerangkat > $dbBerangkat) && ($inpBerangkat < $dbPulang)) {
			$crash++;
		} else if(($inpPulang > $dbBerangkat) && ($inpPulang < $dbPulang)) {
			$crash++;
		}
	}

	if($crash > 0) {
		// header('location:../index.php?posisi=jadwal&status=gagal');
	} else {
		$sql = "INSERT INTO jadwal_dinas(nip, tanggalBerangkat, tanggalBerakhir) VALUES(?, ?, ?)";
		$prepared = $conn->prepare($sql);
        $prepared->bind_param("sss", $list, $tanggalBerangkat, $tanggalBerakhir);
        $prepared->execute();
		// header('location:../index.php?posisi=jadwal&status=sukses');
	}
}

header('location:../index.php?posisi=jadwal');