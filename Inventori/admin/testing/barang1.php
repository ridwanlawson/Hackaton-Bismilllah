<?php include 'header.php' ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Barang</h4>
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
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Satuan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysql_query("select * from barang");
                          $no=1;
                          while($b=mysql_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
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
                            <td><?php echo $b[1] ?></td>
                            <td ><?php echo $b[2] ?></td>
                            <td><?php echo $b[3] ?></td>
                            <td>
                                <a href="barang_edit.php?id=<?php echo $b[0]; ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
                                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='barang_hapus.php?id=<?php echo $b[0]; ?>' }" style="color: white" class="btn btn-icon icon-left btn-warning"><i class="fas fa-exclamation-triangle"></i> Delete</a>
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

<?php include 'footer.php' ?>