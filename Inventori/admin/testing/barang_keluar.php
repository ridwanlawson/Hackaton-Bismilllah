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
                    <h4>Barang Terjual</h4>
                  </div>
                    <div class="card-body">
                      <div class="button">
                          <a href="lap_barang_keluar.php" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
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
                            <th>Jumlah</th>
                            <th>Jenis</th>
                            <th>Satuan</th>
                            <th>Tanggal Terjual</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysql_query("select penjualan.*,barang.* from penjualan, barang where penjualan.id_brg = barang.id_brg") or die(mysql_error());
                          $no=1;
                          while($b=mysql_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td>
                              <?php 
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
                            <td><?php echo $b['nm_brg'] ?></td>
                            <td><?php echo $b['jumlahk'] ?></td>
                            <td><?php echo $b['jenis_brg'] ?></td>
                            <td><?php echo $b['satuan'] ?></td>
                            <td><?php echo date('d F Y', strtotime($b[1])) ?></td>
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