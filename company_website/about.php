<!DOCTYPE html>
<html lang="en">
 
<?php require_once('config.php'); ?>
<?php 
if(isset($_SESSION['msg_status'])){
   $msg_status = $_SESSION['msg_status'];
   unset($_SESSION['msg_status']);
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
   $data = '';
   foreach($_POST as $k => $v){
      if(!empty($data)) $data .= " , ";
      $data .= " `{$k}` = '{$v}' ";
   }
   $sql  = "INSERT INTO `messages` set {$data}";
   $save = $conn->query($sql);
   if($save){
      $msg_status = "success";
      foreach($_POST as $k => $v){
         unset($_POST[$k]);
      }
      $_SESSION['msg_status'] = $msg_status;
      header('location:'.$_SERVER['HTTP_REFERER']);
   }else{
      $msg_status = "failed";
      echo "<script>console.log('".$conn->error."')</script>";
      echo "<script>console.log('Query','".$sql."')</script>";
   }
}

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <style>
    body{margin-top:20px;}
.timeline-steps {
    display: flex;
    justify-content: center;
    flex-wrap: wrap
}

.timeline-steps .timeline-step {
    align-items: center;
    display: flex;
    flex-direction: column;
    position: relative;
    margin: 1rem
}

@media (min-width:768px) {
    .timeline-steps .timeline-step:not(:last-child):after {
        content: "";
        display: block;
        border-top: .25rem dotted rgb(35, 32, 183);
        width: 3.46rem;
        position: absolute;
        left: 7.5rem;
        top: .3125rem
    }
    .timeline-steps .timeline-step:not(:first-child):before {
        content: "";
        display: block;
        border-top: .25rem dotted rgb(35, 32, 183);
        width: 3.8125rem;
        position: absolute;
        right: 7.5rem;
        top: .3125rem
    }
}

.timeline-steps .timeline-content {
    width: 9rem;
    text-align: center
}

.timeline-steps .timeline-content .inner-circle {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: rgb(35, 32, 183)
}

.timeline-steps .timeline-content .inner-circle:before {
    content: "";
    background-color: rgb(35, 32, 183);
    display: inline-block;
    height: 3rem;
    width: 3rem;
    min-width: 3rem;
    border-radius: 6.25rem;
    opacity: .5
}
    body {
      font-family: 'Montserrat', sans-serif;
    }
  </style>
  <title>About - CSI Holy Cross Church</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
-->
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- =======================================================
  * Template Name: TheEvent - v4.7.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center header-inner">
    <div class="container-fluid container-xxl d-flex align-items-center" style= "background-color: rgb(5,11, 37);">

      <div id="logo" class="me-auto">

        <!--<h1><a href="index.php">CSI Holy Cross Church</span></a></h1>-->
        <a href="index.php" class="scrollto"><img src=<?php echo validate_image($_settings->info('logo')) ?> alt="" title=""></a>
       
        <div id="texts" style="display:inline; white-space:nowrap; color: white; " >
          <b>CSI Holy Cross Church</b>
      </div>
  </div>
  <nav id="navbar" class="navbar order-last order-lg-0">
  <i class="bi bi-list mobile-nav-toggle"></i>
    <ul>

      <li><a class="nav-link scrollto" href="./index.php">Home</a></li>
      <li><a class="nav-link scrollto active" href="#speakers-details">About</a></li>
      <li><a class="nav-link scrollto" href="#Golden_Dates">Golden Dates</a></li>
      <li><a class="nav-link scrollto" href="#schedule">HCC Pastors</a></li>
      <li><a class="nav-link scrollto" href="#hotels">Founders</a></li>
     
    </ul>
  <!--  <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>
  <a class="buy-tickets scrollto" href="#Login">Login</a>
-->
</div>
  </header><!-- End Header -->

  <main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <?php
// Assuming $conn is the database connection variable

// Fetch data from the database
$query = $conn->query("SELECT * FROM about");
$rows = $query->fetch_all(MYSQLI_ASSOC);
?>
   <?php $e_qry = $conn->query("SELECT * FROM contacts");
while($row = $e_qry->fetch_assoc()){
    $contacts[$row['meta_field']] = $row['meta_value'];
}?>
<section id="speakers-details" data-aos="fade-up">
    <div class="container">
        <div class="section-header">
            <h2>CSI Holy Cross Church</h2>
            <p style="color:grey;"><?php echo $contacts['address'] ?></p>
        </div>

        <?php foreach ($rows as $key => $row): 
          $stripped = html_entity_decode(strip_tags($row['description']))?>
            <div class="row">
                <?php if ($key % 2 == 0): ?>
                    <!-- Even row: Image on the left, Text on the right -->
                    <div class="col-md-6">
                        <img src="<?php echo $row['file_path']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <div class="details">
                            <h2><?php echo $row['title']; ?></h2>
                            
                            <p><?php echo $stripped ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Odd row: Text on the left, Image on the right -->
                    <div class="col-md-6 order-md-2">
                        <img src="<?php echo $row['file_path']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid">
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
    </div>
    <?php
// Assuming $conn is the database connection variable

// Fetch data from the database
$query = $conn->query("SELECT * FROM goldendates");
$rows = $query->fetch_all(MYSQLI_ASSOC);
?>

<section id="Golden_Dates" data-aos="fade-up">
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-xl-6 col-lg-8">
                <br><br><h2>Golden Dates</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                    <?php foreach ($rows as $row): ?>
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="<?php echo $row['description']; ?>" data-original-title="<?php echo $row['title']; ?>">
                                <div class="inner-circle" style="border-radius: 1.5rem;
                                        height: 1rem;
                                        width: 1rem;
                                        display: inline-flex;
                                        align-items: center;
                                        justify-content: center;
                                        background-color: rgb(35, 32, 183)"></div>
                                <p class="h6 mt-3 mb-1"><?php echo $row['title']; ?></p>
                                <p class="h6 text-muted mb-0 mb-lg-0"><?php echo html_entity_decode(strip_tags($row['description'])); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="schedule" class="section-with-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Pastors At Holy Cross</h2>
    </div>

    <h3 class="sub-heading">Timeline from available Church records </h3>

    <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">
      <?php
      // Assuming $conn is the database connection variable

      // Function to get pastor details from the database
      function getPastorDetails($row) {
        return array(
          'year' => $row['year'],
          'name' => $row['title'], // Assuming the name is stored in the 'title' column
          'designation' => $row['description'],
          'image' => $row['file_path']
        );
      }

      // Fetch pastor details from the database
      $result = $conn->query("SELECT * FROM pastpastors ORDER BY year ASC");
      $currentYear = null;
      while ($row = $result->fetch_assoc()) {
        $pastor = getPastorDetails($row);

        if ($pastor['year'] != $currentYear) {
          if ($currentYear !== null) {
            echo '</div>'; // Close the previous div if it's not the first iteration
          }
          $currentYear = $pastor['year'];
          echo '<div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">';
        }
      ?>
        <div class="row schedule-item">
          <div class="col-md-2"><time><?php echo $pastor['year']; ?></time></div>
          <div class="col-md-10">
            <div class="speaker">
              <img src="<?php echo $pastor['image']; ?>" alt="<?php echo $pastor['name']; ?>">
            </div>
            <h4><?php echo $pastor['name']; ?></h4>
            <p><?php echo html_entity_decode(strip_tags($pastor['designation'])); ?></p>
          </div>
        </div>
      <?php
      }
      echo '</div>'; // Close the last div
      ?>
    </div>
  </div>
</section>


<section id="hotels" class="section-with-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Tribute to Founders</h2>
            <p>Profiles of a Few Visionary Founders</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <?php
            // Assuming $conn is the database connection variable

            // Fetch data from the tribute table
            $result = $conn->query("SELECT * FROM tribute");

            // Loop through the rows and generate HTML
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="hotel">
                        <div class="hotel-img">
                            <img src="<?php echo $row['file_path']; ?>" alt="<?php echo $row['title']; ?>" class="img-fluid">
                        </div>
                        <h3><a href="#"><?php echo $row['title']; ?></a></h3>
                        <p><?php echo html_entity_decode(strip_tags($row['description'])); ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- End Hotels Section -->

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
              <li><i class="bi bi-chevron-right"></i> <a href="men.php">Men's Fellowship</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="women.php">Women's Fellowship</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="youth.php">Youth Fellowship</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="sundayschool.php">Sunday School</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="preschool.php">Pre School</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          <h4>Service Timing</h4>
         <?php $c_qry = $conn->query("SELECT * FROM churchtime");
while($row = $c_qry->fetch_assoc()){
    $churchtime[$row['meta_field']] = $row['meta_value'];
} ?>

          
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
  </main><!-- End #main -->


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