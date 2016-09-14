<?php

function terbilang($x)
{
  $ambil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $ambil[$x];
  elseif ($x < 20)
    return terbilang($x - 10) . " belas";
  elseif ($x < 100)
    return terbilang($x / 10) . " puluh" . terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . terbilang($x - 100);
  elseif ($x < 1000)
    return terbilang($x / 100) . " ratus" . terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . terbilang($x - 1000);
  elseif ($x < 1000000)
    return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
  elseif ($x < 1000000000)
    return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
}

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
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM pegawai";
	$result = $conn->query($sql);
	return $result;
}

function getRekening($select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM rekening";
	$result = $conn->query($sql);
	return $result;
}

function getDPA($select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM dpa";
	$result = $conn->query($sql);
	return $result;
}

function getPergub($select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM pergub";
	$result = $conn->query($sql);
	return $result;
}

function getJadwal($select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT " . $select . " FROM jadwal_dinas";
	$result = $conn->query($sql);
	return $result;
}

function getSPT($select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT " . $select . " FROM spt";
	$result = $conn->query($sql);
	return $result;
}

function getSPPD($select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT " . $select . " FROM sppd";
	$result = $conn->query($sql);
	return $result;
}

function getRBP($select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT " . $select . " FROM rincian";
	$result = $conn->query($sql);
	return $result;
}

function getSBP($select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT " . $select . " FROM buktipengeluaran";
	$result = $conn->query($sql);
	return $result;
}

function retrievePegawai($nip, $select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM pegawai WHERE nip='$nip'";
	$result = $conn->query($sql);
	$result = $result->fetch_object();
	return $result;
}

function retrievePergub($no, $select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM pergub WHERE noPergub='$no'";
	$result = $conn->query($sql);
	$result = $result->fetch_object();
	return $result;
}

function retrieveDPA($noDPA, $select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM dpa WHERE noDPA='$noDPA'";
	$result = $conn->query($sql);
	$result = $result->fetch_object();
	return $result;
}

function retrieveSPT($noSPT, $select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM spt WHERE noSPT='$noSPT'";
	$result = $conn->query($sql);
	$result = $result->fetch_object();
	return $result;
}

function retrieveSPPD($noSPPD, $select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM sppd WHERE noSPPD='$noSPPD'";
	$result = $conn->query($sql);
	$result = $result->fetch_object();
	return $result;
}

function retrieveRBP($no, $select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM rincian WHERE no='$no'";
	$result = $conn->query($sql);
	$result = $result->fetch_object();
	return $result;
}

function retrieveSBP($noSBP, $select = "*") {
	global $conn;
	$select = $conn->real_escape_string($select);

	$sql = "SELECT ". $select . " FROM buktipengeluaran WHERE noSBP='$noBP'";
	$result = $conn->query($sql);
	$result = $result->fetch_object();
	return $result;
}