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
                    <h4>Faktur</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="get">
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Pelanggan</label>
                          <select name="pelanggan" class="form-control">
                              <?php 
                              error_reporting(0);
                              $pelanggan = $_GET['pelanggan'];
                              if(!empty($pelanggan)){
                                  $query=mysql_query("SELECT * FROM pelanggan where id_plg = '$pelanggan'");
                                  $datass=mysql_fetch_array($query);
                                  echo "<option selected>$datass['nm_plg']</option>";
                              }
                              ?>  
                          <option>Pilih Nama Pelanggan</option>            
                            <?php
                                                        error_reporting(0);
                              $brg=mysql_query("select pelanggan.nm_plg, penjualan.* from penjualan, pelanggan where pelanggan.id_plg = penjualan.id_plg group by id_plg");
                              while ($jenis = mysql_fetch_array($brg)) {
                              echo "<option value=$jenis[id_plg]>$jenis[nm_plg]</option>";
                              }
                            ?>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tanggal Faktur</label>
                        <input type="date" name="tgl_faktur" class="form-control" value="<?php echo $_GET['tgl_faktur']?>" >
                      </div>           
                      <div class="form-group col-md-3">
                        <label>-</label>
                        <input type="submit" style="color: white" name="lihat" class="form-control btn-primary" value="Lihat" >
                      </div>
                    </div>
                    </form>
                      <div class="button">
                          <a href="faktur.php?id_plg=<?php echo $_GET['pelanggan'] ?>&&tgl_faktur=<?php echo $_GET['tgl_faktur'] ?>" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
                      </div>
                  </div>                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>No.Faktur</th>
                            <th>Tanggal Faktur</th>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          if (isset($_GET['pelanggan'])&&isset($_GET['tgl_faktur'])) {
                            # code...

                            $pelanggan = $_GET['pelanggan'];
                            $tgl_faktur = $_GET['tgl_faktur'];
                            $totals = mysql_query("SELECT SUM(total_hrg) as total from penjualan where id_plg='$pelanggan' and tgl_faktur = '$tgl_faktur'");
                            $totalz = mysql_fetch_array($totals);
                            $brg=mysql_query("select penjualan.*, barang_masuk.*,barang.nm_brg, pelanggan.* from pelanggan, penjualan, barang_masuk,barang where penjualan.id_brg = barang_masuk.id_brg and barang_masuk.id_brg = barang.id_brg and penjualan.id_plg = '$pelanggan' and penjualan.tgl_faktur = '$tgl_faktur' group by id_order ") or die(mysql_error());

                          }else{

                          }
                          $no=1;
                          while($b=mysql_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $b['no_sj'] ?></td>
                            <td><?php echo date('d F Y', strtotime($b['tgl_faktur'])) ?></td>
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
                            <td><?php echo $b['nm_brg'] ?></td>
                            <td><?php echo $b['jumlahk'] ?></td>
                            <td><?php echo "Rp. ".number_format($b['harga']) ?></td>
                            <td><?php echo "Rp. ".number_format($b['total_hrg']) ?></td>
                          </tr>
                         <?php } 
                          ?>
                          <tr>
                            <td colspan="7" align="right">Total Keseluruhan  </td>
                            <td>
                              <?php $total = $totalz['total'];
                                  echo "Rp. ".number_format($total);
                               ?>
                            </td>
                          </tr>
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