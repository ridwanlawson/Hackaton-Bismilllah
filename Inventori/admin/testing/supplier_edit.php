<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Data</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Supplier</h2>
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
                    <h4>Edit Supplier</h4>
                  </div>
                  <?php
					$id_sup=mysql_real_escape_string($_GET['id']);
					$det=mysql_query("select * from supplier where id_sup='$id_sup'")or die(mysql_error());
					while($d=mysql_fetch_array($det)){
					?>
                  <div class="card-body">
                    <form action="supplier_update.php" method="post">
                      <input type="hidden" name="id_sup" class="form-control" value="<?php echo $d[0] ?>">          
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nm_sup" class="form-control" value="<?php echo $d[1] ?>">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" value="<?php echo $d[2] ?>">
                    </div>
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" name="telepon" class="form-control" value="<?php echo $d[3] ?>"> 
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
