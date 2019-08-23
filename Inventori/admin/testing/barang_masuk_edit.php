<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Transaksi</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Barang Masuk</h2>
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
                    <h4>Edit Barang Masuk</h4>
                  </div>
                  <div class="card-body">
                    <?php
                      $id_brg=mysql_real_escape_string($_GET['id']);
                      $det=mysql_query("select * from barang_masuk where kd_salin='$id_brg'")or die(mysql_error());
                      while($d=mysql_fetch_array($det)){
                    ?>        
                    <form action="barang_masuk_update.php" method="post">
                    <div class="form-row">
                        <input type="hidden" name="kd_salin" class="form-control" value="<?php echo  $d['kd_salin'] ?>" readonly>
                      <div class="form-group col-md-3">
                        <label>Supplier</label>
                        <select name="supplier" class="form-control">              
                          <?php
                            $result=mysql_query("select * from supplier where id_sup='$d[id_sup]'");
                            $supplier = mysql_fetch_array($result);
                                echo "<option value=$supplier[id_sup] selected>$supplier[nm_sup]</option>";

                            $brg=mysql_query("select * from supplier");
                            while ($jenis = mysql_fetch_array($brg)) {
                                echo "<option value=$jenis[id_sup]>$jenis[nm_sup]</option>";
                            }
                          
                          ?>
                        </select>
                      </div>           
                      <div class="form-group col-md-3">
                        <label>No Surat Jalan</label>
                        <input type="text" name="nosj" class="form-control" value="<?php echo  $d['no_sj'] ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tglm" class="form-control" value="<?php echo  $d['tgl_masuk'] ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Barang</label>
                        <select name="barang" class="form-control">       
                          <?php
                            $result=mysql_query("select * from barang where id_brg='$d[id_brg]'");
                            $barang = mysql_fetch_array($result);
                                echo "<option value=$barang[id_brg] selected>$barang[nm_brg]</option>";

                            $brg=mysql_query("select * from barang");
                            while ($jenis = mysql_fetch_array($brg)) {
                                echo "<option value=$jenis[id_brg]>$jenis[nm_brg]</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" value="<?php echo  $d['jumlah'] ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Harga Beli</label>
                        <input type="text" name="hargab" class="form-control" value="<?php echo  $d['harga_beli'] ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Harga Jual</label>
                        <input type="text" name="hargaj" class="form-control" value="<?php echo  $d['harga_jual'] ?>">
                      </div>
                      
                      <div class="form-group col-md-3">
                        <label>No Polisi</label>
                        <input type="text" name="nopolisi" class="form-control" value="<?php echo  $d['no_polisi'] ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Letak Barang</label>
                        <select name="lb" class="form-control">       
                          <option><?php echo  $d['letak_brg'] ?></option>
                          <option>1A</option>
                          <option>1B</option>
                          <option>1C</option>
                          <option>1D</option>
                          <option>2A</option>
                          <option>3A</option>
                          <option>3B</option>
                          <option>3C</option>
                          <option>4A</option>
                          <option>5A</option>
                        </select>
                      </div>
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