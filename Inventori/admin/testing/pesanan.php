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
                    <h4>Pesanan Masuk</h4>
                  </div>
                    <div class="card-body">
                    	<div class="button">
                      		<!-- <a href="lap_barang.php" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a> -->
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
                            <th>Nama Pelanggan</th>
                            <!-- <th>Sales</th> -->
                            <th>Pesanan</th>
                            <th>No.HP</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $sales = $_SESSION['uname'];
                          $datasales = mysql_query("SELECT * FROM admin WHERE uname = '$sales'") or die(mysql_error());
                          $hasil = mysql_fetch_array($datasales);
                          $level = $hasil['level'];
                          if ($level == "Admin") {
                            # code...
                          $brg=mysql_query("select * from pesanan")or die(mysql_error());
                          }else{
                          $brg=mysql_query("select * from pesanan where sales = '$sales'")or die(mysql_error());
                          }
                          $no=1;
                          while($b=mysql_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $b[1] ?></td>
                            <td><?php echo $b[3] ?></td>
                            <td><?php echo $b[4] ?></td>
                            <td><?php echo date('d F Y', strtotime($b[5])) ?></td>
                            <td>
                                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='pesanan_hapus.php?id=<?php echo $b[0]; ?>' }" style="color: white" class="btn btn-icon icon-left btn-warning"><i class="fas fa-exclamation-triangle"></i> Delete</a>
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