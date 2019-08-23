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
                    <h4>Stok</h4>
                  </div>
                    <?php
// $totals = mysql_query("SELECT SUM(total_hrg) as total from penjualan where id_plg='$pelanggan' and tgl_faktur = '$tgl_faktur'");
// $totalz = mysql_fetch_array($totals);
                  $periksa=mysql_query("select barang_masuk.*, barang.id_brg, barang.nm_brg, SUM(jumlah) as jumlah, SUM(jumlahk) as jumlahk from barang_masuk, barang, penjualan where barang_masuk.id_brg = barang.id_brg and barang_masuk.id_brg = penjualan.id_brg GROUP BY barang_masuk.id_brg");
                      while($q=mysql_fetch_array($periksa)){  
                        if($q['jumlah']-$q['jumlahk']<=100){  
                       ?>
                        <div class="alert alert-danger alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            Jumlah <b><?php echo $q['nm_brg'] ?></b> Kurang dari <b>100</b> <?php echo $q['satuan'] ?>, Tambah Barang Masuk ! .
                          </div>
                        </div> 
                     <?php   }
                      }
                      ?>
                    <div class="card-body">
                      <div class="button">
                          <a href="lap_stok.php" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
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
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Jenis Barang</th>
                            <th>Satuan</th>
                            <th>Letak Barang</th>
                            <th>Tanggal Masuk</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysql_query("select penjualan.*,barang.*, barang_masuk.harga_beli, barang_masuk.jumlah, barang_masuk.letak_brg, barang_masuk.tgl_masuk from penjualan, barang,barang_masuk where penjualan.id_brg = barang.id_brg and barang_masuk.id_brg = penjualan.id_brg GROUP BY barang_masuk.id_brg, penjualan.id_brg ") or die(mysql_error());
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
                            <td><?php echo $b['harga_beli'] ?></td>
                            <td><?php
                                    $stok = $b['jumlah'] - $b['jumlahk'];  
                                    echo $stok ?></td>
                            <td><?php echo $b['jenis_brg'] ?></td>
                            <td><?php echo $b['satuan'] ?></td>
                            <td><?php echo $b['letak_brg'] ?></td>
                            <td><?php echo date('d F Y', strtotime($b['tgl_masuk'])) ?></td>
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