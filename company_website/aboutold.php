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
    width: 10rem;
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

  <!-- =======================================================
  * Template Name: TheEvent - v4.7.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center ">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="index.html">The<span>Event</span></a></h1>
       <!--<a href="index.html" class="scrollto"><img src="assets/img/logo.png" alt="" title=""></a> -->
        
        <a href="index.html" class="scrollto"><img src=<?php echo validate_image($_settings->info('logo')) ?> alt="" title=""></a>
        <div id="texts" style="display:inline; white-space:nowrap; color: white; " >
              <b><?php echo $_settings->info('short_name') ?></b></div>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="./about.html">About</a></li>
          <li><a class="nav-link scrollto" href="#speakers">Fellowships</a></li>
          <li><a class="nav-link scrollto" href="#schedule">Calender</a></li>
          <li><a class="nav-link scrollto" href="#venue">Locate Us</a></li>
           <!-- <li><a class="nav-link scrollto" href="#hotels">Hotels</a></li>-->
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
        <!--   <li><a class="nav-link scrollto" href="#supporters">Sponsors</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
     <!-- <a class="buy-tickets scrollto" href="#buy-tickets">Buy Tickets</a>-->

    </div>
  </header><!-- End Header -->
<!-- End Header -->

  <main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="speakers-details"  data-aos="fade-up">
      <div class="container">
        <div class="section-header">
          <h2>CSI Holy Cross Church</h2>
          <p style="color:grey;">911, Subroto Mukherji Road, Jalahalli, Bangalore 560015</p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <img src="assets/img/about/All.JPG" alt="Speaker 2" class="img-fluid">
          </div>

          <div class="col-md-6">
            <div class="details">
              <h2>About Us</h2>
              <div class="social">
                <a href="https://www.youtube.com/@csiholycrosschurch6050"><i class="bi bi-youtube"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100069608255007"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/csiholycross.church/"><i class="bi bi-instagram"></i></a>

              </div>
              <p>Holy Cross stands out as being the only Church in the Jalahalli area running its worship service in English catering to the spiritual needs of a congregation of diverse languages and cultures. She has also established a healthy tradition of electing the pastorate committee by consensus all these years. She has been the mother church for many congregations in the area. Tamil, Telugu and Malayalam congregations used its premises for many years before they built their own churches</p>
              <p>The Holy Cross spirit has always been one of camaraderie and family bonds. This has allowed her to grow from strength to strength, always keeping herself abreast of the times</p>


            </div>
          </div>

        </div>
        <br><br>
        <div class="row">
          <div class="col-md-6">
            <img  src="assets/img/about/oldchurch.png" alt="Speaker 2" class="img-fluid">
            <img  src="assets/img/about/oldchurch2.png" alt="Speaker 2" class="img-fluid">
          </div>

          <div class="col-md-6">
            <div class="details">
              <h2>The Formative Years</h2>

              <p>A thousand mile journey begins with the first step. Holy Cross has journeyed a long way in its evolution. Over a span of more than six decades she has grown from a simple hutment-style church into a magnificent modern structure.
                On 19th November 1944 the first recorded Christian worship began in the Jalahalli area when, due to the needs of World War II, almost the whole of the Jalahalli area was acquired by the British Defence Forces and was designated as a Hospital Town for defence personnel wounded in the fighting in Burma and the Middle East. Many of the wounded were flown in and landed on an airstrip in Jalahalli West. They were cared for in newly built hutments constructed by Italian Prisoners of War in pre-independent India. The spiritual needs of the staff and wounded were ministered to by Army Chaplains of various denominations.
<br>
<br><br>
                <p>After independence in 1947, when the Air Force Station Headquarters took control of the area, official buildings were not permitted for religious worship. The few civilian Christians conducted worship services in the homes of Mr. G.R. Henry, Retd. Dy. Controller of Defence Accounts and Mr B. Devadason. Using their influence with Colonel Newton King, commandant of EME they obtained prayer and songbooks along with an organ for use in their worship. As more members joined Sunday worship, accommodation posed a serious problem and the need for a regular place of worship became imperative. The Henry family displayed a magnanimous gesture in donating the piece of land on which the present parsonage and the Church stand. The past and present congregations owe a fund of gratitude to that great family. This set the stage for the humble beginning of the first Church.
                </p>
              </div>

          </div>
        <section>
          <div class="container"  data-aos="fade-up">
            <div class="row text-center justify-content-center mb-5">
                <div class="col-xl-6 col-lg-8">
                  <br><br>  <h2>Golden Dates</h2>
                                    </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                                <div class="inner-circle" style =" border-radius: 1.5rem;
                                  height: 1rem;
                                  width: 1rem;
                                  display: inline-flex;
                                  align-items: center;
                                  justify-content: center;
                                  background-color: rgb(35, 32, 183)"></div>
                                <p class="h6 mt-3 mb-1">19 November 1944</p>
                                <p class="h6 text-muted mb-0 mb-lg-0">Church Service Opened at The Garrison Chapel</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2004">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">1952</p>
                                <p class="h6 text-muted mb-0 mb-lg-0">1st Church Building was Dedicated</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2005">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">18 December 1977</p>
                                <p class="h6 text-muted mb-0 mb-lg-0">2nd Church Building was Dedicated</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                          <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                              <div class="inner-circle"></div>
                              <p class="h6 mt-3 mb-1">20th November 1994</p>
                              <p class="h6 text-muted mb-0 mb-lg-0">Golden Jubilee</p>
                          </div>
                      </div>
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">13 April 2003</p>
                                <p class="h6 text-muted mb-0 mb-lg-0">Present Church Building was Dedicated</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                          <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                              <div class="inner-circle"></div>
                              <p class="h6 mt-3 mb-1">2019</p>
                              <p class="h6 text-muted mb-0 mb-lg-0">75th Anniversary</p>
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

                  <!-- Schdule Day 1 -->
                  <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1944</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Dr.<span>Banyan</span></h4>
                        <p>Garrison Chaplain</p>
                      </div>
                    </div>

                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1947 or 1948</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Canon Lazarus </span></h4>
                        <p>Brotherhood of St. Peter</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>Lokapathy</span></h4>
                        <p>St. Paul's Church</p>
                      </div>
                    </div>

                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1952-1960</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4><br><span>UTC STAFF</span></h4>

                      </div>
                    </div>

                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1960</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Harry Daniel</span></h4>
                        <p>Presbyter St. Mark's Cathedral and Chairman, Advisory Comittee HCC</p>
                      </div>
                    </div>

                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1965</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>W. V Karl</span></h4>
                        <p>Director of City Mission Council, Chairman, Advisory Committee</p>
                      </div>
                    </div>

                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1969</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>S.Samuel</span></h4>
                        <p>Director of City Mission Council, Chairman, Advisory Committee</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                     <div class="col-md-2"><time>1974-1975</time></div>
                       <div class="col-md-10">
                         <div class="speaker">
                           <img src="assets/img/2.jpg" alt="Brenden Legros">
                         </div>
                         <h4>Rev. <span>James Williams</span></h4>
                          <p>Director of City Mission Council, Chairman, Advisory Committee</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1974-1975</time></div>
                        <div class="col-md-10">
                          <div class="speaker">
                            <img src="assets/img/2.jpg" alt="Brenden Legros">
                          </div>
                          <h4>Rev. <span>F.S. Macwana</span></h4>
                           <p>Presbter-in-charge</p>
                       </div>
                     </div>
                     <div class="row schedule-item">
                      <div class="col-md-2"><time>1975</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Prabu Das </span></h4>
                        <p>UTC</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>Peter Millar</span></h4>
                        <p>UTC</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1978</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>S. Samuel</span></h4>
                        <p>Director, UCE</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>G. D. Melancthon</span></h4>
                        <p>Pastor-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1978</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>S. Samuel</span></h4>
                        <p>Director, UCE</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>F. S. Macwana</span></h4>
                        <p>Pastor-in-charge</p>
                      </div>
                    </div>

                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1979</time></div>
                        <div class="col-md-10">
                          <div class="speaker">
                            <img src="assets/img/2.jpg" alt="Brenden Legros">
                          </div>
                          <h4>Rev. <span>F. S Macwana</span></h4>
                           <p>Presbyter/Chairman</p>
                       </div>
                     </div>
                     <div class="row schedule-item">
                      <div class="col-md-2"><time>1982</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>James Williams</span></h4>
                        <p>Director, UCE</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>Vincent Rajkumar</span></h4>
                        <p></p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1983</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Solomon Gnanaraj</span></h4>
                        <p>Director, UCE</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>D. G. S. Rodricks</span></h4>
                        <p>Pastor-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1984</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>V. K. Samuel</span></h4>
                        <p>Director, UCE</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>D.G.S. Rodrics</span></h4>
                        <p>Pastor-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1984</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>V. K. Samuel</span></h4>
                        <p>Director, UCE</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>M.D.E. Barnabas</span></h4>
                        <p>Residental Pastor</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1986</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>J. R. Henry</span></h4>
                        <p>Civil Area Chairman</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>M.D.E. Barnabas</span></h4>
                        <p>Residental Pastor</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1960</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Arunkumar Wesley</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1990</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Daniel Ravikumar</span></h4>
                        <p>PC Chairman</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>Job Jeyaraj</span></h4>
                        <p>Resident Pastor</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1990</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Daniel Ravikumar</span></h4>
                        <p>PC Chairman</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>Gnana Thomas</span></h4>
                        <p>Presbyter or Resident Pastor</p>
                      </div>
                    </div>

                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1992-1997</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>J.D. David Rajan</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>

                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1997-1999</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Joshua Inbakumar</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>1999-2003</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Sathyanadh</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2003-2005</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Daniel Ravikumar</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2005-2006</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Jeevan Babu</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2006-2008</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Florence Deenadayalan</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2008 - 2013</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>B.P. Timothy</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2013-2015</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Violet Cury</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2015</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Gnana Selvi</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2015</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Job Jeyaraj</span></h4>
                        <p>Presbyter-in-charge</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>Rajasingh</span></h4>
                        <p>Resident Pastor </p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2015</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Ambler</span></h4>
                        <p>Presbyter-in-charge</p>
                       <span><br><br></span>
                       <div class="speaker">
                        <img src="assets/img/2.jpg" alt="Brenden Legros">
                      </div>
                        <h4>Rev. <span>Rajasingh</span></h4>
                        <p>Resident Pastor </p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2015-2017</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Rajasingh</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>

                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2017-2020</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Tabitha Cedric</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2020-2022</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Christopher Samuel</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2022-2023</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>Asha Karthik</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>
                    <div class="row schedule-item">
                      <div class="col-md-2"><time>2023 -- Present</time></div>
                      <div class="col-md-10">
                        <div class="speaker">
                          <img src="assets/img/2.jpg" alt="Brenden Legros">
                        </div>
                        <h4>Rev. <span>P.V.G Kumar</span></h4>
                        <p>Presbyter-in-charge</p>
                      </div>
                    </div>




                  </div>



                </div>
        </div>

      </div>

    </section>
    <section id="hotels" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Tribute to Founders</h2>
          <p>Sub heading</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="assets/img/about/Untitled.png" alt="Devadason" class="img-fluid">
              </div>
              <h3><a href="#">Mr. B Devadason</a></h3>

              <p>Mr Devadason served this church with passion and commitment as secretary and treasurer from 1952-1975. The seed for a small place of worship was planted in the early years of independence, starting by way of Sunday worship in his residence and that of Mr G.R. Henry. His passion to build a small Chapel enthused him to give his time and energy for this. He managed to build a small chapel on the present land donated by Mr. G.R. Henry and was dedicated as Holy Cross Church in 1952.  </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="assets/img/about/dummy-image.jpg" alt="Hotel 2" class="img-fluid">
              </div>
              <h3><a href="#">ABC</a></h3>

              <p>ABC</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="assets/img/about/dummy-image.jpg" alt="Tribute" class="img-fluid">
              </div>
              <h3><a href="#">ABC</a></h3>

              <p>ABC</p>
            </div>
          </div>

        </div>
      </div>

    </section><!-- End Hotels Section -->

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
                <li><i class="bi bi-chevron-right"></i> <a href="Men.html">Men's Fellowship</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="Women.html">Women's Fellowship</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="Youth.html">Youth Fellowship</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="SundaySchool.html">Sunday School</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="Preschool.html">Pre School</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Service Timing</h4>
              <p>Sunday Service at 9:00 am</p>
              <p>Sunday School at 9:30 am</p>
              <p>Communion on all Sundays</p>
              <p>Praise & worship on the 1st & 3rd Sundays of every month</p>


            </div>

            <div class="col-lg-3 col-md-6 footer-contact">
              <h4>Contact Us</h4>
              <p>
                  911, Subroto Mukherji Road,  <br>
                  Jalahalli (west),<br>
                  Bangalore 560015 <br>
                <strong>Phone:</strong> 	080 2839 1099 <br>
                <strong>Email:</strong> csiholycrosschurch@gmail.com<br>
              </p>

              <div class="social-links">

                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>

                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>

            </div>

          </div>
        </div>
      </div>
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