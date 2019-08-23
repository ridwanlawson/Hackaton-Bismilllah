<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Entri Data</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Pelanggan</h2>
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
                    <h4>Input Pelanggan</h4>
                  </div>
                  <div class="card-body">
                  	<?php
					$id_plg=mysql_real_escape_string($_GET['id']);
					$det=mysql_query("select * from pelanggan where id_plg='$id_plg'")or die(mysql_error());
					while($d=mysql_fetch_array($det)){
					?>				
                    <form action="pelanggan_update.php" method="post">
                      <input type="hidden" name="id_plg" value="<?php echo $d[0] ?>" class="form-control">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nm_plg" value="<?php echo $d[1] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" value="<?php echo $d[2] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" name="telepon" value="<?php echo $d[3] ?>" class="form-control">
                    </div>
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php include "footer.php"; ?>
