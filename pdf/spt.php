<?php
//define('FPDF_FONTPATH','C:\xampp\htdocs\sppd\admin\font');
require('../fpdf/fpdf.php');
include '../includes/koneksi.php';
include '../includes/function.php';

$noSPT = $_POST['noSPT'];
$query = $conn->query("SELECT * FROM spt WHERE noSPT='$noSPT'");
$spt = $query->fetch_object();
$nip = json_decode($spt->nip);
// status plt. atau plh. ubah disini
$stat = $spt->statusKadin;

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
$pdf->Image('pict/header2.jpg',5,6,200,30);
$pdf->Ln(10);
$pdf->SetFont('Times','BU',10);
$pdf->Cell(0,40,'SURAT PERINTAH TUGAS',0,1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(190,-30,'Nomor :'.$spt->noSPT.'',0,1,'C');
$pdf->Ln(22);
$pdf->SetFont('Times','B',10);
$pdf->Cell(0,0,'Berdasarkan : ',0,1,'L');
$pdf->Ln(3);
$pdf->SetFont('Times','',10);
$pdf->SetX(20);
$pdf->Cell(5,5,'1. ',0,'L');
$pdf->MultiCell(0,6,'Peraturan Gubernur Jawa Tengah Nomor : '.$spt->noPergub. ' Tahun '. retrievePergub($spt->noPergub)->tahun . ' Tanggal '.retrievePergub($spt->noPergub)->tanggal.' tentang '.
  retrievePergub($spt->noPergub)->keterangan.'',0,'L');
$pdf->SetX(20);
$pdf->Cell(5,5,'2. ',0,0,'L');
$pdf->MultiCell(0,6,'Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah (DPA-SKPD) Nomor : '.$spt->noDPA.' Tanggal '. retrieveDPA($spt->noDPA)->tanggal.' tentang '.retrieveDPA($spt->noDPA)->kegiatan.'',0,'L');
$pdf->SetX(20);
$pdf->Cell(5,5,'3. ',0,0,'L');
$pdf->MultiCell(0,6,'Surat Penyedia Dana Satuan Kerja Perangkat Daerah (SPD - SKPD) Nomor : '.$spt->noSPD.' Tanggal '. $spt->tanggalSPT,0,'L');
$pdf->SetX(20);
$pdf->Cell(5,5,'4. ',0,0,'L');
$pdf->MultiCell(0,6,'Untuk Kepentingan Dinas.',0,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','BU',10);
$pdf->Cell(0,0,'MEMERINTAHKAN :',0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('Times','B',10);
$pdf->Cell(0,0,'Kepada : ',0,1,'L');
$pdf->Ln(5);
$j = 1;
foreach($nip as $pegawai) {
  $data = retrievePegawai($pegawai);
  $pdf->SetFont('Times', '', '10');
  $pdf->Ln(1);
  $pdf->setX(20);
  $pdf->Cell(5,5, $j++ . '.', 0, 'L');
  $pdf->Cell(0,6,'Nama / NIP    :'.$data->nama.'',0,1,'L');
  $pdf->SetX(25);
  $pdf->Cell(0,6,'Pangkat / Gol : '.$data->pangkat.'',0,1,'L');
  $pdf->SetX(25);
  $pdf->Cell(0,6,'Jabatan           : '.$data->jabatan.'',0,1,'L');
}

$pdf->Ln(4);
$pdf->SetFont('Times','B',10);
$pdf->Cell(0,0,'Untuk : ',0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','',10);
$pdf->SetX(20);
$pdf->Cell(5,5,'1. ',0,'L');
$pdf->MultiCell(0,6,$spt->keterangan.' pada tanggal ' . $spt->tanggalDinas . '.',0,'L');
$pdf->SetX(20);
$pdf->Cell(5,5,'2. ',0,'L');
$pdf->MultiCell(0,6,'Melaporkan Hasil Pelaksanaan Tugas kepada Pejabat Pemberi Perintah.',0,'L');
$pdf->SetX(20);
$pdf->Cell(5,5,'3. ',0,'L');
$pdf->MultiCell(0,6,'Demikian Surat Perintah Tugas ini untuk dilaksanakan penuh rasa tanggung jawab.',0,'L');
$pdf->Ln(5);
$pdf->SetLeftMargin(100);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,0,'DIKELUARKAN    : '.$spt->kotaSPT.'',0,1,'L');
$pdf->SetFont('Times','U',10);
$pdf->Cell(0,10,'PADA TANGGAL : '.$spt->tanggalSPT.' ',0,1,'L');

$pdf->SetLeftMargin(90);
$pdf->SetFont('Times','B',10);
$pdf->Cell(80,5,$stat.'. KEPALA DINAS',0,1,'C');
/*************************************/
$pdf->Cell(100,5,'PERHUBUNGAN KOMUNIKASI DAN INFORMATIKA',0,1,'C');
$pdf->Cell(100,5,'PROVINSI JAWA TENGAH',0,1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(100,5,retrievePegawai($spt->penandatanganSPT)->jabatan,0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,retrievePegawai($spt->penandatanganSPT)->nama,0,1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(100,5,retrievePegawai($spt->penandatanganSPT)->pangkat,0,1,'C');
$pdf->Cell(100,5,$spt->penandatanganSPT,0,1,'C');

$pdf->Output();
?>