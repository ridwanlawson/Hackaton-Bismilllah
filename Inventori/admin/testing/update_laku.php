<?php 
include 'config.php';
$id=$_POST['id'];
$tgl=$_POST['tgl'];
$daerah=$_POST['daerah'];
$nama=$_POST['nama'];
$jumlah=$_POST['jumlah'];
$dt=mysql_query("select * from barang where nama='$nama'");
$data=mysql_fetch_array($dt);
$satuan = $data['satuan'];
// $jenis=$_POST['jenis'];
// $suplier=$_POST['suplier'];
// $modal=$_POST['modal'];
// $harga=$_POST['harga'];

mysql_query("update barang_laku set  tanggal='$tgl', daerah='$daerah', nama='$nama', jumlah='$jumlah', satuan='$satuan'  where id='$id'");
header("location:barang_laku.php");

?>