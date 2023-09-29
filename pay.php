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
    
    header('location:receipt.php');

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
    <script type="text/javascript">
      function showMpesa(){
        document.getElementById("mpesa").style.display="flex";
        document.getElementById("paypal").style.display = "none";
        document.getElementById("complete").innerHTML="pay with Mpesa";
        

      }
      function showPaypal(){
        document.getElementById("paypal").style.display="flex";
        document.getElementById("mpesa").style.display="none";
        document.getElementById("complete").innerHTML="pay with card";
      }
    </script>
</head>
<body>
	
<section class="p-4 p-md-5" style="
    background-image: url(https://mdbcdn.b-cdn.net/img/Photos/Others/background3.webp);margin-top: 80px;
  ">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-5">
      <div class="card rounded-3">
        <div class="card-body p-4">
          <div class="text-center mb-4">
            
            <h6>Payment</h6>
          </div>
          <form action="" method="post">
            <p class="fw-bold mb-4 pb-2">Choose Payment Method:</p>
            <div class="text-center">
              <a class="btn btn-primary btn-lg" onclick="showMpesa()"><img src="mpesa.png" style="width:40px;height: 20px;"> Mpesa</a>
              <a class="btn btn-primary btn-lg" style="background-color:yellowgreen;border: none;" onclick="showPaypal()"><img src="visa.png" style="width:40px;height: 20px;"> Card</a>
              <br>
              <br>
            </div>
            <div class="" id="paypal" style="display: none;">

            <div class="d-flex flex-row align-items-center mb-4 pb-1">
              <img class="img-fluid" src="visa.png" style="width:40px;height: 20px;" />
              <div class="flex-fill mx-3">
                <div class="form-outline">

                  <input type="text" id="formControlLgXc" class="form-control form-control-lg"
                    value="**** **** **** 3193" />
                  <label class="form-label" for="formControlLgXc">Card Number</label>
                </div>
              </div>
              
            </div>
          </div>
          <div class="" id="mpesa" style="display: none;">
          

            <div class="d-flex flex-row align-items-center mb-4 pb-1">
              <img class="img-fluid" src="mpesa.png" style="width:70px;height: 40px;" />
              <div class="flex-fill mx-3" id="mpesa">
                <div class="form-outline">
                  <input type="text" id="formControlLgXs" class="form-control form-control-lg"
                    value="<?php echo $row['phone']?>" />
                  <label class="form-label" for="formControlLgXs">Phone Number</label>
                </div>
              </div>
              
            </div>
          </div>

            <p class="fw-bold mb-4">Add new card:</p>

            <div class="form-outline mb-4">
              <input type="text" id="formControlLgXsd" class="form-control form-control-lg"
                value="<?php echo $_SESSION['user_name']?>" />
              <label class="form-label" for="formControlLgXsd">Cardholder's Name</label>
            </div>

            <div class="row mb-4">
              <div class="col-7">
                <div class="form-outline">
                  <input type="text" name="total" value="<?php echo $row['price']*$row['amount'] ?>" class="form-control rounded-3" id="floatingInput" required placeholder="" readonly>
                  <label class="form-label" for="formControlLgXM">Total Price</label>
                </div>
              </div>
              <div class="col-4">
                <div class="form-outline">
                  <input type="text" name="" value="<?php echo $row['foodname'] ?>" class="form-control rounded-3" id="floatingInput" required placeholder="" readonly>
                  <label class="form-label" for="formControlLgExpk">Food</label>
                </div>
              </div>
            

            <button class="btn btn-success btn-lg btn-block" type="submit" name="submit" id="complete">Complete Payment</button>
            <br>
            <a href="myorders.php" class="btn btn-danger btn-lg" style="margin-top:20px;">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


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