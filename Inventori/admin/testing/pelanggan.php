<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Pelanggan</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
<br/>
<br/>

<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from pelanggan");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Pelanggan</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_pelanggan.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="pelanggan_cari.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Pelanggan " aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">ID Pelanggan</th>
		<th class="col-md-2">Nama Pelanggan</th>
		<th class="col-md-3">Alamat</th>
		<th class="col-md-1">Telepon</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from pelanggan where nm_plg like '$cari' or id_plg like '$cari' or telp like '$cari'");
	}else{
		$brg=mysql_query("select * from pelanggan limit $start, $per_hal");
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
			<td>
				<a href="pelanggan_edit.php?id=<?php echo $b[0]; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='pelanggan_hapus.php?id=<?php echo $b[0]; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
<!-- 	<tr>
		<td colspan="4">Total Modal</td>
		<td>			
		<?php 
		
			$x=mysql_query("select sum(modal) as total from pelanggan");	
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
				<h4 class="modal-title">Tambah Data Pelanggan
				</div>
				<div class="modal-body">				
					<form action="pelanggan_act.php" method="post">
						<div class="form-group">
							<label>ID Pelanggan</label>
							<input name="id_plg" type="text" class="form-control" id="tgl" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Nama Pelanggan</label>
							<input name="nm_plg" type="text" class="form-control" placeholder="ex : Ridho Ilahi" id="tgl" autocomplete="off">
						</div>									
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="alamat" class="form-control" placeholder="ex : Jl Yang Benar" id="tgl" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Telepon</label>
							<input name="telp" type="text" class="form-control" placeholder="ex : 081212121212" autocomplete="off">
						</div>	
					</div>
					<div class="modal-footer">
						<center>
						<input type="submit" class="btn btn-primary" value="Simpan">
						<input type="reset" class="btn btn-danger" value="Reset">												
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>