<?php
//define('FPDF_FONTPATH','C:\xampp\htdocs\sppd\admin\font');
require('../fpdf/fpdf.php');
include '../includes/koneksi.php';
include '../includes/function.php';

$noSPPD = $_POST['noSPPD'];
// $noSPPD = 145;
$query = $conn->query("SELECT * FROM sppd WHERE noSPPD='$noSPPD'");
$sppd = $query->fetch_object();
$spt = retrieveSPT($sppd->noSPT);
// status plt. atau plh. ubah disini
$stat = null;

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('../pict/header.jpg',5,6,200,40);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Move to the right
    //$this->Cell(60);
    // Title
    //$this->Cell(20,0,'Pemerintah Provinsi Jawa Tengah');
    //  $this->Cell(0,20,'Pemerintah Provinsi Jawa Tengah');
    // Line break
//    $this->Ln(20);

}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('pict/header3.jpg',0,0,200,40);
$pdf->Ln(23);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,40,'SURAT PERINTAH PERJALANAN DINAS (SPPD)',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,-30,'No. : ',0,1,'C');
$pdf->Ln(21);
$pdf->SetFont('Arial','',10);
/******** 1 ************/
$pdf->Cell(0,1,'',0,1,'L');
$pdf->Cell(5,10,'1. ',1,0,'L');
$pdf->Cell(100,10,'Pengguna Anggaran / Kuasa Pengguna Anggaran ',1,0,'L');
$pdf->Cell(91,10,''.$sppd->kuasaAnggaran,1,1,'L');
/******** 2 ************/
$pdf->Cell(5,15,'2. ',1,0,'L');
$pdf->MultiCell(100,5,'Nama Gubernur/Wakil Gubernur / Pimpinan / Anggota DPRD / Nama PNS dan NIP / Pegawai Non PNS yang melaksanakan perjalanan dinas',1);
$pdf->SetXY(115,78);
$peg = retrievePegawai($sppd->pelaksanaDinas);
$pdf->MultiCell(91,5,$peg->nama.' / '.$peg->nip,0,'L');
// $pdf->MultiCell(91,7.5,$peg->nama,0,'L');
$pdf->SetXY(115,75);
$pdf->MultiCell(91,15,'',1,'L');
/******** 3 ************/
$pdf->Cell(5,18,'3. ',1,0,'L');
$pdf->MultiCell(100,6,'a. Pangkat dan Golongan 
b. Jabatan/Instansi
c. Tingkat Biaya Perjalanan Dinas',1,'L');
$pdf->SetXY(115,90);
$pdf->MultiCell(91,6,'a. '.$peg->pangkat.' ('.$peg->golongan.')
b. '.$peg->jabatan.'
c. '.$sppd->tingkatBiaya,1,'L');
/******** 4 ************/
$pdf->Cell(5,17,'4. ',1,0,'L');
$pdf->Cell(100,17,'Maksud Perjalanan Dinas',1,0,'L');
$pdf->MultiCell(91,19,$spt->keterangan.'',0,'C');
$pdf->SetXY(115,108);
$pdf->MultiCell(91,17,'',1);
/******** 5 ************/
$pdf->SetY(125);
$pdf->Cell(5,10,'5. ',1,0,'L');
$pdf->Cell(100,10,'Alat angkutan yang dipergunakan',1,0,'L');
$pdf->Cell(91,10,$sppd->transportasi,1,1,'L');

/******** 6 ************/
$pdf->Cell(5,14,'6. ',1,0,'L');
$pdf->MultiCell(100,7,'a. Tempat berangkat 
b. Tempat tujuan',1,'L');
$pdf->SetXY(115,135);
$pdf->MultiCell(91,7,'a. '.$sppd->tempatBerangkat.'
b. '.$sppd->tempatTujuan,1);

/******** 7 ************/
$tgl = explode("-", $spt->tanggalDinas);
$tgl1 = new DateTime(convertMonth($tgl[0]));
$tgl2 = new DateTime(convertMonth($tgl[1]));
$interval = $tgl1->diff($tgl2);
$diff = explode(" ", $interval->format('%a hari'));

$pdf->Cell(5,21,'7. ',1,0,'L');
$pdf->MultiCell(100,7,'a. Lamanya perjalanan dinas 
b. Tanggal berangkat
c. Tanggal harus kembali/tiba ditempat baru*)',1,'L');
$pdf->SetXY(115,149);
$pdf->MultiCell(91,7,'a. ' . ($diff[0]+1) ." (". terbilang($diff[0]+1) . " ) hari".' 
b. '.$tgl[0].'
c. '.$tgl[1],1,'L');
/******** 8 ************/
$pdf->Cell(5,10,'8. ',1,0,'L');
$pdf->Cell(100,10,'Pengikut : Nama',1,0,'L');
$pdf->Cell(45.5,10,'Tanggal Lahir',1,0,'L');
$pdf->Cell(45.5,10,'Keterangan',1,1,'L');
$pdf->Cell(5,14.03,' ',1,0,'L');
$pdf->MultiCell(100,7,'1. 
2. ',1,'L');
$pdf->SetXY(115,180);
$pdf->MultiCell(45.5,7,' 
 ',1,'L');
$pdf->SetXY(160.5,180);
$pdf->MultiCell(45.5,7,' 
 ',1,'L');
/******** 9 ************/
$pdf->Cell(5,31.5,'9. ',1,0,'L');
$pdf->MultiCell(100,10.5,'Pembebanan anggaran 
a. SKPD
b. Akun  ',1,'L');
$pdf->SetXY(115,194);
$pdf->MultiCell(91,6.25,'a. Dinhubkominfo Prov.Jateng'.' 
    (DPA/SKPD) No. '.$spt->noDPA.'
    Tgl '.retrieveDPA($spt->noDPA)->tanggal.'
b. '.($sppd->akun == "dalam daerah" ? "Belanja Perjalanan Dinas Dalam Daerah" : "Belanja Perjalanan Dinas Luar Daerah").'
    '.$sppd->noRekening.'',1,'L');
/******** 10 ************/
$pdf->Cell(5,10,'10. ',1,0,'L');
$pdf->Cell(100,10,'Keterangann lain-lain',1,0,'L');
$pdf->Cell(91,10,'SPT No. '.$spt->noSPT.' Tanggal '.$spt->tanggalSPT,1,1,'L');
/*$pdf->Cell(100,5,'',0,1,'L');*/
$pdf->SetLeftMargin(130);
$pdf->Ln(4);
$pdf->MultiCell(85,4,'Dikeluarkan di        : '.$spt->kotaSPT.'
Pada tanggal          : '.$spt->tanggalSPT.'
_________________________________',0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetLeftMargin(0);
// $pdf->MultiCell(60,3.5,'PENGGUNA ANGGARAN / KUASA PENGGUNA ANGGARAN


//   '.$pdf->SetFont('Arial','',10).''.retrievePegawai($sppd->kuasaAnggaran)->nama.'
//   NIP : '.retrievePegawai($sppd->kuasaAnggaran)->nip,0,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 3.5, 'PENGGUNA ANGGARAN / KUASA',0,2,'C');
$pdf->Cell(60, 3.5, 'PENGGUNA ANGGARAN',0,2,'C');
$pdf->Ln(11);
$pdf->SetFont('Arial', 'U', 10);
$pdf->SetLeftMargin(130);
$pdf->Cell(60, 3.5, retrievePegawai($sppd->kuasaAnggaran)->nama,0,2,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 3.5,'NIP : ' . retrievePegawai($sppd->kuasaAnggaran)->nip,0,2,'C');
$pdf->Output();


?>