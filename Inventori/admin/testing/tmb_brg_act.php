<?php 
include 'config.php';
$tglk=$_POST['tglk'];
$tglm=$_POST['tglm'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$suplier=$_POST['suplier'];
$jumlah=$_POST['jumlah'];
$sisa=$_POST['jumlah'];
$satuan=$_POST['satuan'];
// $modal=$_POST['modal'];
// $harga=$_POST['harga'];

mysql_query("insert into barang values('','$tglm','$tglk','$nama','$jenis','$suplier','$jumlah','$satuan','$sisa')") or die(mysql_error());
header("location:barang.php");

 ?>