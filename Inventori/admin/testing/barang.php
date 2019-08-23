<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br/>
<br/>

<?php 
$periksa=mysql_query("select * from barang where jumlah <=3");
while($q=mysql_fetch_array($periksa)){	
	if($q['jumlah']<=3){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan ditambah lagi !!</div>";	
	}
}
?>
<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from barang");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Barang</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">ID Barang</th>
		<th class="col-md-3">Nama Barang</th>
		<th class="col-md-1">Jenis Barang</th>
		<th class="col-md-1">Satuan</th>
		<th class="col-md-1">Harga</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from barang where nama like '$cari' or jenis like '$cari'");
	}else{
		$brg=mysql_query("select * from barang limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b[0] ?></td>
			<td><?php echo $b[1] ?></td>
			<td><?php echo $b[2] ?></td>
			<td><?php echo $b[3] ?></td>
			<td><?php echo $b[4] ?></td>
			<td>
				<a href="barang_det.php?id=<?php echo $b[0]; ?>" class="btn btn-info">Detail</a>
				<a href="barang_edit.php?id=<?php echo $b[0]; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='barang_hapus.php?id=<?php echo $b[0]; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
<!-- 	<tr>
		<td colspan="4">Total Modal</td>
		<td>			
		<?php 
		
			$x=mysql_query("select sum(modal) as total from barang");	
			$xx=mysql_fetch_array($x);			
			echo "<b> Rp.". number_format($xx['total']).",-</b>";		
		?>
		</td>
	</tr> -->
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="barang_act.php" method="post">
					<div class="form-group">
							<label>ID Barang</label>
							<input name="id_brg" type="text" class="form-control" id="id_brg" autocomplete="off">
					</div>
					<div class="form-group">
							<label>Nama Barang</label>
							<input name="nm_brg" type="text" class="form-control" id="nm_brg" placeholder="Nama Barang ..">
					</div>
					<div class="form-group">
						<label>Jenis Barang</label>
						<select name="jenis" class="form-control" >
							<?php
								$brg=mysql_query("select * from jenis");
								while ($jenis = mysql_fetch_array($brg)) {
								echo "<option>$jenis[nama]</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<select name="satuan" class="form-control" >
							<?php
								$brg=mysql_query("select * from satuan");
								while ($satuan = mysql_fetch_array($brg)) {
								echo "<option>$satuan[nama]</option>";
								}
							?>
						</select>
					</div>																	
					<div class="form-group">
						<label>Harga</label>
						<input name="harga" type="text" class="form-control">
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
include 'footer.php';

?>