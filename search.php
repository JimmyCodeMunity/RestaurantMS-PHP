<?php
@include('config.php');
@include('includes/menuheader.php');
error_reporting(0);
//$logid = $row['fundi_id'];
$collect = "SELECT * FROM menu";
$result = mysqli_query($conn,$collect);
  $row = mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DisplayFundi</title>
	<link href="assets/img/fav.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script type="text/javascript">
  	function hideSearch(){
  		document.getElementById('cards').style.display='none';

  		
  	}
  	function showRes(){
  		document.getElementById('cards').style.display='flex';

  	}
  </script>
</head>
<body class="finderbody text-center" style="margin-top:80px;">
  <br>
  <form class="form-a" action="" method="GET">
	<div class="s-bar">
	<input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="search here" onclick="hideSearch()">
	<button class="btn btn-search btn-primary" type="submit">search</button>
</div>
</form>
<br>



  <div class="container">
    <h1>Results</h1>

    <div class="row pt-5 text-center" id="cards">

<?php
            if(isset($_GET['search'])){
              $filtervalues = $_GET['search'];
              $query = "SELECT * FROM menu WHERE CONCAT(id,foodname,foodprice,category) LIKE '%$filtervalues%' ";
              $query_run = mysqli_query($conn,$query);

              if(mysqli_num_rows($query_run) > 0)
              {
                foreach($query_run as $items)
                {
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
              else
              {
                ?>
                <div class="alert alert-danger" role="alert">No records found</div>
                <br>
                <br>
                <a href="fundidisplay.php" class="btn btn-success btn-lg"> Back to View All</a>

                <?php
              }
            }

            ?>
</div>
  
</body>

<style type="text/css">
  .s-bar{
    margin-top: 80px;
    height: 20px;
    position: relative;
  }
  .s-bar input{
  	border-radius: 30px;
  	width: 40%;
  	background-color: white;
  	color: black;
  	border: 1px solid #0d6efd;
  	align-items: center;
  	height: 30px;
  	padding-left:30px ;
  	margin: 0;
  	outline: none;
  }
  .btn-search{
  	margin-left: -30px;
  	position: absolute;
  	outline: none;
  	font-size: 15px;
  	border: 0;
  	height: 30px;
  	border-top-right-radius: 80px 80px;
  	border-bottom-right-radius: 80px 80px;
  }
  .cname{
    color: red;
  }
  .footer-top{
    margin-top: 87px;
    width: 100%;
  }
.card{
    max-height: 400px;
    width: 200px;
    border: 1px solid #f9f9f9;
    box-shadow: 6px 8px 12px lightgrey;
    margin-bottom: 20px;
    background-color: #f5f5f5;
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
  span{
    color: #0d6efd;
  }
  body{
  	margin-left: 120px;
  	margin-right: 120px;
  }
</style>
</html>