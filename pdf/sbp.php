<?php
require('../fpdf/fpdf.php');
include '../includes/koneksi.php';
include '../includes/function.php';

$noSBP = $_POST['noSBP'];
$query = $conn->query("SELECT * FROM buktipengeluaran WHERE noSBP='$noSBP'");
$sbp = $query->fetch_object();
$query = $conn->query("SELECT * FROM rekening WHERE noRekening='$sbp->rekening'");
$keperluan = $query->fetch_object()->judul;
$spt = retrieveSPT($sbp->noSPT);
$pembayaran = retrieveDPA($spt->noDPA)->kegiatan;

if($sbp->tipePajak == "honor") {
  $pegawaiPajak = retrievePegawai($sbp->pegawaiPajak, "golongan, npwp");
  $golongan = explode("/", $pegawaiPajak->golongan);
  $golongan = $golongan["0"];
  if($golongan == "III") {
    if($pegawaiPajak->npwp == "Iya") {
      $pajak = floor($sbp->jumlahUang * (5/100));
    } else {
      $pajak = floor($sbp->jumlahUang * (6/100));
    }
  } else if($golongan == "IV") {
    if($pegawaiPajak->npwp == "Iya") {
      $pajak = floor($sbp->jumlahUang * (15/100));
    } else {
      $pajak = floor($sbp->jumlahUang * (18/100));
    }
  } else {
    $pajak = 0;
  }
} else {
  $belanja = $sbp->jumlahBelanja;
  $dpp = floor((10/11) * $belanja);
  $ppn = floor((10/100) * $dpp);
  if($sbp->tipeBelanja == "barang") {
    $pph = floor((1.5/100) * $dpp);
    $pajak = floor($belanja-$ppn-$pph);
  } else {
    $pph = floor((2/100) * $dpp);
    $pajak = floor($belanja-$ppn-$pph);
  }
}

class PDF extends FPDF
{
	// Page header
function Header()
{
	$this->SetFont('Arial','B',14);
	$this->Cell(0,5,"PEMERINTAH PROVINSI",0,1,"C");
	$this->SetFont('Arial','BU',14);
	$this->Cell(0,5,"JAWA TENGAH",0,1,"C");
	$this->Ln(8);
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
garis($pdf);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(11,5,"NOTE ",0,0,"L");
$pdf->Cell(3,5,":",0,0,"L");
$pdf->Cell(115,5,"DINAS PERHUBUNGAN KOMUNIKASI DAN INFORMATIKA",0,0,"L");
$pdf->Cell(65,5,"KETERANGAN",0,1,"C");
$pdf->SetLeftMargin(24);
$pdf->Cell(115,5,"PROVINSI JAWA TENGAH",0,1,"L");
$pdf->SetFont('Arial','',10);
$pdf->SetX(10);
$pdf->Cell(129,5,'TAHUN ANGGARAN : '.$sbp->tahunAnggaran.' No. '.$noSBP.'',0,0,"L");
$pdf->Cell(65,5,'Barang-barang termaksud telah masuk',0,2,"L");
$pdf->Cell(65,5,'buku persediaan / inventaris',0,1,"L");
$pdf->SetX(10);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(129,10,"SURAT BUKTI PENGELUARAN",0,0,"C");
$pdf->SetFont('Arial','',10);
$pdf->Cell(65,5,"pada tgl. ".$sbp->tanggalInventaris,0,2,"L");
$pdf->Cell(25,5,"Jumlah Kotor",0,0,"C");
$pdf->Cell(15,5,"Pajak",0,0,"C");
$pdf->Cell(25,5,"Jumlah Bersih",0,1,"C");
$pdf->SetX(10);
$pdf->Cell(129,5,"Dibayarkan Terlampir",0,1,"L");
$pdf->SetX(10);
$pdf->MultiCell(129,5,"Uang sejumlah Rp. ".number_format($sbp->jumlahUang, 0, ",", ".").' ( '.Terbilang($sbp->jumlahUang).' rupiah )',0,"L");
$pdf->SetXY(139,58);
$pdf->MultiCell(25,15,number_format($sbp->jumlahUang, 0, ",", "."),0,"C");
$pdf->SetXY(164,58);
$pdf->MultiCell(15,15,number_format($pajak, 0, ",", "."),0,"C");
$pdf->SetXY(179,58);
$pdf->MultiCell(25,15,number_format($sbp->jumlahUang-$pajak, 0, ",", "."),0,"C");
$pdf->SetX(10);
$pdf->MultiCell(129,5,'yaitu untuk pembayaran : ' . $sbp->untukPembayaran . ' ' .$pembayaran,0,"L");//.$keperluan,1,"L");
$pdf->SetXY(139,73);
$pdf->SetFont('Arial','U',8);
$pdf->Cell(65,5,'Pengeluaran/pembelian dilakukan berdasarkan :',0,1,"L");
$pdf->SetXY(139,78);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(65,10,'DPA No. '.$spt->noDPA.' 
Tgl. '.retrieveDPA($spt->noDPA)->tanggal,0,"L");//.$keperluan,1,"L");

$pdf->SetX(10);
$pdf->Cell(129,5,'Untuk Pekerjaan / keperluan :  '.$keperluan,0,1,"L");
$pdf->SetX(10);
$pdf->Cell(129,5,'Kode Rek / Kegiatan :  '.$spt->noDPA.'.'.$sbp->rekening,0,1,"L");
$pdf->SetX(10);
$pdf->Cell(129,5,'Yang berhak menerima pembayaran',0,0,"C");
$pdf->Cell(65,5,'Yang menerima barang/memeriksa',0,2,"L");
$pdf->Cell(65,5,'pekerjaan tersebut diatas :',0,1,"L");
$pdf->SetX(10);
$pdf->Cell(129,5,'',0,1,"C");
$pdf->SetX(10);
$pdf->Cell(129,5,'',0,1,"C");
$pdf->SetX(10);
$pdf->Cell(129,5,'',0,1,"C");
$pdf->SetX(10);
$pdf->Cell(129,5,$sbp->penerimaPembayaran,0,0,"C");
$pdf->Cell(65,5,$sbp->penerimaBarang,0,1,"C");
$pdf->SetFont('Arial','',9);
$pdf->SetX(10);
$pdf->Cell(129,3,'',0,1,"C");
$pdf->SetX(10);
$pdf->Cell(64.5,5,'BENDAHARA PENGELUARAN/',0,0,"C");
$pdf->Cell(64.5,5,'',0,0,"C");
$pdf->Cell(65,5,'PA/KPA atau',0,1,"C");
$pdf->SetX(10);
$pdf->Cell(64.5,5,'BENDAHARA PENGELUARAN PEMBANTU',0,0,"C");
$pdf->Cell(64.5,5,'',0,0,"C");
$pdf->Cell(65,5,'an PA/KPA PPTK',0,1,"C");
$pdf->SetX(10);
$pdf->Cell(64.5,5,'',0,0,"C");
$pdf->SetFont('Arial','',9);
$pdf->Cell(64.5,5,'Kuasa Pengguna Anggaran',0,1,"C");
$pdf->Cell(64.5,5,'',0,1,"C");
$pdf->Cell(64.5,5,'',0,1,"C");
$pdf->SetFont('Arial','U',8);
$pdf->SetX(10);
$pdf->Cell(64.5,4,retrievePegawai($sbp->bendaharaPengeluaran)->nama,0,0,"C");
$pdf->Cell(64.5,4,retrievePegawai($sbp->kuasaAnggaran)->nama,0,0,"C");
$pdf->Cell(64.5,4,retrievePegawai($sbp->nipPA)->nama,0,1,"C");
$pdf->SetFont('Arial','',8);
$pdf->SetX(10);
$pdf->Cell(64.5,4,$sbp->bendaharaPengeluaran,0,0,"C");
$pdf->Cell(64.5,4,$sbp->kuasaAnggaran,0,0,"C");
$pdf->Cell(64.5,4,$sbp->nipPA,0,1,"C");
//$pdf->Line(100,50,100,100);


function garis($pdf){
	//Horizontal
	$pdf->Line(9,25,205,25);
	$pdf->Line(9,108,205,108);
	$pdf->Line(9,140,205,140);
	$pdf->Line(9,175,205,175);

	$pdf->Line(135,53,205,53);
	$pdf->Line(135,58,205,58);
	$pdf->Line(135,73,205,73);






	//Vertical	
	$pdf->Line(9,25,9,175);
	$pdf->Line(134,25,134,140);
	$pdf->Line(135,25,135,175);
	$pdf->Line(82,140,82,175);
	$pdf->Line(205,25,205,175);

	$pdf->Line(164,53,164,73);
	$pdf->Line(179,53,179,73);



	
}



$pdf->Output();
?>