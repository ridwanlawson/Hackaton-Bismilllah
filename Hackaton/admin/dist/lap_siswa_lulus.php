<?php
include 'koneksi.php';
require('assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1.1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
$pdf->Image('../logo.jpg',1,1,2,2);
$pdf->SetX(12);            
$pdf->MultiCell(19.5,1.5,'SMA PERTIWI 1',30,'L');
$pdf->SetFont('Arial','B',10);
// $pdf->SetX(4);
// $pdf->MultiCell(19.5,0.5,'Telpon : 0038XXXXXXX',0,'L');    
// $pdf->SetX(4);
// $pdf->MultiCell(19.5,0.5,'JL. Yang Lurus',0,'L');
$pdf->SetX(11);
$pdf->MultiCell(19.5,0.5,'Jln. Muradi no.38 Sungai Penuh-Kerinci',0,'L');$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(25.5,0.7,"Laporan Data Siswa Lulus",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.9, 'N0', 1, 0, 'C');
$pdf->Cell(3.5, 0.9, 'NISN', 1, 0, 'C');
$pdf->Cell(7, 0.9, 'Nama Lengkap', 1, 0, 'C');
$pdf->Cell(4.5, 0.9, 'Email', 1, 0, 'C');
$pdf->Cell(3.5, 0.9, 'No. Handphone', 1, 0, 'C');
$pdf->Cell(2, 0.9, 'Rata-rata', 1, 0, 'C');
$pdf->Cell(3.5, 0.9, 'Jurusan', 1, 0, 'C');
$pdf->Cell(2.5, 0.9, 'Hasil', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($conn, "SELECT pemesanan.*, barang.id_brg, barang.nm_brg FROM pemesanan");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.9, $no , 1, 0, 'C');
	$pdf->Cell(3.5, 0.9, $lihat[1],1, 0, 'C');
	$pdf->Cell(7, 0.9, ucwords($lihat['11']), 1, 0,'C');
	$pdf->Cell(4.5, 0.9, $lihat[2],1, 0, 'C');
	$pdf->Cell(3.5, 0.9, $lihat[3], 1, 0,'C');
	$pdf->Cell(2, 0.9, $lihat['rata'], 1, 0,'C');
	$pdf->Cell(3.5, 0.9, $lihat['nama'], 1, 0,'C');
	$pdf->Cell(2.5, 0.9, ucwords($lihat['status']),1, 1, 'C');

	$no++;
}

$pdf->ln(1);
$pdf->SetX(23);
$pdf->SetFont('Arial','B',10);
if (date('m')=='01') {
	# code...
	$bulan = 'Januari';
}elseif (date('m')=='02') {
	# code...
	$bulan = 'Februari';
}elseif (date('m')=='03') {
	# code...
	$bulan = 'Maret';
}elseif (date('m')=='04') {
	# code...
	$bulan = 'April';
}elseif (date('m')=='05') {
	# code...
	$bulan = 'Mei';
}elseif (date('m')=='06') {
	# code...
	$bulan = 'Juni';
}elseif (date('m')=='07') {
	# code...
	$bulan = 'Juli';
}elseif (date('m')=='08') {
	# code...
	$bulan = 'Agustus';
}elseif (date('m')=='09') {
	# code...
	$bulan = 'September';
}elseif (date('m')=='10') {
	# code...
	$bulan = 'Oktober';
}elseif (date('m')=='11') {
	# code...
	$bulan = 'November';
}elseif (date('m')=='12') {
	# code...
	$bulan = 'Desember';
}

$pdf->Cell(5,0.7,"Padang, ".date('d')."-$bulan-".date('Y'),0,0,'C');
$pdf->ln(1);
$pdf->SetX(23);
$pdf->Cell(5,0.7,"Yang Mengetahui",0,0,'C');

$pdf->Output("lap_siswa_lulus.pdf","I");

?>

