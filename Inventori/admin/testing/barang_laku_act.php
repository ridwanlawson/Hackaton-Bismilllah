<?php 

include 'config.php';
$tgl=$_POST['tgl'];
$nama=$_POST['nama'];
$daerah=$_POST['daerah'];
// $satuan=$_POST['satuan'];
$jumlah=$_POST['jumlah'];
// $harga=$_POST['harga'];

$dt=mysql_query("select * from barang where nama='$nama'");
$data=mysql_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
mysql_query("update barang set jumlah='$sisa' where nama='$nama'");

$modal=$data['modal'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;	
$total_harga=$harga*$jumlah;
$satuan=$data['satuan'];
mysql_query("insert into barang_laku values('','$tgl','$daerah','$nama','$jumlah','$satuan')")or die(mysql_error());
header("location:barang_laku.php");

?>