
<!DOCTYPE html>
<html lang="en">
<?php require_once('config.php'); ?>
<head>
<?php 
$e_qry = $conn->query("SELECT * FROM contacts");
while($row = $e_qry->fetch_assoc()){
    $contacts[$row['meta_field']] = $row['meta_value'];
  
}
$c_qry = $conn->query("SELECT * FROM churchtime");
while($row = $c_qry->fetch_assoc()){
    $churchtime[$row['meta_field']] = $row['meta_value'];
}
?>
  <style>
    .col-lg-4 {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .col-lg-4 img {
      margin: 0 auto;
    }
  </style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CSI Holy Cross English, Jalahalli</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TheEvent - v4.7.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <header id="header" class="d-flex align-items-center header-inner">
    <div class="container-fluid container-xxl d-flex align-items-center" style= "background-color: rgb(5,11, 37);">

      <div id="logo" class="me-auto">

        <!--<h1><a href="index.php">CSI Holy Cross Church</span></a></h1>-->
        <a href="index.php"class="scrollto" ><img src="assets/img/logo.png" alt="" title="" style="display:inline;"></a>
        <div id="texts" style="display:inline; white-space:nowrap; color: white; " >
          <b><?php echo $_settings->info('short_name') ?></b>
      </div>
  </div>
  <nav id="navbar" class="navbar order-last order-lg-0">
    <ul>

      <li><a class="nav-link scrollto" href="./about.php">About</a></li>
      <li><a class="nav-link scrollto" href="./index.php#gallery">Gallery</a></li>
      <li class="dropdown"><a href="#"><span>Wings</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="./youth.php">Youth Fellowship</a></li>
          <li><a href="./men.php">Men’s Fellowship</a></li>
          <li><a href="./women.php">Women’s Fellowship</a></li>
          <li><a href="./preschool.php">Pre School</a></li>
          <li><a href="./sundayschool.php">Sunday School</a></li>
          <li><a href="./senior.php">Senior Citizen's Fellowship</a></li>

        </ul>
      </li>


      <li><a class="nav-link scrollto" href="./index.php#Contact Us">Contact Us</a></li>
    </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>
  <!--  <a class="buy-tickets scrollto" href="#Login">Login</a>
-->
</div>
  </header><!-- End Header -->
<section>
<?php
// Assuming $conn is the database connection variable

// Fetch description from the database
$result = $conn->query("SELECT intro FROM dp WHERE title = 'Senior Citizen\'s Fellowship'");
$row = $result->fetch_assoc();
$seniorDescription = $row['intro'];
?>
<?php
// Assuming $conn is the database connection variable

// Fetch data from the database
$query = $conn->query("SELECT * FROM senior ORDER BY date_created ASC LIMIT 1");
$rows = $query->fetch_all(MYSQLI_ASSOC);
?>
<main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="speakers-details">
        <div class="container">
            <div class="section-header">
                <h2>Senior Citizen's Fellowship</h2>
                <p><?php echo $seniorDescription; ?></p>
            </div>

            <?php foreach ($rows as $key => $row):
                $stripped = html_entity_decode(strip_tags($row['description'])) ?>
                <div class="row">
                    <?php if ($key % 2 == 0): ?>
                        <!-- Even row: Image on the left, Text on the right -->
                        <div class="col-md-6">
                            <img src="<?php echo $row['file_path']; ?>" alt="<?php echo $row['title']; ?>"
                                class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="details">
                                <h2><?php echo $row['title']; ?></h2>

                                <p><?php echo $stripped ?></p>
                            </div>
                        </div>

                    <?php else: ?>
                        <!-- Odd row: Text on the left, Image on the right -->
                        <hr class="featurette-divider">
                        <div class="col-md-6 order-md-2">
                            <img src="<?php echo $row['file_path']; ?>" alt="<?php echo $row['title']; ?>"
                                class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="details">
                                <h2><?php echo $row['title']; ?></h2>
                                <p><?php echo $stripped ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <br><br>
            <?php endforeach; ?>
            <hr class="featurette-divider">
        </div>

    </section>
<main role="main">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">

          <div class="carousel-inner">
            <div class="carousel-item active">

              <div class="container">
                <div class="carousel-caption text-left">


                </div>
              </div></div></div></div>
            </div>
            <div class="section-header">
              <br>
          <h2>Message from leaders</h2>
          <p></p>
        </div>
        </div>


        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <?php
// Assuming $conn is the database connection variable

// Fetch data from the database (you may need to adjust the column names)
$query = $conn->query("SELECT * FROM leaders where fellowship = 'senior'");
$rows = $query->fetch_all(MYSQLI_ASSOC);
?>

<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <?php foreach ($rows as $row): ?>
            <div class="col-lg-4">
                <img class="rounded-circle" src="<?php echo $row['file_path']; ?>" alt="Generic placeholder image" width="140" height="140">
                
                <h2><?php echo $row['title']; ?></h2>
                <p><?php echo $row['description']; ?></p>
            </div><!-- /.col-lg-4 -->
        <?php endforeach; ?>
    </div>
</div>
<?php
// Assuming $conn is the database connection variable

// Fetch data from the database
$query = $conn->query("SELECT * FROM senior ORDER BY date_created ASC LIMIT 1");
$oldest_row = $query->fetch_assoc();

// Fetch all records except the oldest one
$query_all = $conn->query("SELECT * FROM senior WHERE id <> {$oldest_row['id']}");
$rows = $query_all->fetch_all(MYSQLI_ASSOC);
?>
<main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="speakers-details">
        <div class="container">
           

            <?php foreach ($rows as $key => $row):
                $stripped = html_entity_decode(strip_tags($row['description'])) ?>
                <div class="row">
                    <?php if ($key % 2 == 0): ?>
                        <!-- Even row: Image on the left, Text on the right -->
                        <div class="col-md-6">
                            <img src="<?php echo $row['file_path']; ?>" alt="<?php echo $row['title']; ?>"
                                class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="details">
                                <h2><?php echo $row['title']; ?></h2>

                                <p><?php echo $stripped ?></p>
                            </div>
                        </div>

                    <?php else: ?>
                        <!-- Odd row: Text on the left, Image on the right -->
                        <hr class="featurette-divider">
                        <div class="col-md-6 order-md-2">
                            <img src="<?php echo $row['file_path']; ?>" alt="<?php echo $row['title']; ?>"
                                class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="details">
                                <h2><?php echo $row['title']; ?></h2>
                                <p><?php echo $stripped ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <br><br>
            <?php endforeach; ?>
            <hr class="featurette-divider">
        </div>

    </section>

  </main><!-- End #main -->
 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="assets/img/logo.png" alt="TheEvenet">
            <p>Keep us, the Holy Cross family in your prayers. God Bless You!!</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="Men.php">Men's Fellowship</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="Women.php">Women's Fellowship</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="Youth.php">Youth Fellowship</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="SundaySchool.php">Sunday School</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="PreSchool.php">Pre School</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          <h4>Service Timing</h4>

          <br> <p><?php echo $churchtime['Sunday_Service'] ?></p>
    <p><?php echo $churchtime['Sunday_School'] ?></p>
    <p> <?php echo $churchtime['Communion'] ?></p>
    <p><?php echo $churchtime['Praise_&_worship'] ?></p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              <?php echo $contacts['address'] ?> <br>
            <strong>Phone:</strong>  <?php echo $contacts['mobile'] ?><br>
            <strong>Email:</strong>  <?php echo $contacts['email'] ?><br>
          </p>


            </p>

            <div class="social-links">
              
              <a href="https://www.facebook.com/p/CSI-Holy-Cross-Church-100069608255007/" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href=" <?php echo $contacts['instagram'] ?>" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href=" <?php echo $contacts['youtube'] ?>" class="google-plus"><i class="bi bi-youtube"></i></a>
             
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
       <strong></strong>
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent

        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>