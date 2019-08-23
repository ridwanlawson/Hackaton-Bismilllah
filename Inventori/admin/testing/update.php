<?php 
include 'config.php';
$id=$_POST['id'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$suplier=$_POST['suplier'];
$jumlah=$_POST['jumlah'];
// $modal=$_POST['modal'];
// $harga=$_POST['harga'];

mysql_query("update barang set nama='$nama', jenis='$jenis', suplier='$suplier', jumlah='$jumlah' where id='$id'");
header("location:barang.php");

?>