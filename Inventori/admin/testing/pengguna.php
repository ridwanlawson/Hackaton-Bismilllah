<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Entri Data</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Pengguna</h2>
            <!-- <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->

            <div class="row">
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Pengguna</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="post">
                    <div class="form-group">
                      <label>ID Pengguna</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control">
                    </div>                
                    <div class="form-group">
                      <label>Password </label>
                      <div class="input-group">
                        <input type="password" class="form-control pwstrength" data-indicator="pwindicator">
                      </div>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Level</label>
                      <select class="form-control">
                        <option>Sales</option>
                        <option>Pimpinan</option>
                        <option>Admin</option>
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