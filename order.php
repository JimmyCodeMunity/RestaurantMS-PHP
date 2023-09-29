<?php
@include('includes/userheader.php');
@include 'config.php';

error_reporting(0);

if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from menu where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $fname=$row['foodname'];
    $fprice = $row['foodprice'];
    
  }else{
    header('serv.php');
    die();
  }
}




if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $phone = $_POST['phone'];
   $category = $_POST['category'];
   $foodname = $_POST['fdname'];
   $price = $_POST['foodprice'];
   $amount = $_POST['plates'];


   $select = " SELECT * FROM orders";

   $result = mysqli_query($conn, $select);

   if(!$result){

      $error[] = 'Booking failed!';
      
     

   }else{
    $insert = "INSERT INTO orders(customername,phone,category,foodname,price,amount) VALUES('$name','$phone','$category','$foodname','$price','$amount')";
         mysqli_query($conn, $insert);
         header('location:myorders.php');
    
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
        <a href="menu.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
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
            <input type="text" name="name" value="<?php echo $_SESSION['user_name']?>" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput">Username</label>
          </div>
          
          
          <div class="form-floating mb-3">
            <input type="number" value="<?php echo $_SESSION['phone']?>" name="phone" class="form-control rounded-3" id="floatingInput" required placeholder="name@example.com">
            <label for="floatingInput">Phone</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="category" value="<?php echo $row['category']?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact">
            
            <label for="floatingInput">Category</label>
          </div>

          
          <div class="form-floating mb-3">
            <input type="text" name="fdname" value="<?php echo $fname?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact">
            
            <label for="floatingInput">Food Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="foodprice" value="<?php echo $fprice ?>" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput">Price</label>
          </div>
          <div class="form-floating mb-3">
            <input type="int" name="plates" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput"> Amount</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" name="submit" type="submit">Place Order</button>

          
          
          
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
</style>
</html>