<?php 
include 'config.php';
$id=$_POST['id_brg'];
$nama=$_POST['nm_brg'];
$jenis=$_POST['jenis'];
$satuan=$_POST['satuan'];
$harga=$_POST['harga'];

$query = mysql_query("update barang set nm_brg='$nama', jenis_brg='$jenis', satuan='$satuan', harga='$harga' where id_brg='$id'") or die(mysql_error()); 
if ($query) {
	# code...
	header("location:barang1.php?sukses");
}else{
	header("location:barang1.php?gagal");
}

?>