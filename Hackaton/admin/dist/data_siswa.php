<?php 
  include 'header.php'; 
  include 'koneksi.php';
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan</h1>
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
                    <h4>Data Siswa</h4>
                  </div>
                    <div class="card-body">
                    	<div class="button">
                      		<a href="lap_siswa_all.php"  target="_blank" class="btn btn-icon icon-left btn-success"><i class="fas fa-print"></i> Cetak Semua</a>
                          <a href="lap_siswa_lulus.php" target="_blank" class="btn btn-icon icon-left btn-primary"><i class="fas fa-print"></i> Cetak Lulus</a>
                          <a href="lap_siswa_cadangan.php" target="_blank" class="btn btn-icon icon-left btn-warning"><i class="fas fa-print"></i> Cetak Cadangan</a>
                          <a href="lap_siswa_tidak.php"  target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak Tidak Lulus</a>
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
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>No.Handphone</th>
                            <th>Rata-rata</th>
                            <th>Hasil</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysqli_query($conn, "SELECT user.*, nilai.rata, nilai.nisn, biodata.nisn, biodata.nama, biodata.status, biodata.id FROM user, biodata, nilai WHERE biodata.nisn = nilai.nisn AND biodata.id = user.id ORDER BY biodata.status = 'Lulus' desc");
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $b['nisn'] ?></td>
                            <td><?php echo ucwords($b[nama]) ?></td>
                            <td ><?php echo $b[2] ?></td>
                            <td ><?php echo $b[3] ?></td>
                            <td ><?php echo $b['rata'] ?></td>
                            <td ><?php echo ucwords($b['status']) ?></td>

                            <td>
                              <?php 
                                if ($b['status']=="Cadangan") { ?>
                                <a href="pure.php?id=<?php echo $b['nisn']; ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-pencil-ruler"></i> Pure</a>
                               <?php }
                               ?>
                                <a href="detail_siswa.php?id=<?php echo $b['nisn']; ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-user"></i> Detail</a>
                                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='datasiswa_hapus.php?id=<?php echo $b['nisn']; ?>' }" style="color: white" class="btn btn-icon icon-left btn-danger"><i class="fas fa-exclamation-triangle"></i> Delete Data</a>
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