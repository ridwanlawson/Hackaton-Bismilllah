<?php 
  include 'header.php'; 
  include 'koneksi.php';
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Hackaton Pertamina</h1>
          </div>

          <div class="section-body">
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
            <?php }else{

            } ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Cek Ketersediaan</h4>
                  </div>
                  <form method="get" >
                    <div class="card-body">
                      <div class='form-row'>
                      <div class='form-group col-md-2'>
                      <?php $date = date('Y'); ?>
                          <select name="tahun" class="form-control">
                            <option value="0">Pilih Tahun</option>
                            <?php for ($i=2018; $i <= $date ; $i++) { ?>
                           <option><?php echo $i ?></option>
                           <?php } ?>
                           <option value="0">Lihat Semua</option>
                          </select>
                        </div>
                      <div class='form-group col-md-2'>
                          <input type="submit" name="cek" value="Cek" class="form-control btn-primary">
                      </div>  
                      </div>
                    </div>
                    </form>
<!--                     <div class="card-body">
                    	<div class="button">
                      		<a href="lap_barang.php" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
                  		</div>
                  	</div> -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Masuk</th>
                            <th>Jumlah (Unit)</th>
                            <th>Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysqli_query($conn, "SELECT * FROM barang");
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $b[1] ?></td>
                            <td><?php echo ucwords($b[2]) ?></td>
                            <td><?php echo date('d-M-Y', strtotime($b[3])) ?></td>
                            <td><?php echo $b[4] ?></td>
                            <td><?php echo 'Rp.'.number_format($b[5]) ?></td>
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