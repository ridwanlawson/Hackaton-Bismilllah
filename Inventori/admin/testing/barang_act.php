<?php 
include 'config.php';
$id_brg=$_POST['id_brg'];
$nm_brg=$_POST['nm_brg'];
$jenis=$_POST['jenis'];
$satuan=$_POST['satuan'];
$harga=$_POST['harga'];

$query = mysql_query("insert into barang(id_brg, nm_brg, jenis_brg, satuan) values(null, '$nm_brg','$jenis', '$satuan')") or die(mysql_error());
if ($query) {
	# code...
	header("location:barang_tambah.php?input=sukses");
}else{
	header("location:barang_tambah.php?input=gagal");
}

 ?>