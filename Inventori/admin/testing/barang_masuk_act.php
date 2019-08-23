<?php 
include 'config.php';
// $kd_salin=$_POST['kd_salin'];
$tglm=$_POST['tglm'];
$nosj=$_POST['nosj'];
$id_sup=$_POST['supplier'];
$id_brg=$_POST['barang'];
$barangs = mysql_query("SELECT * FROM barang WHERE id_brg='$id_brg'") or die(mysql_error());
$barang = mysql_fetch_array($barangs) or die(mysql_error());
$jen_barang=$barang['jenis_brg'];
$satuan=$barang['satuan'];
$jumlah=$_POST['jumlah'];
$harga_beli=$_POST['hargab'];
$harga_jual=$_POST['hargaj'];
$letak = $_POST['lb'];
$nop = $_POST['no_polisi'];

$query = mysql_query("insert into barang_masuk values(null,'$tglm','$nosj', '$id_sup', '$id_brg', '$jen_barang', '$satuan', '$jumlah', '$harga_beli', '$harga_jual','$letak','$jumlah','$nop')") or die(mysql_error());
if ($query) {
	# code...
	header("location:barang_masuk_tambah.php?input=sukses");
}else{
	header("location:barang_masuk_tambah.php?input=gagal");
}

 ?>