<?php 
include 'config.php';
$id=$_POST['id_sup'];
$nama=$_POST['nm_sup'];
$telp=$_POST['telepon'];
$alamat=$_POST['alamat'];

$query = mysql_query("update supplier set nm_sup='$nama', tlp='$telp', alamat='$alamat' where id_sup='$id'");
if ($query) {
	# code...
	header("location:supplier1.php?sukses");
}else{
	header("location:supplier1.php?sukses");
}

?>