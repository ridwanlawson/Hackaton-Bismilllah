<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="barang_laku.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysql_real_escape_string($_GET['id']);

$det=mysql_query("select * from barang_laku where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<form action="update_laku.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>

			<tr>
				<td>Tanggal</td>
				<td><input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off" value="<?php echo $d['tanggal'] ?>"></td>
			</tr>
			<tr>
				<td>Daerah</td>
				<td><select name="daerah" class="form-control" id="daerah"> 
						<option>Sumatera_Barat</option>
						<option>Kota_Padang</option>
						<option>Kota_Padangpanjang</option>
						<option>Kota_Bukittinggi</option>
						<option>Kota_Pariaman</option>
						<option>Kota_Payakumbuh</option>
						<option>Kota_Sawahlunto</option>
					  	<option>Kota_Solok</option>
					  	<<option>Kabupaten_Agam</option>
					  	<option>Kabupaten_Dharmasraya</option>
					  	<option>Kabupaten_Kep_Mentawai</option>
					  	<option>Kabupaten_Lima_Puluh_Kota</option>
					  	<option>Kabupaten_Padang_Pariaman</option>
					  	<option>Kabupaten_Pasaman</option>
					  	<option>Kabupaten_Pasaman_Barat</option>
					  	<option>Kabupaten_Pesisir_Selatan</option>
					  	<option>Kabupaten_Sijunjung</option>
					  	<option>Kabupaten_Solok</option>
					  	<option>Kabupaten_Solok_Selatan</option>
					  	<option>Kabupaten_Tanah_Datar</option>
					</select></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
					<select class="form-control" name="nama">
						<?php 
						$brg=mysql_query("select * from barang");
						while($b=mysql_fetch_array($brg)){
							?>	
							<option <?php if($d['nama']==$b['nama']){echo "selected"; } ?> value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
							<?php 
						}
						?>
					</select>
				</td>
			</tr>		

<!-- 			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?php //echo $d['harga'] ?>"></td>
			</tr> -->
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
 <script type="text/javascript">
        $(document).ready(function(){

            $('#tgl').datepicker({dateFormat: 'yy/mm/dd'});

        });
    </script>
<?php 
include 'footer.php';

?>