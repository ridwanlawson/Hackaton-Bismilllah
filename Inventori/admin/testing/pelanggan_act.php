<?php 
include 'config.php';
// $id_plg=$_POST['id_plg'];
$nm_plg=$_POST['nm_plg'];
$alamat=$_POST['alamat'];
$telp=$_POST['telepon'];

$query = mysql_query("insert into pelanggan values(null,'$nm_plg','$alamat','$telp')") or die(mysql_error());
if ($query) {
	header("location:pelanggan_tambah.php?input=sukses");
}else{
	header("location:pelanggan_tambah.php?input=gagal");
}
 ?>