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
                    <h4>Barang Masuk</h4>
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
                        Jumlah <b><?php echo ucwords($q['nm_brg']) ?></b> Kurang dari <b>100</b> <?php echo $q['satuan'] ?> . Tambah Barang Masuk <a href="barang_masuk_tambah.php"><b> Klik</b></a>.
                      </div>
                    </div> 
                 <?php   }
                  }
                  ?>

                  <div class="card-body">
                    <form action="" method="get">
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>No Surat Jalan</label>
                        <select name="supplier" class="form-control">
                          <option>Pilih No Surat Jalan</option>
                        <?php if(!empty($_GET['supplier'])){ ?>
                          <option selected><?php echo $_GET['supplier']; ?></option>
                          <?php }?>
                            <?php
                              $brg=mysql_query("select * from barang_masuk group by no_sj");
                              while ($jenis = mysql_fetch_array($brg)) {
                              echo "<option>$jenis[no_sj]</option>";
                              }
                            ?>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tanggal Surat Jalan</label>
                        <input type="date" name="tanggals" class="form-control" value="<?php echo $_GET['tanggals']; ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label>-</label>
                        <input type="submit" style="color: white" name="lihat" class="form-control btn-primary" value="Lihat" >
                      </div>
                    </div>
                    </form>
                      <div class="button">
                          <a href="lap_barang_masuk.php?no_sj=<?php echo $_GET['supplier'] ?>" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
                      </div>
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
                            <th>ID Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Jenis Barang</th>
                            <th>Satuan</th>
                            <th>Jumlah</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Tanggal Masuk</th>
                            <th>No Polisi</th>
                            <th>Letak Barang</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          if (isset($_GET['supplier'])) {
                            # code...
                            $supplier = $_GET['supplier'];
                            $brg=mysql_query("select barang_masuk.*,barang.*, supplier.* from barang_masuk, barang, supplier where barang_masuk.id_brg = barang.id_brg and barang_masuk.id_sup = supplier.id_sup and no_sj = '$supplier' ") or die(mysql_error());

                          }else{

                          }
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
                            <td><?php echo ucwords($b['nm_brg']) ?></td>
                            <td><?php echo $b['id_sup'] ?></td>
                            <td><?php echo $b['nm_sup'] ?></td>
                            <td><?php echo $b['jenis_brg'] ?></td>
                            <td><?php echo $b['satuan'] ?></td>
                            <td><?php echo $b['jumlah'] ?></td>
                            <td><?php echo "Rp. ".number_format($b['harga_beli']) ?></td>
                            <td><?php echo "Rp. ".number_format($b['harga_jual']) ?></td>
                            <td><?php echo date('d F Y', strtotime($b['tgl_masuk'])) ?></td>
                            <td><?php echo $b['no_polisi'] ?></td>
                            <td><?php echo $b['letak_brg'] ?></td>
                            <td>
                                <a href="barang_masuk_edit.php?id=<?php echo $b[0]; ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
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