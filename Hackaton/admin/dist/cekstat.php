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
                          <input type="text" name="cari" class="form-control">
                      </div>
                      <div class='form-group col-md-2'>
                        <label>.</label>
                          <input type="submit" name="cek" value="Cek" class="form-control btn-primary">
                      </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">1 Agustus 2018</h2>
            <div class="row">
              <div class="col-12">
                <div class="activities">
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">2 Minggu lalu</span>
                        <span class="bullet"></span>
                        <!-- <a class="text-job" href="#">View</a> -->
                        <div class="float-right dropdown">
                         <!-- <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                           <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div> -->
                        </div>
                      </div>
                      <p>Sampai di Gudang Bandung.</p>
                    </div>
                  </div>
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">1 Minggu lalu</span>
                        <span class="bullet"></span>
                        <!-- <a class="text-job" href="#">View</a> -->
                        <div class="float-right dropdown">
                         <!-- <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                           <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div> -->
                        </div>
                      </div>
                      <p>Sampai di Gudang Lampung.</p>
                    </div>
                  </div>
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">4 Minggu lalu</span>
                        <span class="bullet"></span>
                        <!-- <a class="text-job" href="#">View</a> -->
                        <div class="float-right dropdown">
                         <!-- <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                           <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div> -->
                        </div>
                      </div>
                      <p>Sampai di Gudang Bukittinggi.</p>
                    </div>
                  </div>
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">4 Jam lalu</span>
                        <span class="bullet"></span>
                        <!-- <a class="text-job" href="#">View</a> -->
                        <div class="float-right dropdown">
                         <!-- <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                           <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div> -->
                        </div>
                      </div>
                      <p>Sampai di Gudang Padang.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
          <?php include 'footer.php'; ?>