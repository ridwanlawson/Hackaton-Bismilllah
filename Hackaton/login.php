<?php 
  include 'header_menu.php';
  error_reporting(0);
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
          <li>Login</li>
        </ul>
      </div>
    </div>
    <!-- //short-->
    <!-- service -->
    <section class="service py-lg-4 py-md-3 py-sm-3 py-3" id="service">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Login</h3>
        <form action="login_act.php" method="post">
          <div class="w3pvt-wls-contact-mid">
            <div class="form-group contact-forms">
              <input type="text" name="name" class="form-control" placeholder="Nama atau Email" required="">
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