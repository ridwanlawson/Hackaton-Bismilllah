<?php
  include 'header.php';
?>
       <!-- collection -->
    <section class="collection py-lg-4 py-md-3 py-sm-3 py-3">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Pengumuman</h3>
        <!--row -->

      <?php 
        include 'koneksi.php';
        $query = "SELECT * FROM berita ORDER BY id  DESC LIMIT 3 ";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)) {
         $genap = $row[0]%2;
         if ($genap != 0) {
            # code...
           
          ?>
        <div class="row">
          <div class="col-lg-7 col-md-6 collection-w3layouts">
            <h4> <?php echo $row['judul']; ?></h4>
            <p class="mt-2"><?php 
              if (strlen($row['isi'])>=400) {
                $isi = substr($row['isi'], 0, 400)."...";
                echo $isi; 
              }else{
                echo $row['isi'];
              }
            ?>  
            </p>
            <div class="view-buttn mt-lg-4 mt-3">
              <a href="detail.php?id=<?php echo $row[0]; ?>" class="">Read More</a>
            </div>
          </div>
          <div class="col-lg-5 col-md-6">
            <img src="<?php echo $row['gambar']; ?>" alt="news image"  class="img-fluid">
          </div>
        </div>
        <!--// row -->
 <?php }else{
       ?>  
        <!-- row -->
        <div class="row my-lg-5 my-md-4 my-3">
          <div class="col-lg-5 col-md-6">
            <img src="<?php echo $row['gambar']; ?>" alt="news image" class="img-fluid">
          </div>
          <div class="col-lg-7 col-md-6 collection-w3layouts">
            <h4><?php echo $row['judul']; ?></h4>
            <p class="mt-2"><?php 
              if (strlen($row['isi'])>=400) {
                $isi = substr($row['isi'], 0, 400)."...";
                echo $isi; 
              }else{
                echo $row['isi'];
              }
            ?>  
            </p>
            <div class="view-buttn mt-lg-4 mt-3">
              <a href="detail.php?id=<?php echo $row[0]; ?>" class="">Read More</a>
            </div>
          </div>
        </div>
        <!--// row -->

      <?php }
    } ?>

      </div>
    </section>
    <!-- collection -->
    <!-- stats -->
   <section class="stats-count py-lg-4 py-md-3 py-sm-3 py-3">
      <div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
        <div class="row text-center">
          <div class="col-lg-3 col-md-3 col-sm-6 col-6 number-w3three-info ">
           <span class="fa fa-smile-o" data-blast="bgColor"></span>
		   <h5>600+</h5>
            <h6 class="pt-2">Alumni</h6>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-6 number-w3three-info">
           <span class="fa fa-shield" data-blast="bgColor"></span>
		   <h5>350+</h5>
            <h6 class="pt-2">Siswa Aktif</h6>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-6 number-w3three-info">
            <span class="fa fa-leaf" data-blast="bgColor"></span>
			<h5>250+</h5>
            <h6 class="pt-2">Guru</h6>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-6 number-w3three-info">
            <span class="fa fa-thumbs-o-up" data-blast="bgColor"></span>
			<h5>225+</h5>
            <h6 class="pt-2">Prestasi</h6>
          </div>
        </div>
      </div>
    </section>
    <!--//stats -->
    <!-- service -->
    <section class="service py-lg-4 py-md-3 py-sm-3 py-3" id="service">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Sekolah Kami</h3>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 service-grid-wthree text-center">
            <div class="ser-Agriculture-grid">
              <div class="about-icon mb-md-4 mb-3">
                <span class="fa fa-apple" aria-hidden="true"></span>
              </div>
              <div class="ser-sevice-grid">
                <h4 class="pb-3">Guru yang Berkompeten </h4>
                <p>Guru-guru yang profesional dan berkompeten pada bidangnya  </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 service-grid-wthree text-center">
            <div class="ser-Agriculture-grid">
              <div class="about-icon mb-md-4 mb-3">
                <span class="fa fa-skyatlas" aria-hidden="true"></span>
              </div>
              <div class="ser-sevice-grid">
                <h4 class="pb-3">Kurikulum Terbarukan</h4>
                <p>Menggunakan Kurikulum terbaru yang menyesuaikan dengan standar Nasional</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 service-grid-wthree text-center">
            <div class="ser-Agriculture-grid">
              <div class="about-icon mb-md-4 mb-3">
                <span class="fa fa-yelp" aria-hidden="true"></span>
              </div>
              <div class="ser-sevice-grid">
                <h4 class="pb-3">Akreditasi B</h4>
                <p>Sekolah dengan Akreditasi B sebagai standar sekolah yang berkualitas</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- //service -->   
<?php
  include 'footer.php';
?>