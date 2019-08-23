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
$pdf->Cell(25.5,0.7,"Laporan Barang Masuk",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(4.5,0.7,"No Surat Jalan : ".$_GET['no_sj'],0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(0.8, 0.9, 'No', 1, 0, 'C');
$pdf->Cell(1.8, 0.9, 'ID Brg', 1, 0, 'C');
$pdf->Cell(3.7, 0.9, 'Nama Brg', 1, 0, 'C');
$pdf->Cell(1.1, 0.9, 'ID Spl', 1, 0, 'C');
$pdf->Cell(3.5, 0.9, 'Nama Spl', 1, 0, 'C');
$pdf->Cell(1, 0.9, 'Rak', 1, 0, 'C');
$pdf->Cell(3, 0.9, 'Jenis Brg', 1, 0, 'C');
$pdf->Cell(2, 0.9, 'Satuan', 1, 0, 'C');
$pdf->Cell(1, 0.9, 'Qty', 1, 0, 'C');
$pdf->Cell(2.2, 0.9, 'Harga Beli', 1, 0, 'C');
$pdf->Cell(2.2, 0.9, 'Harga Jual', 1, 0, 'C');
$pdf->Cell(3, 0.9, 'Tgl Masuk', 1, 0, 'C');
$pdf->Cell(1.9, 0.9, 'No Polisi', 1, 1, 'C');
$pdf->SetFont('Arial','',9);
$no=1;
if ($_GET['no_sj']) {
# code...
$supplier = $_GET['no_sj'];
$query=mysql_query("select barang_masuk.*,barang.*, supplier.* from barang_masuk, barang, supplier where barang_masuk.id_brg = barang.id_brg and barang_masuk.id_sup = supplier.id_sup and no_sj = '$supplier' ") or die(mysql_error());

}else{

}
while($lihat=mysql_fetch_array($query)){
		if ($lihat['id_brg']<10) {
			if ($lihat['jenis_brg']=="Makanan") {
			    $lihatid = "MKN-00$lihat[id_brg]";
			}elseif ($lihat['jenis_brg']=="Minuman") {
			    $lihatid = "MNM-00$lihat[id_brg]";
			}else{
			    $lihatid = "TBM-00$lihat[id_brg]";
			}
	  }elseif ($lihat['id_brg']<100){
	    	if ($lihat['jenis_brg']=="Makanan") {
			    $lihatid = "MKN-0$lihat[id_brg]";
			}elseif ($lihat['jenis_brg']=="Minuman") {
			    $lihatid = "MNM-0$lihat[id_brg]";
			}else{
			    $lihatid = "TBM-0$lihat[id_brg]";
			}
	  }else{
	  		if ($lihat['jenis_brg']=="Makanan") {
			    $lihatid = "MKN-$lihat[id_brg]";
			}elseif ($lihat['jenis_brg']=="Minuman") {
			    $lihatid = "MNM-$lihat[id_brg]";
			}else{
			    $lihatid = "TBM-$lihat[id_brg]";
			}
	  }
	  date_default_timezone_set('Asia/Jakarta');
	$pdf->Cell(0.8, 0.9, $no, 1, 0, 'C');
	$pdf->Cell(1.8, 0.9, $lihatid, 1, 0, 'C');
	$pdf->Cell(3.7, 0.9, $lihat['nm_brg'], 1, 0, 'C');
	$pdf->Cell(1.1, 0.9, $lihat['id_sup'], 1, 0, 'C');
	$pdf->Cell(3.5, 0.9, $lihat['nm_sup'], 1, 0, 'C');
	$pdf->Cell(1, 0.9, $lihat['letak_brg'], 1, 0, 'C');
	$pdf->Cell(3, 0.9, $lihat['jenis_brg'], 1, 0, 'C');
	$pdf->Cell(2, 0.9, $lihat['satuan'], 1, 0, 'C');
	$pdf->Cell(1, 0.9, $lihat['jumlah'], 1, 0, 'C');
	$pdf->Cell(2.2, 0.9, "Rp.".number_format($lihat['harga_beli']), 1, 0, 'C');
	$pdf->Cell(2.2, 0.9, "Rp.".number_format($lihat['harga_jual']), 1, 0, 'C');
	$pdf->Cell(3, 0.9, date('d F Y', strtotime($lihat['tgl_masuk'])), 1, 0, 'C');
	$pdf->Cell(1.9, 0.9, $lihat['no_polisi'], 1, 1, 'C');


	

	$no++;
}

$pdf->Output("laporan_barang_masuk.pdf","I");

?>

