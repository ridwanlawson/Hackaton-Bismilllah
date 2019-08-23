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
                    <h4>Kirim</h4>
                  </div>
                  <form method="get" >
                    <div class="card-body">
                      <div class='form-row'>
                      <div class='form-group col-md-2'>
                          <label>Asal Lokasi</label>
                          <select class="form-control" name="">
                            <option>Nama Kota</option>
                            <option>Padang</option>
                            <option>Tangerang</option>
                            <option>Banjarmasin</option>
                          </select>
                      </div>
                      <div class='form-group col-md-2'>
                          <label>Tujuan Lokasi</label>
                          <select class="form-control" name="">
                            <option>Nama Kota</option>
                            <option>Padang</option>
                            <option>Tangerang</option>
                            <option>Banjarmasin</option>
                          </select>
                      </div>
                      <div class='form-group col-md-4'>
                        <label>Jenis Barang</label>
                          <select name="jenis" class="form-control">
                            <option>Pilih Jenis</option>
                            <option>Barang Pecah Belah</option>
                            <option>Barang Antik</option>
                          </select>
                        </div>
                      <div class='form-group col-md-2'>
                          <label>Jumlah Barang</label>
                          <input type="number" name="jumlah" <?php if (!empty($_GET['j'])) {?>value="<?php echo $_GET['j'];?>"<?php } ?> class="form-control">
                      </div>
                      <div class='form-group col-md-2'>
                        <label>.</label>
                          <input type="submit" name="cek" value="Cek Harga" class="form-control btn-primary">
                      </div>
                      </div>
                      <div class="form-row">
                      <div class="col-12">
                        <div class='form-group col-md-12'>
                          <label>.</label>
                            <input type="submit" name="cek" value="Kirim" class="form-control btn-primary">
                        </div>  
                      </div>
                      </div>
                    </div>

            <div class="row">
            </div>
                    </form>
<!--                     <div class="card-body">
                      <div class="button">
                          <a href="lap_barang.php" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
                      </div>
                    </div> -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<?php include 'footer.php' ?>