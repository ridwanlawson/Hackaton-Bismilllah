<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Siswa</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Biodata Calon Siswa</h2>
            <!-- <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->
            <?php 
            // echo $_SESSION['status'];
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

            } 
            if ($_SESSION['status']=='validasi') {
              
              include 'koneksi.php';
              $id = $_SESSION['id'];
              $result = mysqli_query($conn, "SELECT biodata.*, nilai.*, jurusan.nama FROM biodata, nilai, jurusan WHERE biodata.id = '$id' AND biodata.nisn = nilai.nisn");
              $data = mysqli_fetch_array($result);
              ?>

            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-body">
                    <!-- <form action="" method="post">  -->
                  <div style="background-color: red; color: white" class="card-header">
                    <h4>Hasil Akan Diumumkan di Halaman Awal Pada Web PSB SMKN 2 Padang Panjang </h4>
                  </div>
                  <br>
                    <div class="form-row">           
                      <div class="form-group col-md-6">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control" placeholder="contoh : 997771010" onKeyPress="return kodeScript(event,'0123456789',this)" minlength="8" maxlength="14" value="<?php echo $data['nisn']; ?>" readonly required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nl" minlength="6" class="form-control" value="<?php echo $data['1']; ?>" placeholder="contoh : Muhammad Abdullah" onKeyPress="return kodeScript(event,' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>NIK KK</label>
                        <input type="text" name="nik" class="form-control" placeholder="contoh : 1371022700001012" value="<?php echo $data['nikkk']; ?>" onKeyPress="return kodeScript(event,'0123456789',this)" minlength="10" maxlength="18" required readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tl" class="form-control" value="<?php echo $data['tempat']; ?>" placeholder="contoh : Padang" onKeyPress="return kodeScript(event,' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" minlength="2" required readonly>
                      </div>
                      <div class="form-group col-md-2">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgll" class="form-control" placeholder="contoh : 1371022700001012" onKeyPress="return kodeScript(event,'0123456789',this)" minlength="10" maxlength="18" value="<?php echo $data['tanggal']; ?>" min="<?php echo date('Y')-25;?>-01-01" max="<?php echo date('Y')-12;?>-12-31" required readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Jenis Kelamin</label>
                        <div class="selectgroup w-100">
                          <?php if ($data['jk'] == 'Laki-laki') {
                          ?>
                          <label class="selectgroup-item">
                            <input type="radio" name="jk" checked="" value="Laki-laki"  class="form-control selectgroup-input" disabled required>
                            <span style="padding-top: 2px" class="form-control selectgroup-button">Laki-laki</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="jk" value="Perempuan" class="selectgroup-input" disabled required>
                            <span style="padding-top: 2px" class="form-control selectgroup-button">Perempuan</span>
                          </label>

                         <?php }else{ ?>
                          <label class="selectgroup-item">
                            <input type="radio" name="jk"  value="Laki-laki"  class="form-control selectgroup-input" disabled required>
                            <span style="padding-top: 2px" class="form-control selectgroup-button">Laki-laki</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="jk" checked="" value="Perempuan" class="selectgroup-input" disabled required>
                            <span style="padding-top: 2px" class="form-control selectgroup-button">Perempuan</span>
                          </label>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Alamat Rumah</label>
                        <textarea name="alar"  minlength="5" class="form-control" placeholder="contoh : Jl. Kampung Baru No.31" required readonly><?php echo $data['alamat_rumah']; ?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Asal Sekolah</label>
                        <textarea name="asas"  minlength="5" class="form-control" placeholder="contoh : SMP Kartika 1-7 Padang" required readonly><?php echo $data['asal_sekolah']; ?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Alamat Sekolah</label>
                        <textarea name="alas"  minlength="5" class="form-control" placeholder="contoh : Jl. Dr. Sutomo No.4C" required readonly><?php echo $data['alamat_sekolah']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Nama Orang Tua / Wali</label>
                        <textarea name="ortuwa"  minlength="4" class="form-control" placeholder="contoh : Ujang"  onKeyPress="return kodeScript(event,' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required readonly><?php echo $data['nama_ortu']; ?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>No Handphone Orang Tua / Wali</label>
                        <textarea name="noortuwa"  minlength="5" maxlength="14" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 081270382222" required readonly><?php echo $data['nohp_ortu']; ?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Penghasilan/bulan (Rp.)</label>
                        <textarea name="penghasilan"  minlength="5" class="form-control" placeholder="contoh : 500000" onKeyPress="return kodeScript(event,'0123456789',this)" maxlength="12" required readonly><?php echo $data['penghasilan']; ?></textarea>
                      </div>
                    </div>
<!--                     <div class="card-header" style="background-color: blue;color: white">
                      <h6>Masukkan nilai dengan baik dan benar (Sesuai Ijazah atau SKHU)</h6>
                    </div> -->
                    <br>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Bahasa Indonesia</label>
                        <input type="text" name="bind" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 80.3" value="<?php echo $data['bind']; ?>" required readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Bahasa Inggris</label>
                        <input type="text" name="bing" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 84.3" value="<?php echo $data['bing']; ?>" required readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Matematika</label>
                        <input type="text" name="mtk" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 91.3" value="<?php echo $data['mtk']; ?>" required readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label>IPA</label>
                        <input type="text" name="ipa" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 93.8" value="<?php echo $data['ipa']; ?>" required readonly>
                      </div>
                    </div>
<!--                     <div class="card-header" style="background-color: green;color: white">
                      <h6  >Pilih jurusan yang diinginkan</h6>
                    </div> -->
                    <br>
                    <div class="form-group">
                      <label class="form-label">Pilih Jurusan</label>
                      <div class="selectgroup w-100">
                        <?php 
                          include '../../koneksi.php';
                          $result = mysqli_query($conn, "SELECT * FROM jurusan order by id desc");
                          while ($j = mysqli_fetch_array($result)) {
                          ?>
                          <label class="selectgroup-item">
                            <input type="radio" name="pj" <?php if ($data['pilihan'] == $j[0] ) { echo 'checked=""';} ?> value="<?php echo $j[0]?>" class="selectgroup-input" required disabled>
                            <span class="selectgroup-button"><?php echo $j[1]?></span>
                          </label>
                          <?php
                             }
                           ?>
                      </div>
                    </div>
                    <!-- </form> -->
                  </div>
                </div>
              </div>
            </div>
           <?php }elseif ($_SESSION['status']=='pending') {
              
              include 'koneksi.php';
              $id = $_SESSION['id'];
              $result = mysqli_query($conn, "SELECT biodata.*, nilai.*, jurusan.nama FROM biodata, nilai, jurusan WHERE biodata.id = '$id' AND biodata.nisn = nilai.nisn");
              $data = mysqli_fetch_array($result);
              ?>

            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-body">
                    <form action="validasi.php" method="post"> 
                  <div style="background-color: red; color: white" class="card-header">
                    <h4>Masukkan data dengan baik dan benar (Sesuai Ijazah, Kartu Keluarga atau Akte Kelahiran)</h4>
                  </div>
                  <br>
                    <div class="form-row">           
                      <div class="form-group col-md-6">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control" placeholder="contoh : 997771010" onKeyPress="return kodeScript(event,'0123456789',this)" minlength="8" maxlength="14" value="<?php echo $data['nisn']; ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nl" minlength="6" class="form-control" value="<?php echo $data['1']; ?>" placeholder="contoh : Muhammad Abdullah" onKeyPress="return kodeScript(event,' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>NIK KK</label>
                        <input type="text" name="nik" class="form-control" placeholder="contoh : 1371022700001012" value="<?php echo $data['nikkk']; ?>" onKeyPress="return kodeScript(event,'0123456789',this)" minlength="10" maxlength="18" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tl" class="form-control" value="<?php echo $data['tempat']; ?>" placeholder="contoh : Padang" onKeyPress="return kodeScript(event,' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" minlength="2" required>
                      </div>
                      <div class="form-group col-md-2">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgll" class="form-control" placeholder="contoh : 1371022700001012" onKeyPress="return kodeScript(event,'0123456789',this)" minlength="10" maxlength="18" value="<?php echo $data['tanggal']; ?>" min="<?php echo date('Y')-25;?>-01-01" max="<?php echo date('Y')-12;?>-12-31" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Jenis Kelamin</label>
                        <div class="selectgroup w-100">
                          <?php if ($data['jk'] == 'Laki-laki') {
                          ?>
                          <label class="selectgroup-item">
                            <input type="radio" name="jk" checked="" value="Laki-laki"  class="form-control selectgroup-input" required>
                            <span style="padding-top: 2px" class="form-control selectgroup-button">Laki-laki</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="jk" value="Perempuan" class="selectgroup-input" required>
                            <span style="padding-top: 2px" class="form-control selectgroup-button">Perempuan</span>
                          </label>

                         <?php }else{ ?>
                          <label class="selectgroup-item">
                            <input type="radio" name="jk"  value="Laki-laki"  class="form-control selectgroup-input" required>
                            <span style="padding-top: 2px" class="form-control selectgroup-button">Laki-laki</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="jk" checked="" value="Perempuan" class="selectgroup-input" required>
                            <span style="padding-top: 2px" class="form-control selectgroup-button">Perempuan</span>
                          </label>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Alamat Rumah</label>
                        <textarea name="alar"  minlength="5" class="form-control" placeholder="contoh : Jl. Kampung Baru No.31" required><?php echo $data['alamat_rumah']; ?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Asal Sekolah</label>
                        <textarea name="asas"  minlength="5" class="form-control" placeholder="contoh : SMP Kartika 1-7 Padang" required><?php echo $data['asal_sekolah']; ?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Alamat Sekolah</label>
                        <textarea name="alas"  minlength="5" class="form-control" placeholder="contoh : Jl. Dr. Sutomo No.4C" required><?php echo $data['alamat_sekolah']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Nama Orang Tua / Wali</label>
                        <textarea name="ortuwa"  minlength="4" class="form-control" placeholder="contoh : Ujang"  onKeyPress="return kodeScript(event,' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required><?php echo $data['nama_ortu']; ?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>No Handphone Orang Tua / Wali</label>
                        <textarea name="noortuwa"  minlength="5" maxlength="14" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 081270382222" required><?php echo $data['nohp_ortu']; ?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Penghasilan/bulan (Rp.)</label>
                        <textarea name="penghasilan"  minlength="5" class="form-control" placeholder="contoh : 500000" onKeyPress="return kodeScript(event,'0123456789',this)" maxlength="12" required><?php echo $data['penghasilan']; ?></textarea>
                      </div>
                    </div>
                    <div class="card-header" style="background-color: blue;color: white">
                      <h6>Masukkan nilai dengan baik dan benar (Sesuai Ijazah atau SKHU)</h6>
                    </div>
                    <br>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Bahasa Indonesia</label>
                        <input type="text" name="bind" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 80.3" value="<?php echo $data['bind']; ?>" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Bahasa Inggris</label>
                        <input type="text" name="bing" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 84.3" value="<?php echo $data['bing']; ?>" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Matematika</label>
                        <input type="text" name="mtk" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 91.3" value="<?php echo $data['mtk']; ?>" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label>IPA</label>
                        <input type="text" name="ipa" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 93.8" value="<?php echo $data['ipa']; ?>" required>
                      </div>
                    </div>
                    <div class="card-header" style="background-color: green;color: white">
                      <h6  >Pilih jurusan yang diinginkan</h6>
                    </div>
                    <br>
                    <div class="form-group">
                      <label class="form-label">Pilih Jurusan</label>
                      <div class="selectgroup w-100">
                        <?php 
                          include '../../koneksi.php';
                          $result = mysqli_query($conn, "SELECT * FROM jurusan order by id desc");
                          while ($j = mysqli_fetch_array($result)) {
                          ?>
                          <label class="selectgroup-item">
                            <input type="radio" name="pj" <?php if ($data['pilihan'] == $j[0] ) { echo 'checked=""';} ?> value="<?php echo $j[0]?>" class="selectgroup-input" required>
                            <span class="selectgroup-button"><?php echo $j[1]?></span>
                          </label>
                          <?php
                             }
                           ?>
                      </div>
                    </div>
                    <input type="submit" name="validasi" onclick="return confirm('Setelah ini data tidak akan bisa diubah lagi, Apakah anda yakin?');" class="btn btn-icon icon-left btn-warning" value="Validasi"> 
                    <input type="reset" name="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
                </div>
              </div>
            </div>

       <?php     }else{

            ?>

            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-body">
                    <form action="siswa_act.php" method="post"> 
                  <div style="background-color: red; color: white" class="card-header">
                    <h4>Masukkan data dengan baik dan benar (Sesuai Ijazah, Kartu Keluarga atau Akte Kelahiran)</h4>
                  </div>
                  <br>
                    <div class="form-row">           
                      <div class="form-group col-md-6">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control" placeholder="contoh : 997771010" onKeyPress="return kodeScript(event,'0123456789',this)" minlength="8" maxlength="14" autofocus="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nl" minlength="6" class="form-control" placeholder="contoh : Muhammad Abdullah" onKeyPress="return kodeScript(event,' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>NIK KK</label>
                        <input type="text" name="nik" class="form-control" placeholder="contoh : 1371022700001012" onKeyPress="return kodeScript(event,'0123456789',this)" minlength="10" maxlength="18" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tl" class="form-control" placeholder="contoh : Padang" onKeyPress="return kodeScript(event,' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" minlength="2" required>
                      </div>
                      <div class="form-group col-md-2">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgll" class="form-control" placeholder="contoh : 1371022700001012" onKeyPress="return kodeScript(event,'0123456789',this)" minlength="10" maxlength="18" min="<?php echo date('Y')-25;?>-01-01" max="<?php echo date('Y')-12;?>-12-31" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Jenis Kelamin</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="jk" value="Laki-laki" class="form-control selectgroup-input" required>
                            <span style="padding-top: 2px" class="form-control selectgroup-button">Laki-laki</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="jk" value="Perempuan" class="selectgroup-input" required>
                            <span style="padding-top: 2px" class="form-control selectgroup-button">Perempuan</span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Alamat Rumah</label>
                        <textarea name="alar"  minlength="5" class="form-control" placeholder="contoh : Jl. Kampung Baru No.31" required></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Asal Sekolah</label>
                        <textarea name="asas"  minlength="5" class="form-control" placeholder="contoh : SMP Kartika 1-7 Padang" required></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Alamat Sekolah</label>
                        <textarea name="alas"  minlength="5" class="form-control" placeholder="contoh : Jl. Dr. Sutomo No.4C" required></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Nama Orang Tua / Wali</label>
                        <textarea name="ortuwa"  minlength="4" class="form-control" placeholder="contoh : Ujang"  onKeyPress="return kodeScript(event,' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>No Handphone Orang Tua / Wali</label>
                        <textarea name="noortuwa"  minlength="5" maxlength="14" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 081270382222" required></textarea>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Penghasilan/bulan (Rp.)</label>
                        <textarea name="penghasilan"  minlength="5" class="form-control" placeholder="contoh : 500000" onKeyPress="return kodeScript(event,'0123456789',this)" maxlength="12" required></textarea>
                      </div>
                    </div>
                    <div class="card-header" style="background-color: blue;color: white">
                      <h6>Masukkan nilai dengan baik dan benar (Sesuai Ijazah atau SKHU)</h6>
                    </div>
                    <br>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Bahasa Indonesia</label>
                        <input type="text" name="bind" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 80.3" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Bahasa Inggris</label>
                        <input type="text" name="bing" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 84.3" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Matematika</label>
                        <input type="text" name="mtk" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 91.3" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label>IPA</label>
                        <input type="text" name="ipa" maxlength="4" class="form-control" onKeyPress="return kodeScript(event,'.0123456789',this)" placeholder="contoh : 93.8" required>
                      </div>
                    </div>
                    <div class="card-header" style="background-color: green;color: white">
                      <h6  >Pilih jurusan yang diinginkan</h6>
                    </div>
                    <br>
                    <div class="form-group">
                      <label class="form-label">Pilih Jurusan</label>
                      <div class="selectgroup w-100">
                        <?php 
                          include '../../koneksi.php';
                          $result = mysqli_query($conn, "SELECT * FROM jurusan order by id desc");
                          while ($data = mysqli_fetch_array($result)) {
                        ?>
                        <label class="selectgroup-item">
                          <input type="radio" name="pj" value="<?php echo $data[0]?>" class="selectgroup-input" required>
                          <span class="selectgroup-button"><?php echo $data[1]?></span>
                        </label>
                        <?php
                           }
                         ?>
                      </div>
                    </div>
                    <input type="submit"  name="submit" onclick="alert('Apakah anda sudah yakin?');" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </section>
      </div>
<?php include "footer.php"; ?>