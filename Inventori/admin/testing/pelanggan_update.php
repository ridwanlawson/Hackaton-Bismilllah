<?php 
include 'config.php';
$id=$_POST['id_plg'];
$nama=$_POST['nm_plg'];
$telp=$_POST['telepon'];
$alamat=$_POST['alamat'];

$query = mysql_query("update pelanggan set nm_plg='$nama', telp='$telp', alamat='$alamat' where id_plg='$id'");
if ($query) {
	# code...
	header("location:pelanggan1.php?sukses");
}else{
	header("location:pelanggan1.php?gagal");
}

?>