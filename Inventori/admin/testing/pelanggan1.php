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
                    <h4>Pelanggan</h4>
                  </div>
                    <div class="card-body">
                    	<div class="button">
                      		<a href="lap_pelanggan.php" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
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
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysql_query("select * from pelanggan");
                          $no=1;
                          while($b=mysql_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php if ($b[0]<10) {
                                        echo "PLG-00$b[0]";
                                      }elseif ($b[0]<100){
                                        echo "PLG-0$b[0]";
                                      }else{
                                        echo "PLG-$b[0]";
                                      }  
                                      ?>                              
                            </td>
                            <td><?php echo $b[1] ?></td>
                            <td ><?php echo $b[2] ?></td>
                            <td><?php echo $b[3] ?></td>
                            <td>
                                <a href="pelanggan_edit.php?id=<?php echo $b[0] ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
                                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='pelanggan_hapus.php?id=<?php echo $b[0]; ?>' }" style="color: white" class="btn btn-icon icon-left btn-warning"><i class="fas fa-exclamation-triangle"></i> Delete</a>
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