<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
// $pdf->Image('../logo/bnpb.png',1,1,2,2);
$pdf->SetX(11);            
$pdf->MultiCell(19.5,1.5,'UD SARANA KERINCI',30,'L');
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
$pdf->Cell(25.5,0.7,"Laporan Data Supplier",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.9, 'N0', 1, 0, 'C');
$pdf->Cell(4, 0.9, 'ID Supplier', 1, 0, 'C');
$pdf->Cell(7, 0.9, 'Nama Supplier', 1, 0, 'C');
$pdf->Cell(10, 0.9, 'Alamat', 1, 0, 'C');
$pdf->Cell(3.5, 0.9, 'Telepon', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysql_query("select * from supplier");
while($lihat=mysql_fetch_array($query)){
		if ($lihat[0]<10) {
	    $lihatid = "SPL-00$lihat[0]";
	  }elseif ($lihat[0]<100){
	    $lihatid = "SPL-0$lihat[0]";
	  }else{
	  	$lihatid = "SPL-$lihat[0]";
	  }
	$pdf->Cell(1, 0.9, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.9, $lihatid,1, 0, 'C');
	$pdf->Cell(7, 0.9, $lihat['nm_sup'], 1, 0,'C');
	$pdf->Cell(10, 0.9, $lihat['alamat'],1, 0, 'C');
	$pdf->Cell(3.5, 0.9, $lihat['tlp'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan_supplier.pdf","I");

?>

