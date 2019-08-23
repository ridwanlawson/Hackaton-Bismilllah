<?php 
  include 'header_menu.php';
?>
    <!--//headder-->
    <!-- short -->
    <div class="using-border py-3">
      <div class="inner_breadcrumb  ml-4">
        <ul class="short_ls">
          <li>
            <a href="index.php">Home</a>
            <span>/</span>
          </li>
          <li>Hubungi Kami</li>
        </ul>
      </div>
    </div>
    <!-- //short-->
    <!--contact -->
    <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Hubungi Kami</h3>
        <div class="row">
          <!--//contact-map -->
          <div class="address_mail_footer_grids col-lg-6 col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6883117394245!2d100.41867441423987!3d-0.46253893541145197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd5256a42809263%3A0x83bcff4acf01d06b!2sSMKN2+Padang+Panjang!5e0!3m2!1sen!2sid!4v1562709088847!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <!--contact-map -->
          <div class="col-lg-6 col-md-6 contact-form-txt">
            <form action="contact_act.php" method="post">
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
                  <textarea class="form-control" name="message" placeholder="Pesan" rows="3" required=""></textarea>
                </div>
                <button type="submit" class="btn sent-butnn">Send</button>
              </div>
            </form>
            <div class="row mt-lg-5 mt-md-4 mt-3">
              <div class="contact-list-grid col-lg-6 col-md-6 col-sm-6">
                <h4>Alamat</h4>
                <p class="pt-2">Jl Ganting, 27111</p>
                <p>Padang Panjang</p>
              </div>
              <div class="contact-list-grid col-lg-6 col-md-6 col-sm-6">
                <h4>Email</h4>
                <p class="pt-2"><a href="mailto:info@example.com">info@example1.com</a> 
                </p>
                <p class="pt-2"><a href="mailto:info@example.com">info@example.com</a> 
                </p>
              </div>
            </div>
            <div class="row mt-lg-4 mt-3">
              <div class="contact-list-grid col-lg-6 col-md-6 col-sm-6">
                <h4>Phone</h4>
                <p class="pt-2">-</p>
              </div>
              <div class="contact-list-grid col-lg-6 col-md-6 col-sm-6">
                <h4>Web</h4>
                <p class="pt-2"><a href="http://smk2padangpanjang.sch.id">SMKN 2 Padang Panjang</a> 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//contact  -->
<?php 
  include 'footer.php';
?>
