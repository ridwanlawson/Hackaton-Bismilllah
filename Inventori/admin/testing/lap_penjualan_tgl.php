<?php

include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
$pdf->Image('../logo/BNPB.png',1,1,2,2);
$pdf->SetX(8.5);            
$pdf->MultiCell(19.5,0.5,'Badan Penanggulangan Bencana Daerah (BPBD)',0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0038XXXXXXX',0,'L');    
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Yang Lurus',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.bpbd.com email : bpbd@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Data Penjualan Barang',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(6,0.7,"Dari : ".$_GET['dari'] ." Sampai ".$_GET['sampai'],0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'harga', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Total harga', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'laba', 1, 1, 'C');

$no=1;
$dari=$_GET['dari'];
$sampai=$_GET['sampai'];
// $pdf->Cell(1, 0.8, date($dari), 1, 0, 'C');
$query=mysql_query("select * from barang_laku where tanggal>='$dari' and tanggal<='$sampai' order by tanggal asc");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tanggal'],1, 0, 'C');
	$pdf->Cell(6, 0.8, $lihat['nama'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['jumlah'], 1, 0,'C');
	$pdf->Cell(4, 0.8, "Rp. ".number_format($lihat['harga'])." ,-", 1, 0,'C');
	$pdf->Cell(4.5, 0.8, "Rp. ".number_format($lihat['total_harga'])." ,-",1, 0, 'C');
	$pdf->Cell(4, 0.8, "Rp. ".number_format($lihat['laba'])." ,-", 1, 1,'C');	
	
	$no++;
}
$q=mysql_query("select sum(total_harga) as total from barang_laku where tanggal>='$dari' and tanggal<='$sampai' order by tanggal asc");

while($total=mysql_fetch_array($q)){
	$pdf->Cell(17, 0.8, "Total Pendapatan", 1, 0,'C');		
	$pdf->Cell(4.5, 0.8, "Rp. ".number_format($total['total'])." ,-", 1, 0,'C');	
}
$qu=mysql_query("select sum(laba) as total_laba from barang_laku where tanggal>='$dari' and tanggal<='$sampai' order by tanggal asc");

while($tl=mysql_fetch_array($qu)){
	$pdf->Cell(4, 0.8, "Rp. ".number_format($tl['total_laba'])." ,-", 1, 1,'C');	
}
$pdf->Output("laporan_buku.pdf","I");



?>

