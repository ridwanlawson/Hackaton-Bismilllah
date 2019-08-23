<?php 
include 'config.php';
// $id_sup=$_POST['id_sup'];
$nm_sup=$_POST['nm_sup'];
$alamat=$_POST['alamat'];
$telp=$_POST['telepon'];

$query = mysql_query("insert into supplier values(null,'$nm_sup','$alamat','$telp')") or die(mysql_error());
if ($query) {
	# code...
	header("location:supplier1.php?input=sukses");
}else{
	header("location:supplier1.php?input=gagal");
}
 ?>