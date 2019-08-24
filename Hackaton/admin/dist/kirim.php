<?php 
  include 'header.php'; 
  include 'koneksi.php';
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Premium</h1>
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
                          <input type="submit" name="add"  class="form-control btn-danger" value="Tambah">
                      </div>
                    </div>
                  </div>
                    <div class="card-body">
                     <div class='form-row'>
                      <div class='form-group col-md-2'>
                          <label>Nama Barang</label>
                          <select class="form-control" name="barang">
                              <option>Nama Barang</option>
                            <?php 
                              include 'koneksi.php';
                              $query = mysqli_query($conn, "SELECT * FROM barang");
                              while ($data = mysqli_fetch_array($query)) {
                             ?>
                              <option value="<?php echo $data['id_brg'] ?>"><?php echo $data['nm_brg'] ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class='form-group col-md-2'>
                          <label>Jumlah Barang</label>
                          <input type="number" name="jumlah" placeholder="Masukkan Jumlah" <?php if (!empty($_GET['j'])) {?>value="<?php echo $_GET['j'];?>"<?php }else{?>value="1000"<?php } ?> class="form-control">
                      </div>
                      <div class='form-group col-md-1'>
                          <label>Satuan</label>
                          <select class="form-control" name="satuan">
                            <option>Pilih Satuan</option>
                            <option value="1" selected>Kl</option>
                            <option value="2">l</option>
                            <option value="3">Dus</option>
                          </select>
                      </div>
                      <div class='form-group col-md-1'>
                          <label>Pengiriman</label>
                            <input type="number" name="kali" class="form-control" placeholder="Masukkan Angka" value="1">
                      </div>
                      <div class='form-group col-md-3'>
                          <label>Tempat Serah Terima</label>
                          <select class="form-control" name="tempat">
                            <option>Pilih Tempat</option>
                            <option selected>Gudang (Pertamina)</option>
                            <option>Gudang Saya (User)</option>
                          </select>
                      </div>
                      <div class='form-group col-md-1'>
                        <label>.</label>
                          <input type="submit" name="cek" value="Cek" class="form-control btn-primary">
                      </div>
                      <div class='form-group col-md-1'>
                        <label>.</label>
                          <input type="submit" name="tambah" value="Add" class="form-control btn-primary">
                      </div>
                    </div>
                    </div>
                  </form>

                  <div class="form-row">
                      <div class="col-12">
                        <div class='form-group col-md-12'>
                          <label>.</label>
                            <input type="submit" name="cek" value="Lihat Keranjang" class="form-control btn-primary">
                        </div>  
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<?php include 'footer.php' ?>
<!--                             <td><?php //echo date('d-M-Y', strtotime($b[3])) ?></td>
                            <td><?php // echo $b[4] ?></td> -->
