<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Transaksi</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Penjualan</h2>
            <!-- <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->
            <?php 
            error_reporting(0);
            if ($_GET['input']=="sukses") {
              # code...
            ?>
                    <div class="alert alert-primary alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Berhasil Menambahkan.
                      </div>
                    </div>
            <?php }elseif ($_GET['input']=="gagal") {
              # code...
              ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Gagal Menambahkan.
                      </div>
                    </div>
            <?php }elseif ($_GET['input']=="kurang") {
              # code...
              ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Maaf <?php echo $_GET['id_brg']; ?> masih kurang <?php echo $_GET['minus']; ?> lagi.
                      </div>
                    </div>
           <?php }else{

            } ?>


            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Penjualan</h4>
                  </div>
                  <div class="card-body">
                    <form action="penjualan_act.php" method="post">
                    <div class="form-row">
	                    <div class="form-group col-md-2">
		                      <label>Pelanggan</label>
		                      <select name="pelanggan" class="form-control">              
		                        <?php
		                          $brg=mysql_query("select * from pelanggan");
		                          while ($jenis = mysql_fetch_array($brg)) {
		                          echo "<option value=$jenis[id_plg]>$jenis[nm_plg]</option>";
		                          }
		                        ?>
		                      </select>
	                    </div>
	                    <div class="form-group col-md-3">
	                      <label>Tanggal Faktur</label>
	                      <input type="date" name="tglf" class="form-control">                    
	                    </div>
	                    <div class="form-group col-md-2">
	                      <label>Nama Sales</label>
	                      <?php 
		                    $uname = $_SESSION['uname'];
	                      	$query = mysql_query("SELECT * FROM admin WHERE uname = '$uname'");
	                      	$row = mysql_fetch_assoc($query);
	                      if ($row['level'] == "Sales") {?>
	                      	# code...
	                      	<input type="text" class="form-control" name="sales" value="<?php echo $_SESSION['uname']  ?>" readonly>
	                     <?php }else{?>
		                      <select name="sales" class="form-control">   
	                     <?php     $brg=mysql_query("select * from admin WHERE level='Sales'");
	                          while ($jenis = mysql_fetch_array($brg)) {
	                          echo "<option value=$jenis[uname]>$jenis[uname]</option>";
		                          }
		                        ?>
		                 	</select>
	                     <?php } ?>
	                    </div>	                    
	                    <div class="form-group col-md-4">
	                      <label>Barang</label>
	                      <select name="barang" class="form-control" id="barang">
	                      <option>Pilih</option>              
	                        <?php
	                          $brg=mysql_query("select barang_masuk.*, barang.* from barang_masuk, barang where barang_masuk.id_brg = barang.id_brg and sisa>0 order by tgl_masuk desc");
	                          while ($jenis = mysql_fetch_array($brg)) {
		                          echo "<option value=$jenis[id_brg]>$jenis[nm_brg] -> $jenis[harga_jual]</option>";
	                          }
	                        ?>
	                      </select>
	                    </div>
                      <div class="form-group col-md-1">
                        <label>Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlah">
                      </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Penjualan</h4>
                  </div>

                  <?php 
                  $periksa=mysql_query("select barang_masuk.*, barang.id_brg, barang.nm_brg from barang_masuk, barang  where jumlah <=100 and barang_masuk.id_brg = barang.id_brg");
                  while($q=mysql_fetch_array($periksa)){  
                    if($q['jumlah']<=100){  
                   ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Jumlah <b><?php echo $q['nm_brg'] ?></b> Kurang dari <b>100</b> <?php echo $q['satuan'] ?> . Tambah Barang Masuk <a href="barang_masuk_tambah.php"><b> Klik</b></a>.
                      </div>
                    </div> 
                 <?php   }
                  }
                  ?>
                    <div class="card-body">
                      <div class="button">
                          <a href="lap_barang.php" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
                      </div>
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>ID Order</th>
                            <th>Tgl Faktur</th>
                            <th>Nama Sales</th>
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>ID Barang</th>
                            <th>Jenis Barang</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysql_query("select penjualan.*,barang.nm_brg,barang.satuan,barang.jenis_brg, pelanggan.nm_plg from penjualan, barang, pelanggan where penjualan.id_brg = barang.id_brg and penjualan.id_plg = pelanggan.id_plg order by id_order desc") or die(mysql_error());
                          $no=1;
                          while($b=mysql_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td>
                            	<?php if ($b['id_order']<10) {
	                            		echo "OR-00".$b['id_order']; 
                            	}elseif ($b['id_order']<100 ) {
                            			echo "OR-0".$b['id_order']; 
                            	}else{ echo "OR-".$b['id_order']; }
                            	?>		
                            </td>
                            <td><?php echo $b['tgl_faktur'] ?></td>
                            <td><?php echo $b['nama_sales'] ?></td>
                            <td>
                            	<?php if ($b['id_plg']<10) {
	                            		echo "PLG-00".$b['id_plg']; 
                            	}elseif ($b['id_plg']<100 ) {
                            			echo "PLG-0".$b['id_plg']; 
                            	}else{ echo "PLG-".$b['id_plg']; }
                            	?>		
                            </td>
                            <td><?php echo $b['nm_plg'] ?></td>
                            <td><?php 
                                if ($b['id_brg']<10) {
                                  if ($b['jenis_brg']=="Makanan") {
                                      $bid = "MKN-00$b[id_brg]";
                                  }elseif ($b['jenis_brg']=="Minuman") {
                                      $bid = "MNM-00$b[id_brg]";
                                  }else{
                                      $bid = "TBM-00$b[id_brg]";
                                  }
                                }elseif ($b['id_brg']<100){
                                    if ($b['jenis_brg']=="Makanan") {
                                      $bid = "MKN-0$b[id_brg]";
                                  }elseif ($b['jenis_brg']=="Minuman") {
                                      $bid = "MNM-0$b[id_brg]";
                                  }else{
                                      $bid = "TBM-0$b[id_brg]";
                                  }
                                }else{
                                    if ($b['jenis_brg']=="Makanan") {
                                      $bid = "MKN-$b[id_brg]";
                                  }elseif ($b['jenis_brg']=="Minuman") {
                                      $bid = "MNM-$b[id_brg]";
                                  }else{
                                      $bid = "TBM-$b[id_brg]";
                                  }
                                }
                                echo $bid;
                                ?>
                                	
                                </td>
                            <td><?php echo $b['jenis_brg'] ?></td>
                            <td><?php echo $b['satuan'] ?></td>
                            <td><?php echo "Rp. ".number_format($b['harga']) ?></td>
                            <td><?php echo $b['jumlahk'] ?></td>
                            <td><?php echo "Rp. ".number_format($b['total_hrg']) ?></td>
                            <td>
                                <a href="penjualan_edit.php?id=<?php echo $b['id_order']; ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php include "footer.php"; ?>