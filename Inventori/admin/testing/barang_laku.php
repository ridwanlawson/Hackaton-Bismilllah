<?php include 'header.php';	?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Barang Keluar</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Entry</button>
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
			<option>Pilih tanggal ..</option>
			<?php 
			$pil=mysql_query("select distinct tanggal from barang_laku order by tanggal desc");
			while($p=mysql_fetch_array($pil)){
				?>
				<option><?php echo $p['tanggal'] ?></option>
				<?php
			}
			?>			
		</select>
	</div>

</form>
<br/>
<?php 
if(isset($_GET['tanggal'])){
	$tanggal=mysql_real_escape_string($_GET['tanggal']);
	$tg="lap_barang_laku.php?tanggal='$tanggal'";
	?><a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}else{
	$tg="lap_barang_laku.php";
}
?>

<br/>
<?php 
if(isset($_GET['tanggal'])){
	echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
<table class="table">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Daerah</th>
		<th>Nama Barang</th>
		<th>Jumlah</th>				
		<th>Satuan</th>				
		<th>Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['tanggal'])){
		$tanggal=mysql_real_escape_string($_GET['tanggal']);
		$brg=mysql_query("select * from barang_laku where tanggal like '$tanggal' order by tanggal desc");
	}else{
		$brg=mysql_query("select * from barang_laku order by tanggal desc");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['tanggal'] ?></td>
			<td><?php echo $b['daerah'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['jumlah'] ?></td>
			<td><?php echo $b['satuan'] ?></td>
			<td>		
				<a href="edit_laku.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_laku.php?id=<?php echo $b['id']; ?>&jumlah=<?php echo $b['jumlah'] ?>&nama=<?php echo $b['nama']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>

		<?php 
	}
	?>
<!-- 	<tr>
		<td colspan="7">Total Pemasukan</td>
		<?php 
		// if(isset($_GET['tanggal'])){
		// 	$tanggal=mysql_real_escape_string($_GET['tanggal']);
		// 	$x=mysql_query("select sum(total_harga) as total from barang_laku where tanggal='$tanggal'");	
		// 	$xx=mysql_fetch_array($x);			
		// 	echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		// }else{

		// }

		?>
	</tr>
	<tr>
		<td colspan="7">Total Laba</td>
		<?php 
		// if(isset($_GET['tanggal'])){
		// 	$tanggal=mysql_real_escape_string($_GET['tanggal']);
		// 	$x=mysql_query("select sum(laba) as total from barang_laku where tanggal='$tanggal'");	
		// 	$xx=mysql_fetch_array($x);			
		// 	echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		// }else{

		// }

		?>
	</tr> -->
</table>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Keluar
				</div>
				<div class="modal-body">				
					<form action="barang_laku_act.php" method="post">
						<div class="form-group">
							<label>Tanggal</label>
							<input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Nama Barang</label>								
							<select class="form-control" name="nama">
								<?php 
								$brg=mysql_query("select * from barang");
								while($b=mysql_fetch_array($brg)){
									$id = $b['id'];	
									?>
									<option value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
									<?php 
								}
								?>
							</select>

						</div>									
						<div class="form-group">
							<label>Nama Daerah</label>								
							<select class="form-control" name="daerah">
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
							<select>
						</div>	<!-- 								
						<div class="form-group">
							<label>Harga Jual / unit</label>
							<input name="harga" type="text" class="form-control" placeholder="Harga" autocomplete="off">
						</div>	 -->
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off">
						</div>																	
						<div class="form-group">
							<!-- <label>Satuan</label> -->
							<?php
								@$namas = $_POST['nama'];
								$query = mysql_query("select * from barang where nama = '$id'") or die (mysql_error());
								// echo $query;
							?>
							<input type="hidden"  class="form-control" name="satuan" value="<?php echo $query; ?>">
						</div>																	

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">												
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
	<?php include 'footer.php'; ?>