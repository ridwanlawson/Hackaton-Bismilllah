<?php 
include 'koneksi.php';
include 'header.php' ?>
              <?php 

               ?>
      <div class="main-content">
        <section class="section">
          <div class="section-header">
              <h1>Premium</h1>
          </div>
          <?php 
            error_reporting(0);
            if ($_GET['status'] == 'po') {
              ?>
              <div class="card-body">
               <div class='form-row'>
                <div class='form-group col-md-2'>
                    <input id="idf" value="1" type="hidden" />
                    <a href="po.php" name="po"  class="form-control btn-danger" style="color: white; border-style: none;" target="_blank"><center>Cetak PO</center></a>
                </div>
              </div>
              <p>Note : PO yang dicetak hanya untuk disimpan bukan untuk diserahkan pada PT Pertamina</p>
            </div>
<?php            }else{
           ?>
          <div class="section-body">
               <div class="card-body">
                <h4></h4>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Kali Pengiriman</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          // $brg=mysqli_query($conn, "SELECT * FROM barang");
                          // $no=1;
                          // while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td>1</td>
                            <td>Pertalite</td>
                            <td>2 Kl</td>
                            <td>1</td>
                            <td>Rp. 8,000</td>
                            <td>Rp. 16,000,000</td>
                          </tr>                             
                          <tr>
                            <td>1</td>
                            <td>Solar Non-Subsidi</td>
                            <td>1 Kl</td>
                            <td>10</td>
                            <td>Rp. 10,000</td>
                            <td>Rp. 10,000,000</td>
                          </tr>
                          <?php //} ?>
                          <tr>
                            <td align="right" style="" colspan="5"><b>Subtotal</b></td>
                            <td>Rp. 26,000,000</td>
                          </tr>
                          <tr>
                            <td align="right" colspan="5"><b>Diskon 10%</b></td>
                            <td>Rp. 2,600,000</td>
                          </tr>
                          <tr>
                            <td align="right" colspan="5"><b>Tax 1%</b></td>
                            <td>Rp. 260,000</td>
                          </tr>
                          <tr>
                            <td align="right" colspan="5"><b>Total</b></td>
                            <td>Rp. 23,140,000</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <form>
                  <div class="form-row">
                      <div class="col-12">
                        <div class='form-group col-md-12'>
                          <label>.</label>
                          <form method="get" action="keranjang.php?status=po">
                            <input type="hidden" name="status" value="po">
                            <input type="submit" name="cek" value="Pesan Sekarang" class="form-control btn-primary">
                          </form>
                        </div>  
                      </div>
                      </div>
                  </form>

<?php } include 'footer.php' ?>