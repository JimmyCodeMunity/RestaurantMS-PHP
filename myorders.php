<?php
@include('includes/userheader.php');
@include('config.php');

if(isset($_GET['type']) && $_GET['type']!=''){
  $type=$_GET['type'];
  if($type=='paid_status'){
    $operation=$_GET['operation'];
    $id=$_GET['id'];
    if($operation=='active'){
      $status='1';
    }else{
      $status='0';
    }
    $update_status_sql="update orders set paid_status='$status' where id='$id'";
    mysqli_query($conn,$update_status_sql);
  }
  
  if($type=='delete'){
    $id=$_GET['id'];

    $delete_sql="delete from orders where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}

$sql="SELECT * FROM orders WHERE customername = '{$_SESSION['user_name']}'";
$res=mysqli_query($conn,$sql);

$user = $_SESSION['user_name'];
$query = "SELECT * FROM orders WHERE customername = '$user' && paid_status = 0";
$query_run = mysqli_query($conn,$query);

$qty= 0;
while ($num = mysqli_fetch_assoc ($query_run)) {
    $qty += $num['price']*$num['amount'];
}

$total = $qty;


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My Order</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  

 

  <main id="main" class="main">

   
          

          

          

          

          

          

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">My Orders</h5>
              
              <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent adds <span>| Today</span></h5>
                  
                  <br>


                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        
                        <th scope="col">Category</th>
                        <th>foodname</th>
                        
                        <th>Price</th>
                        
                        <th>Amount</th>
                        
                        <th scope="col">Total</th>
                        <th>Paid</th>
                      </tr>
                    </thead>
                    <?php
              $i=1;
              while($row=mysqli_fetch_assoc($res)){?>

                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><?php echo $i++?></a></th>
                        
                        <td><?php echo $row['category']?></td>
                        
                        <td><?php echo $row['foodname']?></td>
                        <td><?php echo $row['price']?></td>
                        <td><?php echo $row['amount']?></td>
                        <td><?php echo $row['price']*$row['amount']?></td>
                        <td><?php echo $row['paid']?></td>
                        <td>
                   <?php
                if($row['paid_status']!=0){
                  echo "<a class='badge bg-success' href='?type=status&operation=deactive&id=".$row['id']."'>paid</a>&nbsp;";
                  echo "<td><a class='btn btn-sm btn-primary' href='viewone.php?id=".$row['id']."'>View Receipt</a>&nbsp;</td>";
                }else{
                  echo "<a class='badge bg-warning' href='?type=status&operation=active&id=".$row['id']."'>not paid</a>&nbsp;";
                  echo "<td><a class='btn btn-sm btn-primary' href='pay.php?id=".$row['id']."'>Pay</a>&nbsp;</td>";

                  echo "<td><a class='btn btn-sm btn-danger' href='?type=delete&id=".$row['id']."'>Cancel</a></td>";
              
                }
                ?>
              </td>
              <td>
              
                <?php
                
                
                
                
                ?>
                 </td>  
                        <?php } ?>
                      
                      
                      </tr>
                    </tbody>
                  </table>
                  <th><strong style="color:red;">Total Unpaid: <?php echo $total?></strong></th>
                  <br>
                  <a href="menu.php" class="btn btn-warning btn-lg">Continue Shopping</a>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
<style type="text/css">
  .card{
    margin-top: 50px;
  }
</style>

</html>