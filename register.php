<?php 
  
  require_once ('admin/config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VWEJWZHQ67"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VWEJWZHQ67');
</script>
    <title>Plaxerbd</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/cropped-P-favicon.png" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	  
	  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">এক নজরে রেজিষ্টেশন দেখে নিন।</h5>
                <button style="outline:none;" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <iframe style="border:4px solid #bbb; border-radius:5px;" width="100%" height="315" src="https://www.youtube.com/embed/TPAaKlh5QUA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
	  
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><!--<img src="images/logo-dark.png">-->PL<span class="text-danger">A</span>XER</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link"><span>Home</span></a></li>
            <li class="nav-item"><a href="winner-lists.php" class="nav-link"><span>Winner Lists</span></a></li>
            <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
            <?php 
              
              if(isset($_SESSION['player'])){

                $player_email = $_SESSION['player'];
                $getplayer    = new Players;
                $getplayer->getplayers(['email','=',$player_email]);
                $query        = $getplayer->query;
                $result       = $query->fetch_assoc();

                $name         = $result['f_name'];
            
            ?>
              <div class="dropdown">
                <li class="nav-item">
                  <a style="padding-top:10px;" href="#" class="nav-link text-light" data-toggle="dropdown"><img src="images/585e4bf3cb11b227491c339a.png" width="20px">&nbsp;&nbsp;<span style="font-size:14px;"><?php echo $name; ?></span></a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Your Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
                </li>
              </div>
            <?php }else{ ?>
            
              <li class="nav-item"><a href="login.php" class="nav-link"><span>Login</span></a></li>
              <li class="nav-item"><a href="register.php" class="nav-link"><span>Register</span></a></li>
            <?php } ?>
	        </ul>
	      </div>
	    </div>
	  </nav>

	  <section class="hero-wrap js-fullheight" style="background-image: url('images/garena_free_fire_2020_4k_hd.jpg');" data-section="home">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">FREE F<span style="color:#D4AF37;">I</span>RE TOURNAMENT</h1>
            <p><a href="login.php" class="btn btn-warning py-3 px-4 text-dark">Let's Play</a></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" id="blog-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2 ftco-animate">
          <?php

                if(isset($_POST['submit']) && $_POST['submit'] === 'Register'){

                  $name           = ucwords($_POST['name']);
                  $email          = $_POST['email'];
                  $pass           = $_POST['pass'];
                  $con_pass       = $_POST['con_pass'];
                  $hash_pass      = hash('sha512', $pass);
                  $id             = $_POST['id'];
                  $bkash          = $_POST['bkash'];
                                                    
                  $form_data      = array(

                    array(

                      'field_name'    => 'name',
                      'name'          => 'Player Name',
                      'required'      => true,
                      'min'           => 5,
                      'max'           => 30
                    ),

                    array(

                      'field_name'    => 'email',
                      'name'          => 'Email',
                      'required'      => true,
                      'min'           => 11,
                      'max'           => 30,
                      'unique'        => true,
                      'table'         => 'players',
                      'column'        => 'email'
                    ),

                    array(

                      'field_name'    => 'pass',
                      'name'          => 'Password',
                      'required'      => true,
                      'min'           => 6,
                      'max'           => 50,
                      'matching'      => $pass 
                    ),

                    array(

                      'field_name'    => 'con_pass',
                      'name'          => 'Confirm Password',
                      'required'      => true,
                      'min'           => 6,
                      'max'           => 50,
                      'matching'      => $pass 
                    ),

                    array(

                      'field_name'    => 'id',
                      'name'          => 'Free Fire Id',
                      'required'      => true,
                      'min'           => 5,
                      'max'           => 50
                    ),

                    array(

                      'field_name'    => 'bkash',
                      'name'          => 'Bkash Number',
                      'required'      => true,
                      'min'           => 11,
                      'max'           => 11
                    ),

                  );

                  $validation     = new Validation;
                  $validation->validate($form_data);

                  if($validation->hasErrorPassed){

                  $insert = new Players;

                  if($insert->addplayers($name, $email, $hash_pass, $id, $bkash)){

                    $message[] = "Successfully Add Players";

                    $_SESSION['messages']   = $message;
                    $_SESSION['class_name'] = 'alert-success';

                    require_once ('messages.php');

                    echo "<script>
                     setTimeout(function(){
                        window.location.href = 'login.php';
                     }, 2000);
                    </script>" ;

                  }else{

                    $message[] = "Something is Wrong .. Try again";

                    $_SESSION['messages']   = $message;
                    $_SESSION['class_name'] = 'alert-danger';

                      require_once ('messages.php');
                    }   
                  }
                }
              ?>
            <div class="card">
              <h3 class="card-header">Register</h3>
              
              <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="appointment_email" class="text-black">Phone or Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="appointment_password" class="text-black">Password <span class="text-danger">* (Minimum 6 Characters)</span></label>
                    <input type="password" name="pass" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="appointment_password" class="text-black">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" name="con_pass" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="appointment_password" class="text-black">Free Fire Id code <span class="text-danger">*</span></label>
                    <input type="text" name="id" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="appointment_number" class="text-black">Bkash Number <span class="text-danger">*</span></label>
                    <input type="text" name="bkash" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" value="Register" class="btn btn-primary">
                  </div>
                </form>
              </div>
              <div class="card-footer">
                  <p>You alreday have an register ? please <a href="login.php">Login</a></p>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </section>

    <?php 
              
        $getcontact   = new Settings;
        $getcontact->GetContactSetting(['status','=',1]);
        $query        = $getcontact->query;

        if(mysqli_num_rows($query) >= 1){

            $result       = $query->fetch_assoc();

            $phone         = $result['phone'];        
            $email         = $result['email'];        
            $facebook      = $result['facebook'];        
            $twitter       = $result['twitter'];        
            $ins           = $result['instagram'];        
            $youtube       = $result['youtube']; 
        }       
    ?>
    
    <section class="ftco-section contact-section ftco-no-pb bg-light mt-5" id="contact-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Contact Us</h2>
          </div>
        </div>
        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
            
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
            <div class="align-self-stretch box p-4 text-center">
              <div class="icon d-flex align-items-center justify-content-center">
                <span class="icon-phone2"></span>
              </div>
              <h3 class="mb-4">Contact Number</h3>
              <p><a href=""><?php if(isset($phone)){ echo $phone;} ?></a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
            <div class="align-self-stretch box p-4 text-center">
              <div class="icon d-flex align-items-center justify-content-center">
                <span class="icon-paper-plane"></span>
              </div>
              <h3 class="mb-4">Email Address</h3>
              <p><a href=""><?php if(isset($email)){ echo $email;} ?></a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
            
          </div>
        </div>
        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="https://formspree.io/plaxergaming@gmail.com" class="bg-primary p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" name="Name" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                <input type="email" name="Email" id="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" name="Subject" id="subject" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="Message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
              </div>
              <div class="form-group">
                <button type="submit" value="Send" class="btn btn-darken py-3 px-5">Send Message</button>
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
            <div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>
    
    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget about-text mb-4">
              <h2 class="ftco-heading-2">About <span>Plaxer</span></h2>
              <p style="font-size:14px;">
                  হেই খেলোয়াড়রা ,
তুমি কি কখনও ভেবেছো গেম খেলে আসল পুরষ্কারের টাকা জিততে পারবে !! আমরা জানি তুমি কমপক্ষে একবার হলেও ভেবেছিলে। তাই , আমরা তোমার স্বপ্ন সত্য করতে চলে এসেছি। ফ্রি-ফায়ার, পাবজি , লুডো, দাবা এবং আরও অনেক কিছু খেলো, জেতো এবং সমস্ত অর্থ তোমার। আজই আমাদের সাথে যোগ দাও, গেম খেলো এবং আসল টাকা জিতে নাও আর তাত্ক্ষণিক উত্তোলন করে নাও। আপাতত কোনও যাচাইকরণের প্রয়োজন নেই। এখন গেমিং কেবল সময় পার করার জন্যে নয়। বিনোদন নাও এবং আসল অর্থ জেতো। আর তোমার গেমিং ক্যারিয়ার তৈরি করো। তুমি কি চ্যালেঞ্জ গ্রহণ করছো ?</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.php"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="winner-lists.php"><span class="icon-long-arrow-right mr-2"></span>Winner Lists</a></li>
                <li><a href="#contact-section"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                <li><a href="login.php"><span class="icon-long-arrow-right mr-2"></span>Login</a></li>
                <li><a href="register.php"><span class="icon-long-arrow-right mr-2"></span>Register</a></li>
                <li><a href="privacy-policy.php"><span class="icon-long-arrow-right mr-2"></span>Privacy Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-0">
                <ul>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text"> +8801715177188</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">plaxergaming@gmail.com</span></a></li>
                </ul>
              </div>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-4">
                <li class="ftco-animate"><a href="<?php if(isset($twitter)){ echo $twitter;} ?>"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="<?php if(isset($facebook)){ echo $facebook;} ?>"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="<?php if(isset($ins)){ echo $ins;} ?>"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="<?php if(isset($youtube)){ echo $youtube;} ?>"><span class="icon-youtube"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap4.min.js"></script>
  <script src="js/datatables-demo.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html>