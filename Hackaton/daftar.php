<?php 
  error_reporting(0);
  include 'header_menu.php';

  if($_GET['daftar'] == "sukses"){
    echo "<script>alert('Berhasil Mendaftar')</script>";
  }elseif($_GET['daftar'] == "gagal"){
    echo "<script>alert('Gagal Mendaftar')</script>";
  }
?>
    <!-- short -->
    <div class="using-border py-3">
      <div class="inner_breadcrumb  ml-4">
        <ul class="short_ls">
          <li>
            <a href="index.php">Home</a>
            <span>/</span>
          </li>
          <li>Daftar</li>
        </ul>
      </div>
    </div>
    <!-- //short-->
    <!-- service -->
    <section class="service py-lg-4 py-md-3 py-sm-3 py-3" id="service">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Daftar Akun</h3>
        <form action="daftar_act.php" method="post">
          <div class="w3pvt-wls-contact-mid">
            <div class="form-group contact-forms">
              <input type="text" name="name" class="form-control" placeholder="Nama" required="">
            </div>
            <div class="form-group contact-forms">
              <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group contact-forms">
              <input type="text" name="phone" class="form-control" placeholder="No Handphone" required=""> 
            </div>
            <div class="form-group contact-forms">
              <input type="password" name="password" class="form-control" placeholder="Password" required=""> 
            </div>
            <button type="submit" class="btn sent-butnn">Send</button>
          </div>
        </form>
      </div>
    </section>
    <!-- //service -->
<?php 
  include 'footer.php';
?>