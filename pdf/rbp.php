<?php
//define('FPDF_FONTPATH','C:\xampp\htdocs\sppd\admin\font');
require('../fpdf/fpdf.php');
include '../includes/koneksi.php';
include '../includes/function.php';

$no = $_POST['no'];
$query = $conn->query("SELECT * FROM rincian WHERE no='$no'");
$rincian = $query->fetch_object();
$jmlh_harian = $rincian->hariUangHarian * $rincian->biayaUangHarian;
$sewa_mobil = $rincian->hariSewa * $rincian->biayaSewa;
$total = $jmlh_harian + $sewa_mobil + $rincian->biayaPenginapan + $rincian->biayaTransport;
$terbilang = terbilang($total);
$sppd = retrieveSPPD($rincian->noSPPD);
$spt = retrieveSPT($sppd->noSPT);
$keterangan = $spt->keterangan;

$stat = null;

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('../pict/header.jpg',5,6,200,40);
    $this->Image('pict/JATENG_LOGO.jpg',4,6,15,15);
	$this->SetFont('Times','B',12);
	$this->SetLeftMargin(20);
	$this->Cell(45,5,"PEMERINTAH PROVINSI JAWA TENGAH",0,1,"L");
	$this->Cell(45,5,"DINAS PERHUBUNGAN KOMUNIKASI DAN INFORMATIKA",0,0,"L");
	$this->Ln(10);
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

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,7,'RINCIAN BIAYA PERJALANAN DINAS',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Ln(5);
$pdf->SetX(5);
$pdf->Cell(50,5,'Lampiran SPPD Nomor    :  ',0,0,'l');
$pdf->Cell(0,5,'  '.$rincian->noSPPD,0,1,'l');
$pdf->SetX(5);
$pdf->Cell(50,5,'Tanggal                             :  ',0,0,'l');
$pdf->Cell(0,5,'  '.$spt->tanggalSPT,0,1,'l');
$pdf->Ln(5);
$pdf->SetX(5);
$pdf->Cell(9,7,'No',1,0,'C');
$pdf->Cell(90,7,'PERINCIAN BIAYA',1,0,'C');
$pdf->Cell(40,7,'JUMLAH',1,0,'C');
$pdf->Cell(60,7,'KETERANGAN',1,1,'C');
$pdf->SetX(5);
$pdf->MultiCell(9,7,'
1

2

3

4

',1,'C');
$pdf->SetXY(14,59);
$pdf->MultiCell(90,7,'
 Uang Harian ( '.$rincian->hariUangHarian.' hr x Rp '.number_format($rincian->biayaUangHarian, 0, ",", ".").',- )

 Biaya Penginapan

 Biaya Transportasi ( BBM )

 Biaya Jam Mobil ( '.$rincian->hariSewa.' hr x Rp '.number_format($rincian->biayaSewa, 0, ",", ".").',-)

',1,'L');
$pdf->SetXY(104,59);
$pdf->MultiCell(40,7,'
Rp.        '.number_format($jmlh_harian, 0, ",", ".").'

Rp.        '.number_format($rincian->biayaPenginapan, 0, ",", ".").'

Rp.        '.number_format($rincian->biayaTransport, 0, ",", ".").'

Rp.        '.number_format($sewa_mobil, 0, ",", ".").'

',1,'L');
$pdf->Line(204,59,204,122);
$pdf->SetXY(144,59);
$pdf->MultiCell(60,5,$keterangan . ' pada tanggal ' . $spt->tanggalDinas . ' sesuai SPT no. ' . $sppd->noSPT. ' tanggal ' .$spt->tanggalSPT,0,'J');
$pdf->SetXY(206,59);
$pdf->MultiCell(1,63,'',0,'J');
	

$pdf->SetX(5);
$pdf->Cell(99,7,'JUMLAH',1,0,'C');
$pdf->Cell(40,7,'Rp. '.number_format($total, 0, ",", "."),1,0,'C');
$pdf->Cell(60,7,'',1,1,'C');
$pdf->SetX(5);
$pdf->Cell(199,7,'TERBILANG : '.$terbilang.' rupiah',1,1,'L');

$pdf->SetX(5);
$pdf->Cell(100,7,'',0,0,'C');
$pdf->Cell(100,7,$spt->kotaSPT.', ',0,1,'C');
$pdf->SetX(5);
$pdf->Cell(100,7,'Telah dibayar sejumlah',0,0,'C');
$pdf->Cell(100,7,'Telah menerima uang sejumlah',0,1,'C');
$pdf->SetX(5);
$pdf->SetFont('Arial','U',12);
$pdf->Cell(100,7,'Rp.    '.number_format($total, 0, ",", "."),0,0,'C');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(100,7,'Rp.    '.number_format($total, 0, ",", "."),0,1,'C');
$pdf->SetX(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,7,'Bendahara Pengeluaran/',0,0,'C');
$pdf->Cell(100,7,'Yang Menerima',0,1,'C');
$pdf->SetX(5);
$pdf->Cell(100,3,'Bendahara Pengeluaran Pembantu',0,1,'C');
$pdf->Ln(20);
$pdf->SetX(5);
$pdf->SetFont('Arial','U',12);
$pdf->Cell(100,5,'( '.retrievePegawai($rincian->bendaharaPengeluaran)->nama.' )',0,0,'C');
$pdf->Cell(100,5,'( '.retrievePegawai($sppd->pelaksanaDinas)->nama.' )',0,1,'C');
$pdf->SetX(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,5,'NIP : '.$rincian->bendaharaPengeluaran.' ',0,0,'C');
$pdf->Cell(100,5,'NIP : '.$rincian->penerima.' ',0,1,'C');

$pdf->Ln(5);
$pdf->SetX(5);
$pdf->Cell(0,5,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ',0,1);

$pdf->Ln(5);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,5,'PERHITUNGAN SPPD RAMPUNG',0,1,'C');
$pdf->SetX(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,5,'Ditetapkan sejumlah',0,0,'L');
$pdf->Cell(5,5,':',0,0,'C');
$pdf->Cell(60,5,'Rp. '.number_format($total, 0, ",", "."),0,1,'L');
$pdf->SetX(5);
$pdf->Cell(60,5,'Yang telah dibayar semula',0,0,'L');
$pdf->Cell(5,5,':',0,0,'C');
$pdf->SetFont('Arial','U',12);
$pdf->Cell(60,5,'Rp. '.number_format($total, 0, ",", ".").'   ',0,1,'L');
$pdf->SetFont('Arial','',12);
$pdf->SetX(5);
$pdf->Cell(60,5,'Sisa kurang/lebih',0,0,'L');
$pdf->Cell(5,5,':',0,0,'C');
$pdf->Cell(60,5,'Rp. 0',0,1,'L');

$pdf->Ln(5);
$pdf->SetX(5);
$pdf->Cell(100,7,'Pengguna Anggaran/Kuasa Pengguna Anggaran',0,0,'C');
$pdf->Cell(100,7,'Pejabat Pelaksana Teknis Kegiatan',0,1,'C');
$pdf->Ln(20);
$pdf->SetX(5);
$pdf->SetFont('Arial','U',12);
$pdf->Cell(100,5,'( '.retrievePegawai($rincian->kuasaAnggaran)->nama.' )',0,0,'C');
$pdf->Cell(100,5,'( '.retrievePegawai($rincian->pelaksanaKegiatan)->nama.' )',0,1,'C');
$pdf->SetX(5);
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,5,'NIP : '.$rincian->kuasaAnggaran.' ',0,0,'C');
$pdf->Cell(100,5,'NIP : '.$rincian->pelaksanaKegiatan.' ',0,1,'C');




$pdf->Output();

?>