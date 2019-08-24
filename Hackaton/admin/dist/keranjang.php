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
                            <th>Diskon</th>
                            <th>Total</th>
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
                            <td>Aftur</td>
                            <td>2 L</td>
                            <td>1</td>
                            <td>2000</td>
                            <td>200</td>
                            <td align="right">3600</td>
                          </tr>                             
                          <tr>
                            <td>1</td>
                            <td>BBM Industri</td>
                            <td>2000 Kl</td>
                            <td>10</td>
                            <td>12000</td>
                            <td>-</td>
                            <td align="right">120000</td>
                          </tr>
                          <?php //} ?>
                          <tr>
                            <td align="right" style="" colspan="6"><b>Subtotal</b></td>
                            <td>123600</td>
                          </tr>
                          <tr>
                            <td align="right" colspan="6"><b>Diskon</b></td>
                            <td>ss</td>
                          </tr>
                          <tr>
                            <td align="right" colspan="6"><b>Tax</b></td>
                            <td>ss</td>
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
                            <input type="submit" name="cek" value="Pesan Sekarang" class="form-control btn-primary">
                        </div>  
                      </div>
                      </div>
                  </form>

<?php 'footer.php' ?>