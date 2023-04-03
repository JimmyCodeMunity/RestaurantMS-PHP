<?php
@include('includes/userheader.php');
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
$query = "SELECT * FROM orders WHERE customername = '$user' && paid_status = 0";
$query_run = mysqli_query($conn,$query);

$qty= 0;
while ($num = mysqli_fetch_assoc ($query_run)) {
    $qty += $num['price']*$num['amount'];
}
$amt = $row['amount'];
$total = $qty;





if(isset($_POST['submit'])){

   
   $tprice = $_POST['total'];
   


   $select = " SELECT * FROM orders";

   $result = mysqli_query($conn, $select);

   if(!$result){

      $error[] = 'Booking failed!';
      
     

   }else{
   $update_data = "UPDATE orders SET paid='$tprice',paid_status = 1 WHERE customername='$cust' && paid_status = 0 ";
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
	<div class="modal modal-signin position-static d-block bg-white-+ py-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Complete Order</h2>
        <a href="myorders.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="" action="" method="post">
          <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <br>
          
          <div class="form-floating mb-3">
            <input type="text" name="total" value="<?php echo $total ?>" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput">Total Price</label>
          </div>
          
          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" name="submit" type="submit">Complete</button>
          
          
          
        </form>
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
  .modal{
    margin-top: 70px;
  }
</style>
</html>