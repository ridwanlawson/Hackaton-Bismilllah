<?php 
include 'config.php';

$kd_salin = $_POST['kd_salin'];
$supplier = $_POST['supplier'];
$nosj = $_POST['nosj'];
$tglm = $_POST['tglm'];
$id_brg = $_POST['barang'];
$jumlah = $_POST['jumlah'];
$hargab = $_POST['hargab'];
$hargaj = $_POST['hargaj'];
$nopolisi = $_POST['nopolisi'];
$lb = $_POST['lb'];
$barangs = mysql_query("SELECT * FROM barang WHERE id_brg='$id_brg'") or die(mysql_error());
$barang = mysql_fetch_array($barangs) or die(mysql_error());
$jen_barang=$barang['jenis_brg'];
$satuan=$barang['satuan'];

$query = mysql_query("update barang_masuk set no_polisi = '$nopolisi', sisa='$jumlah', tgl_masuk='$tglm', no_sj='$nosj', id_sup='$supplier', id_brg='$id_brg', jenis_brg='$jen_barang', satuan='$satuan', jumlah='$jumlah', harga_beli='$hargab', harga_jual='$hargaj', letak_brg='$lb' where kd_salin='$kd_salin'") or die(mysql_error()); 
if ($query) {
	# code...
	header("location:barang_masuk.php?sukses");
}else{
	header("location:barang_masuk.php?gagal");
}

?>