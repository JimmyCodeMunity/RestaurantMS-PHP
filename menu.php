<?php
@include('config.php');
session_start();
error_reporting(1);
@include 'includes/menuheader.php';

//collect food from menu table
$collect = "SELECT * FROM menu WHERE status = 1";
$result = mysqli_query($conn,$collect);
  $row = mysqli_fetch_array($result);

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

<body class="">
  <div class="container">
    <h1>Supper</h1>

    <div class="row pt-5 text-center" id="cards">

<?php
        
        $query_command = "SELECT * FROM menu WHERE category = 'Supper'";

      $query_res = $conn->query($query_command);
          if ($query_res->num_rows > 0){  
            $a=0;          
              while($row = $query_res->fetch_assoc()){
            $a++;
            
            ?>


  <div class="card">
    
    
      <div class="card-image">
        <img src="admindash/dashboard/images/<?=$row['food_photo']; ?>" alt="dp" class="img-a img-fluid" style="" width='100px' height='100px'>
      </div>
      <div class="namer card-title"><?php echo $row['foodname'];?></div>
      <div><strong> <?php echo $row['foodprice']?></strong></div>
      
    
    <div class="divider">
      <?php echo "<a class='btn btn-small btn-primary' href='order.php?id=".$row['id']."'>Order</a>&nbsp;";?>
    </div>
  </div>
  
  <?php
        }
      }

        ?>
</div>
<h1>Dinner</h1>

    <div class="row pt-5 text-center" id="cards">

<?php
        
        $query_command = "SELECT * FROM menu WHERE category = 'Dinner'";

      $query_res = $conn->query($query_command);
          if ($query_res->num_rows > 0){  
            $a=0;          
              while($row = $query_res->fetch_assoc()){
            $a++;
            
            ?>


  <div class="card">
    
    
      <div class="card-image">
        <img src="admindash/dashboard/images/<?=$row['food_photo']; ?>" alt="dp" class="img-a img-fluid" style="" width='100px' height='100px'>
      </div>
      <div class="namer card-title"><?php echo $row['foodname'];?></div>
      <div><strong> <?php echo $row['foodprice']?></strong></div>
      
    
    <div class="divider">
      <?php echo "<a class='btn btn-small btn-primary' href='order.php?id=".$row['id']."'>Order</a>&nbsp;";?>
    </div>
  </div>
  
  <?php
        }
      }

        ?>
</div>
<h1>Breakfast</h1>

    <div class="row pt-5 text-center" id="cards">

<?php
        
        $query_command = "SELECT * FROM menu WHERE category = 'BreakFast'";

      $query_res = $conn->query($query_command);
          if ($query_res->num_rows > 0){  
            $a=0;          
              while($row = $query_res->fetch_assoc()){
            $a++;
            
            ?>


  <div class="card">
    
    
      <div class="card-image">
        <img src="admindash/dashboard/images/<?=$row['food_photo']; ?>" alt="dp" class="img-a img-fluid" style="" width='100px' height='100px'>
      </div>
      <div class="namer card-title"><?php echo $row['foodname'];?></div>
      <div><strong> <?php echo $row['foodprice']?></strong></div>
      
    
    <div class="divider">
      <?php echo "<a class='btn btn-small btn-primary' href='order.php?id=".$row['id']."'>Order</a>&nbsp;";?>
    </div>
  </div>
  
  <?php
        }
      }

        ?>
</div>
  </div>

 

</body>
<style type="text/css">
  .container h1{
    margin-top: 120px;
  }
  .card{
    max-height: 400px;
    width: 200px;
    border: 1px solid #f9f9f9;
    box-shadow: 6px 8px 12px lightgrey;
    margin-bottom: 20px;
    background-color: #fff;
    padding: 15px;
    color: black;
    font-family: sans-serif;

  }
  .card img{
    border-radius: 6px;
    width: 100%;
    height: 100%;
  }
  .card-image{
    height: 150px;
  }
  .row{
    justify-content: space-evenly;

  }
  .btn{
    background-color: #ffb03b;
    border: none;
  }
</style>

</html>