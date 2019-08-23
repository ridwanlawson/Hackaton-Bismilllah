<?php 
include 'config.php';

$order_id =$_POST['order_id'];
$pelanggan =$_POST['pelanggan'];
$tglf =$_POST['tglf'];
$sales =$_POST['sales'];
$barang =$_POST['barang'];
$harga =$_POST['harga'];
$jumlah =$_POST['jumlah'];
$total =$_POST['total'];

echo $order_id." ".$pelanggan." ".$tglf." ".$sales." ".$barang." ".$harga." ".$jumlah." ".$total;

$query = mysql_query("update penjualan set tgl_faktur='$tglf', nama_sales='$sales', id_plg='$pelanggan', id_brg='$barang', harga='$harga', jumlahk='$jumlah', total_hrg = '$total' where id_order='$order_id'") or die(mysql_error()); 
if ($query) {
	# code...
	header("location:penjualan_tambah.php?sukses");
}else{
	header("location:penjualan_tambah.php?gagal");
}

?>