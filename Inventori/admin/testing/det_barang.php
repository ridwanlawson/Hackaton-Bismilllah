<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from barang where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['jenis'] ?></td>
		</tr>
		<tr>
			<td>Suplier</td>
			<td><?php echo $d['suplier'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Masuk</td>
			<td><?php echo date('d F Y', strtotime($d['tglm'])); ?></td>
		</tr>
		<tr>
			<td>Tanggal Kadaluarsa</td>
			<td><?php echo date('d F Y', strtotime($d['tglk'])); ?></td>
											
		</tr>
		<tr>
			<td>Sisa</td>
			<td><?php echo $d['jumlah'] ?></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?php echo $d['sisa'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>