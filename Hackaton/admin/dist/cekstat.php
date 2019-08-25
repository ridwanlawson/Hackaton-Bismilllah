    <?php include 'header.php'; ?>

    <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Cek Status Pengiriman</h1>
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
                    <h4>On Progress</h4>
                    <!-- <h4>Sampai</h4> -->
                  </div>
                  <form method="get" >
                    <div class="card-body">
                      <div class='form-row'>
                      <div class='form-group col-md-5'>
                          <label>No. Resi Pengiriman </label>
                          <input type="text" name="resi" class="form-control">
                      </div>
                      <div class='form-group col-md-2'>
                        <label>.</label>
                          <input type="submit" name="cek" value="Cek" class="form-control btn-primary">
                      </div>
                      </div>
                    </div>
                  </form>
                </div>
                <?php 
                  if (!empty($_GET['resi'])) {
                 ?>
                <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-tshirt"></i>
                            </div>
                            <div class="wizard-step-label">
                              Order Placed
                            </div>
                          </div>
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="wizard-step-label">
                              Product Shipped
                            </div>
                          </div>
                          <div class="wizard-step wizard-step-danger">
                            <div class="wizard-step-icon">
                              <i class="fas fa-credit-card"></i>
                            </div>
                            <div class="wizard-step-label">
                              Payment Completed
                            </div>
                          </div>
                          <div class="wizard-step wizard-step-danger">
                            <div class="wizard-step-icon">
                              <i class="fas fa-check"></i>
                            </div>
                            <div class="wizard-step-label">
                              Order Completed
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php } ?> 
              </div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title"><?php echo date('d-M-Y') ?></h2>
            <div class="row">
              <div class="col-12">
                <div class="activities">
                  <?php  
                    include 'koneksi.php';
                    function waktu_lalu($timestamp){
                        $selisih = time() - strtotime($timestamp) ;
                        $detik = $selisih ;
                        $menit = round($selisih / 60 );
                        $jam = round($selisih / 3600 );
                        $hari = round($selisih / 86400 );
                        $minggu = round($selisih / 604800 );
                        $bulan = round($selisih / 2419200 );
                        $tahun = round($selisih / 29030400 );
                        if ($detik <= 60) {
                            $waktu = $detik.' detik yang lalu';
                        } else if ($menit <= 60) {
                            $waktu = $menit.' menit yang lalu';
                        } else if ($jam <= 24) {
                            $waktu = $jam.' jam yang lalu';
                        } else if ($hari <= 7) {
                            $waktu = $hari.' hari yang lalu';
                        } else if ($minggu <= 4) {
                            $waktu = $minggu.' minggu yang lalu';
                        } else if ($bulan <= 12) {
                            $waktu = $bulan.' bulan yang lalu';
                        } else {
                            $waktu = $tahun.' tahun yang lalu';
                        }
                        return $waktu;
                    }

                    if (!empty($_GET['resi'])) {
                      $resi = $_GET['resi'];
                      $query = mysqli_query($conn, "SELECT pengiriman.*, tagihan.* FROM tagihan, pengiriman WHERE pengiriman.id_penerima = '$_SESSION[id]' AND pengiriman.id_pengiriman = '$resi' AND pengiriman.id_pengiriman = tagihan.id_pengiriman AND tagihan.approve = 0");
                    }else{

                    }
                    while ($data = mysqli_fetch_array($query)) {
                  ?>
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo waktu_lalu($data[11]) ?></span>
                        <span class="bullet"></span>
                        <!-- <a class="text-job" href="#">View</a> -->
                        <div class="float-right dropdown">
                         <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                           <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="lokasi.php" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View On Maps</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                          </div>
                        </div>
                      </div>
                      <p><?php echo ucwords($data['status'])." ".ucwords($data['posisi']); ?>.</p>
                    </div>
                  </div>
                  <?php 
                    } 
                  ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
          <?php include 'footer.php'; ?>