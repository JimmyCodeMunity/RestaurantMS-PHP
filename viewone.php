<?php
@include('includes/userheade.php');
@include 'config.php';

error_reporting(0);


if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from orders where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $fname=$row['foodname'];
    $fprice = $row['price'];
    
  }else{
    header('serv.php');
    die();
  }
}
if(isset($_GET['customername']) && $_GET['customername']!=''){
  $image_required='';
  $cust=$_GET['customername'];
  $res=mysqli_query($conn,"select * from orders where customername='$cust'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $fname=$row['foodname'];
    $fprice = $row['price'];
    
  }else{
    header('serv.php');
    die();
  }
}
$user = $_SESSION['user_name'];
$query = "SELECT * FROM orders WHERE customername = '$user'";
$query_run = mysqli_query($conn,$query);

$qty= 0;
while ($num = mysqli_fetch_assoc ($query_run)) {
    $qty += $num['price'];
}






if(isset($_POST['submit'])){

   
   $tprice = $_POST['total'];
   


   $select = " SELECT * FROM orders";

   $result = mysqli_query($conn, $select);

   if(!$result){

      $error[] = 'Booking failed!';
      
     

   }else{
   $update_data = "UPDATE orders SET paid='$tprice',paid_status = 1 WHERE id='$id' ";
  mysqli_query($conn,$update_data);
  if(!$update_data){
    $error[] = '<div class="alert alert-danger" role="alert">
  error saving data
</div>';

  }
  else{
    header('location:myorders.php');

  }
}

};


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="navbar-top-fixed.css" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
  <div class="card">
  <div class="card-body mx-4">
    <div class="container">
      <p class="my-5 mx-5" style="font-size: 30px;">Thank for your purchase</p>
      <div class="row">
        <ul class="list-unstyled">
          <li class="text-black"><?php echo $_SESSION['user_name'] ?></li>
          <li class="text-muted mt-1"><span class="text-black">Invoice</span> #12345</li>
          <li class="text-black mt-1"><?=date('Y-m-d')." ".$row['phone']; ?></li>
        </ul>
        <hr>
        <div class="col-xl-10">
          <p><?php echo $row['foodname']?></p>
          <p>Amount:<?php echo $row['amount']?></p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">$<?php echo $row['price']?>
          </p>
        </div>
        <hr>
      </div>
      
        <hr style="border: 2px solid black;">
      </div>
      <div class="row text-black">

        <div class="col-xl-12">
          <p class="float-end fw-bold">Total: $<?php echo $row['price']*$row['amount'] ?>
          </p>
        </div>
        <hr style="border: 2px solid black;">
        <button class="btn btn-primary btn-pill" onclick="print()">Print</button>
        <a href="myorders.php">Back</a>
      </div>
      

    </div>
  </div>
</div>
</div>
</body>
<style type="text/css">
  body{
    background: url(images/mac.jpg);
    background-position: center;
    background-repeat: none;
    background-size: cover;
  }
  .card{
    margin: 120px;
  }
  .modal{
    margin-top: 70px;
  }
</style>
</html>