<?php
@include('config.php');
session_start();
error_reporting(1);

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $bdate = $_POST['date'];
  $time = $_POST['time'];
  $nop = $_POST['people'];
  $details = $_POST['message'];

  $select = "SELECT * FROM booktable";
  $result = mysqli_query($conn,$select);

  $insert = "INSERT INTO booktable(name,email,phone,bookdate,booktime,peoplenum,details)VALUES('$name','$email','$phone','$bdate','$time','$nop','$details')";
  mysqli_query($conn,$insert);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Urban Eatery</title>
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
  <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+254 726 042 579</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 11:00 AM - 23:00 PM</span></i>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.html">Urban Eatery</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="userpage.php">Home</a></li>
          <li><a class="nav-link scrollto" href="menu.php">Menu</a></li>
          <li><a class="nav-link scrollto" href="search.php">Search</a></li>
          <li><a class="nav-link scrollto" href="myorders.php">My Orders</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>        
          
          
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome <span><?php echo $_SESSION['user_name']?></span></h2>
                <p class="animate__animated animate__fadeInUp">Welcome to Urban Eatery We are a [type of cuisine] restaurant committed to serving you the freshest and most flavorful dishes in town. Our chefs are passionate about creating unique and delicious recipes that are sure to delight your taste buds.</p>
                <div>
                  <a href="menu.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Urban Eatery</h2>
                <p class="animate__animated animate__fadeInUp">At Urban Eatery we believe in using only the highest quality ingredients in our dishes. That's why we source our produce, meats, and other ingredients from local farms and vendors whenever possible. We also believe in cooking everything from scratch, so you can be sure that your meal is made with care and attention to detail.</p>
                <div>
                  <a href="menu.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Urban Eatery</h2>
                <p class="animate__animated animate__fadeInUp">Whether you're joining us for a romantic dinner for two or a group celebration, we strive to provide a warm and welcoming atmosphere that will make you feel right at home. Our friendly staff is always happy to help you navigate our menu and find the perfect dish to suit your preferences.</p>
                <div>
                  <a href="menu.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    

    <!-- ======= Whu Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Why choose <span>Our Restaurant</span></h2>
          <p>here are a few reasons why you should choose Urban Eatery</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>01</span>
              <h4>Fresh Ingredients</h4>
              <p> We use only the freshest ingredients in our dishes, sourced from local farms and vendors whenever possible.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>02</span>
              <h4>Unique Flavors</h4>
              <p> Our chefs are passionate about creating unique and delicious recipes that will tantalize your taste buds and leave you wanting more.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>03</span>
              <h4> Exceptional Services</h4>
              <p>Our friendly and knowledgeable staff is always available to assist you and ensure that your dining experience is exceptional</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Whu Us Section -->

    

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container">

        <div class="section-title">
          <h2>Check our <span>Specials</span></h2>
          <p>A popular trend in special menus is to offer vegetarian or vegan options, as more people are adopting plant-based diets</p>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Tortilla</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Fruit Salad</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Muthokoi</a>
              </li>
              
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Tortilla</h3>
                    <p class="fst-italic"></p>
                    <p>Tortilla de patatas is a classic Spanish dish that has been enjoyed for generations. It is a delicious and comforting dish that can be customized with additional ingredients such as cheese, ham, or peppers. It is also a great dish for using up leftover ingredients and is a popular choice for picnics and gatherings due to its versatility and ease of transport.
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fruit Salad</h3>
                    
                    <p>Fruit salad is a popular dish made from a combination of fresh fruit that is typically cut into bite-sized pieces and mixed together in a bowl or container. Fruit salad is a nutritious and delicious way to enjoy a variety of fruits, especially during the warmer months when many fruits are in season.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Muthokoi</h3>
                    <p class="fst-italic">Muthokoi is a popular dish in Kenya, especially among the Kamba ethnic group who traditionally farm maize, one of the key ingredients in this dish. Muthokoi is a hearty and nutritious dish made from boiled and mashed maize kernels, also known as corn kernels, mixed with beans and flavored with various spices and herbs.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-4.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container">

        <div class="section-title">
          <h2>Organize Your <span>Events</span> in our Restaurant</h2>
        </div>

        <div class="events-slider swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/event-birthday.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Birthday Parties</h3>
                  <div class="price">
                    <p><span>$189</span></p>
                  </div>
                  <p class="fst-italic">
                    Looking to throw a memorable and fun birthday party? Look no further than our restaurant! We're thrilled to offer the perfect venue for your next celebration, complete with delicious food, refreshing drinks, and a festive atmosphere that will make your special day unforgettable.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circle"></i>Our restaurant boasts a welcoming and lively atmosphere, perfect for hosting birthday parties of all sizes.</li>
                    <li><i class="bi bi-check-circle"></i> Our talented chefs have created a variety of birthday party menus that are sure to impress your guests</li>
                    
                  </ul>
                  <p>
                   Welcome All.
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/event-private.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Private Parties</h3>
                  <div class="price">
                    <p><span>$290</span></p>
                  </div>
                  <p class="fst-italic">
                    Looking for the perfect venue for your next private party? Our restaurant offers the perfect combination of delectable cuisine, exceptional service, and an elegant ambiance, making us the ideal location for your next special event.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circle"></i> Our talented chefs have crafted a diverse range of menus, featuring mouth-watering dishes made with the freshest and finest ingredients.</li>
                    <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circle"></i> Our dedicated team of event planners will ensure that every detail is perfect, from the table settings to the lighting and décor.</li>
                  </ul>
                  
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/event-custom.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Custom Parties</h3>
                  <div class="price">
                    <p><span>$99</span></p>
                  </div>
                  <p class="fst-italic">
                    Looking for a unique and unforgettable party experience? Our restaurant offers custom party packages tailored to your specific needs and preferences, ensuring that your special event is one-of-a-kind.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circle"></i> we offer a full bar with an extensive selection of beer, wine, and specialty cocktails..</li>
                    <li><i class="bi bi-check-circle"></i> we believe that every celebration should be tailored to your unique vision, and we are committed to creating an unforgettable experience for you and your guests.</li>
                    
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container">

        <div class="section-title">
          <h2>Book a <span>Table</span></h2>
          <p>Booking a table at our restaurant is easy and convenient.</p>
        </div>

        <form action="" role="form" class="php-email" method="POST">
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $_SESSION['user_name']?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $_SESSION['user_email']?>" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" value="<?php echo $_SESSION['phone']?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="date" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="time" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
            
          </div>
         
          <div class="text-center"><button class="btn btn-success btn-lg" type="submit" name="submit">Send Message</button></div>
        </form>

      </div>
    </section><!-- End Book A Table Section -->

   

    

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><span>Contact</span> Us</h2>
          <p>If you have any questions, comments, or concerns, please feel free to reach out to us using the information below.</p>
        </div>
      </div>

      <div class="map">
        
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.080770251708!2d37.01200871430443!3d-1.1017004357623132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f463c138084df%3A0xff48528702d95cd5!2sJKUAT%20Main%20Gate%2C%20Gachororo%20road%2C%20Juja!5e0!3m2!1sen!2ske!4v1679827407803!5m2!1sen!2ske"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="container mt-5">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-3 col-md-6 info">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Juja<br>Nairobi, KE</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-clock"></i>
              <h4>Open Hours:</h4>
              <p>Monday-Saturday:<br>11:00 AM - 2300 PM</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>urbaneatery@info.com<br>contact@ueatery.com</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+1 5589 55488 51<br>+1 5589 22475 14</p>
            </div>
          </div>
        </div>

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $_SESSION['user_name']?>" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $_SESSION['user_email']?>" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button name="submit" type="submit">Send Message</button></div>
        </form>

      </div>
    </section><!-- End Contact Section -->

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
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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

</html>