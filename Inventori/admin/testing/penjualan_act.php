<?php 
include 'config.php';
// $id_order=$_POST['id_order'];
$tglf=$_POST['tglf'];
$sales=$_POST['sales'];
$pelanggan=$_POST['pelanggan'];
$barang_tambah=$_POST['barang'];
$results = mysql_query("SELECT * FROM barang_masuk WHERE id_brg='$barang_tambah'");
$result = mysql_fetch_array($results) or die(mysql_error());
$letak=$result['letak_brg'];
$harga=$result['harga_jual'];
$stok=$result['sisa'];
$jumlah=$_POST['jumlah'];
// echo $jumlah."<br>";
// echo $stok."<br>";
// echo $harga."<br>";
// echo $letak."<br>";
if ($jumlah<=$stok) {
	# code...
	$sisa = $stok-$jumlah;
	$update = mysql_query("UPDATE barang_masuk SET sisa='$sisa' WHERE id_brg = '$barang_tambah' and letak_brg = '$letak' and harga_jual = '$harga'") or die(mysql_error());
	$total=$jumlah*$harga;
	$query = mysql_query("insert into penjualan values(null, '$tglf', '$sales', '$pelanggan','$barang_tambah','$harga','$jumlah', '$total')") or die(mysql_error());
	if ($query) {
		# code...
		header("location:penjualan_tambah.php?input=sukses");
	}else{
		header("location:penjualan_tambah.php?input=gagal");
	}
}else{
	$sisa = $stok-$jumlah;
	if ($sisa <= 0) {
	$sisa_pos = abs($sisa);
	$update = mysql_query("UPDATE barang_masuk SET sisa='0' WHERE id_brg = '$barang_tambah' and letak_brg = '$letak' and harga_jual = '$harga'") or die(mysql_error());
	$total=$jumlah*$harga;
		echo "Maaf Barang Untuk Harga Berikut Tidak Mencukupi Tambahkan $sisa Lagi<br>";
		$query = mysql_query("insert into penjualan values('', '$tglf', '$sales', '$pelanggan','$barang_tambah','$harga','$jumlah', '$total')") or die(mysql_error());
		if ($query) {
			# code...
			header("location:penjualan_tambah.php?input=kurang&minus=$sisa");
		}else{
			header("location:penjualan_tambah.php?input=gagal");
		}
	}
}
// echo $total."<br>";
// echo $sisa."<br>";

// $sisa = $



 ?>