<?php
include 'config.php';

require('../assets/pdf/fpdf.php');
$pelanggan = $_GET['id_plg'];
$datas = mysql_query("SELECT * FROM pelanggan where id_plg = '$pelanggan'");
$data = mysql_fetch_array($datas);
$results = mysql_query("SELECT * FROM penjualan where id_plg = '$pelanggan'");
$result = mysql_fetch_array($results);
$tgl_faktur = $_GET['tgl_faktur'];
$results = mysql_query("SELECT * FROM penjualan where id_plg = '$pelanggan'");
$result = mysql_fetch_array($results);

$pdf = new FPDF("L","cm","A4");
$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
// $pdf->Image('../logo/bnpb.png',1,1,2,2);
$pdf->SetX(11);            
$pdf->MultiCell(19.5,1.5,'UD SARANA KERINCI',30,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetX(11);
$pdf->MultiCell(19.5,0.5,'Jln. Muradi no.38 Sungai Penuh-Kerinci',0,'L');$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(25.5,0.7,"Faktur Penjualan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(2.5,0.7,"Tanggal",0,0,'L');
$pdf->Cell(1,0.7," : ".date('D-d/m/Y', strtotime($tgl_faktur)),0,0,'L');
$pdf->ln(1);
$pdf->Cell(2.5,0.7,"No Faktur",0,0,'L');
$pdf->Cell(1,0.7," : ".date("D-d/m/Y"),0,0,'L');
$pdf->ln(1);
$pdf->Cell(2.5,0.7,"Pelanggan",0,0,'L');
$pdf->Cell(1,0.7," : ".ucwords($data['nm_plg']),0,0,'L');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(2, 0.9, 'No', 1, 0, 'C');
$pdf->Cell(3.5, 0.9, 'ID Barang', 1, 0, 'C');
$pdf->Cell(10, 0.9, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(2, 0.9, 'Jumlah', 1, 0, 'C');
$pdf->Cell(4, 0.9, 'Harga', 1, 0, 'C');
$pdf->Cell(4, 0.9, 'Total Harga', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$totals = mysql_query("SELECT SUM(total_hrg) as total from penjualan where id_plg='$pelanggan' and tgl_faktur = '$tgl_faktur'");
$totalz = mysql_fetch_array($totals);
$query=mysql_query("select penjualan.*, barang_masuk.*,barang.nm_brg, pelanggan.* from pelanggan, penjualan, barang_masuk,barang where penjualan.id_brg = barang_masuk.id_brg and barang_masuk.id_brg = barang.id_brg and penjualan.id_plg = '$pelanggan' and penjualan.tgl_faktur = '$tgl_faktur' group by id_order");
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
	  	$pdf->Cell(2, 0.9, $no , 1, 0, 'C');
		$pdf->Cell(3.5, 0.9, $lihatid, 1, 0, 'C');
		$pdf->Cell(10, 0.9, ucwords($lihat['nm_brg']), 1, 0, 'C');
		$pdf->Cell(2, 0.9, $lihat['jumlahk'], 1, 0, 'C');
		$pdf->Cell(4, 0.9, 'Rp. '.number_format($lihat['harga']), 1, 0, 'C');
		$pdf->Cell(4, 0.9, 'Rp. '.number_format($lihat['total_hrg']), 1, 1, 'C');	

	$no++;
}
		$total = $totalz['total'];
		$pdf->Cell(21.5, 0.9, 'Total Keseluruhan ', 1, 0, 'C');	
		$pdf->Cell(4, 0.9, 'Rp. '.number_format($total), 1, 1, 'C');	

	$pdf->SetFont('Arial','',11);
	$pdf->ln(1);
	$pdf->Cell(24,0.7,"UD Sarana" , 0, 1, 'R');
	$pdf->Cell(24,2.2, "Admin" , 0, 1, 'R');

$pdf->Output("laporan_barang_keluar.pdf","I");

?>

