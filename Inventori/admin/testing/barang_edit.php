<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Data</h1>
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
                        Berhasil Mengedit.
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
                        Gagal Mengedit.
                      </div>
                    </div>
            <?php }else{

            } ?>
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Barang</h4>
                  </div>
                  <div class="card-body">
                  	<?php
						$id_brg=mysql_real_escape_string($_GET['id']);
						$det=mysql_query("select * from barang where id_brg='$id_brg'")or die(mysql_error());
						while($d=mysql_fetch_array($det)){
						?>					

                    <form action="barang_update.php" method="post">
                      <input type="hidden" name="id_brg" value="<?php echo $d[0] ?>" class="form-control">
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" name="nm_brg" value="<?php echo $d[1] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Jenis Barang</label>
                      <select name="jenis" class="form-control">
                      <option><?php echo $d[2] ?></option>              
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
                      <option><?php echo $d[3] ?></option>       
                        <?php
                          $brg=mysql_query("select * from satuan");
                          while ($jenis = mysql_fetch_array($brg)) {
                          echo "<option>$jenis[nama]</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="text" name="harga" value="<?php echo $d[4] ?>" class="form-control">
                    </div>
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                <?php } ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php include "footer.php"; ?>

