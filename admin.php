<?php
@include('config.php');
@include('logheader.php');
session_start();

error_reporting(1);

if(isset($_POST['admin_submit'])){
  $email = mysqli_escape_string($conn,$_POST['email']);
  $pass = md5($_POST['password']);

  
  $select = "SELECT * FROM admin WHERE email='$email' && password = '$pass'";
  $res = mysqli_query($conn,$select);

  if(mysqli_num_rows($res)>0){
    $row = mysqli_fetch_array($res);
    if($res){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         
         header('location:admindash/dashboard/index.php');


      }
      else{
        $error[] = 'check email or password';
        
         
  }
}
else{
  $error[] = 'Check email or password';
}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Urban Eatery|Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Urban Eatery - v4.10.0
  * Template URL: https://bootstrapmade.com/Urban Eatery-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center fixed-top topbar-black">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+254 726 042 579</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 11:00 AM - 23:00 PM</span></i>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-dark">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.html">Urban Eatery</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
          
          
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
 
  	<body>
  

  <main>
   


      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4"> <a
              href="index.html" class="logo d-flex align-items-center
              w-auto">
              
               </a> </div><!-- End
              Logo -->

              <div class="card mb-3">

                <div class="card-body">


                  <div class="pt-4 pb-2">

                    <div class="card-title text-center pb-0 fs-4">
                      <h3>Admin Login</h3>

                     
                    <p class="text-center small">Enter email & password</p>
                  </div>

                  
                  <form class="" action="" method="post">
          <div>
            <center>
          <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="alert alert-danger" style="width: 100%;">'.$error.'</span>';
         };
      };
      ?>
    </center>
    </div>
      <br>
          
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control rounded-3" id="floatingInput" required placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control rounded-3" id="floatingInput" required placeholder="enter password">
            <label for="floatingInput">Password</label>
          </div>
          
          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" name="admin_submit" type="submit">Sign In</button>
          
        </form>

                </div>
              </div>

              

            </div>
          </div>
        </div>

      </section>

    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Urban Eatery</h3>
      <p>Bring us your appetite</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Urban Eatery</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/Urban Eatery-free-restaurant-bootstrap-theme/ -->
        Designed by CodeMunity</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
<style type="text/css">
	.card{
		margin-top: 20px;
	}
	.btn{
		background-color: #ffb03b;
		border: none;
	}
  .container{
    margin-top: 23px;
  }
</style>

</html>