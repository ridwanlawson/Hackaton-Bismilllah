<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Transaksi</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Penjualan</h2>
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
            <?php
            if (isset($_POST['submit'])) {
            	# code...
            	
            }

            ?>

            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Penjualan</h4>
                  </div>
                  <div class="card-body">
                    <?php
                      $id_brg=mysql_real_escape_string($_GET['id']);
                      $det=mysql_query("select * from penjualan where id_order='$id_brg'")or die(mysql_error());
                      while($d=mysql_fetch_array($det)){
                    ?>        
                    <form action="penjualan_update.php" method="post">
                    <div class="form-row">
                      <input type="hidden" name="order_id" class="form-control" value="<?php echo  $d['id_order'] ?>" readonly>
	                    <div class="form-group col-md-4">
		                      <label>Pelanggan</label>
		                      <select name="pelanggan" class="form-control">
		                        <?php
                              $result=mysql_query("select * from pelanggan where id_plg='$d[id_plg]'");
                              $pelanggan = mysql_fetch_array($result);
                                echo "<option value=$pelanggan[id_plg] selected>$pelanggan[nm_plg]</option>";

		                          $brg=mysql_query("select * from pelanggan");
		                          while ($jenis = mysql_fetch_array($brg)) {
		                          echo "<option value=$jenis[id_plg]>$jenis[nm_plg]</option>";
		                          }
		                        ?>
		                      </select>
	                    </div>
	                    <div class="form-group col-md-2">
	                      <label>Tanggal Faktur</label>
	                      <input type="date" name="tglf" class="form-control" value="<?php echo  $d['tgl_faktur'] ?>">                    
	                    </div>
	                    <div class="form-group col-md-2">
	                      <label>Nama Sales</label>
	                      <?php 
		                    $uname = $_SESSION['uname'];
	                      	$query = mysql_query("SELECT * FROM admin WHERE uname = '$uname'");
	                      	$row = mysql_fetch_assoc($query);
	                      if ($row['level'] == "Sales") {?>
	                      	# code...
	                      	<input type="text" class="form-control" name="sales" value="<?php echo $_SESSION['uname']  ?>" readonly>
	                     <?php }else{?>
		                      <select name="sales" class="form-control">   
	                     <?php     $brg=mysql_query("select * from admin WHERE level='Sales'");
	                          while ($jenis = mysql_fetch_array($brg)) {
	                          echo "<option value=$jenis[uname]>$jenis[uname]</option>";
		                          }
		                        ?>
		                 	</select>
	                     <?php } ?>
	                    </div>	                    
	                    <div class="form-group col-md-3">
	                      <label>Barang</label>
	                      <select name="barang" class="form-control" id="barang">
	                      	                        <?php
                              $result=mysql_query("select * from barang where id_brg='$d[id_brg]'");
                              $barang = mysql_fetch_array($result);
                                echo "<option value=$barang[id_brg] selected>$barang[nm_brg]</option>";

	                          $brg=mysql_query("select barang_masuk.*, barang.* from barang_masuk, barang where barang_masuk.id_brg = barang.id_brg");
	                          while ($jenis = mysql_fetch_array($brg)) {
		                          echo "<option value=$jenis[id_brg]>$jenis[nm_brg]</option>";
	                          }
	                        ?>
	                      </select>
	                    </div>
                    </div>
                    <div class="form-row">
	                    <div class="form-group col-md-3">
	                      <label>Harga</label>
	                      <input type="text" name="harga" class="form-control" id="harga" value="<?php echo  $d['harga'] ?>">
	                    </div>
	                    <div class="form-group col-md-3">
	                      <label>Jumlah</label>
	                      <input type="text" name="jumlah" class="form-control" id="jumlah" value="<?php echo  $d['jumlahk'] ?>">
	                    </div>           
	                    <div class="form-group col-md-5">
	                      <label>Total Harga</label>
	                      <input type="text" name="total" class="form-control" value="<?php echo  $d['total_hrg'] ?>">
	                    </div> 
                    </div>      
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php include "footer.php"; ?>