<?php
  include "header.php";
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Beranda</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengguna</h4>
                  </div>
                  <div class="card-body">
                    <?php 
                      $peng = mysql_query("SELECT COUNT(id) as jml_pgn FROM admin");
                      $pengguna = mysql_fetch_array($peng);

                        echo  $pengguna['jml_pgn'];
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-smile"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pelanggan</h4>
                  </div>
                  <div class="card-body">
                    <?php 
                      $peng = mysql_query("SELECT COUNT(id_plg) as jml_plg FROM pelanggan");
                      $pengguna = mysql_fetch_array($peng);

                        echo  $pengguna['jml_plg'];
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Supplier</h4>
                  </div>
                  <div class="card-body">
                    <?php 
                      $peng = mysql_query("SELECT COUNT(id_sup) as jml_sup FROM supplier");
                      $pengguna = mysql_fetch_array($peng);

                        echo  $pengguna['jml_sup'];
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Barang</h4>
                  </div>
                  <div class="card-body">
                    <?php 
                      $peng = mysql_query("SELECT COUNT(id_brg) as jml_brg FROM barang");
                      $pengguna = mysql_fetch_array($peng);

                        echo  $pengguna['jml_brg'];
                    ?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
                           
          <div class="row">
            
          </div>
        </section>
      </div>

<?php
  include "footer.php";
?>