<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Entri Data</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Barang</h2>
            <!-- <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->
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
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Barang</h4>
                  </div>
                  <div class="card-body">
                    <form action="barang_act.php" method="post">           
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" name="nm_brg" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Jenis Barang</label>
                      <select name="jenis" class="form-control">              
                        <?php
                          $brg=mysql_query("select * from jenis");
                          while ($jenis = mysql_fetch_array($brg)) {
                          echo "<option>$jenis[nama]</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <select name="satuan" class="form-control">       
                        <?php
                          $brg=mysql_query("select * from satuan");
                          while ($jenis = mysql_fetch_array($brg)) {
                          echo "<option>$jenis[nama]</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php include "footer.php"; ?>