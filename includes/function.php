<?php

function convertMonth($input, $type = "0") {
	$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$input = explode(" ", $input);
	$i = 0;
	
	if($type == "1") {
		foreach($months as $month) {
			if($input[1] == $month) {
				$input[1] = $bulan[$i];
				return implode(" ", $input);
			}
			$i++;
		}
	} else {
		foreach($bulan as $bln) {
			if($input[1] == $bln) {
				$input[1] = $months[$i];
				return implode(" ", $input);
			}
			$i++;
		}
	}
}

function getPegawai($select = "*") {
	global $conn;

	$sql = "SELECT " . $select . " FROM pegawai";
	$result = $conn->query($sql);
	return $result;
}