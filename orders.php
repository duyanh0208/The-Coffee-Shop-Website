<?php

include 'asset/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đơn hàng</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'view/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>Đơn hàng</h3>
   <p><a href="home.php">Trang chủ</a> <span> / Đơn hàng</span></p>
</div>

<section class="orders">

   <h1 class="title">Đơn hàng của bạn</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">Đăng nhập để xem các đơn hàng</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Thời gian đặt hàng : <span><?= $fetch_orders['placed_on']; ?></span></p>
      <p>Tên: <span><?= $fetch_orders['name']; ?></span></p>
      <p>Email : <span><?= $fetch_orders['email']; ?></span></p>
      <p>Số điện thoại : <span><?= $fetch_orders['number']; ?></span></p>
      <p>Địa chỉ : <span><?= $fetch_orders['address']; ?></span></p>
      <p>Phương thức thanh toán : <span><?= $fetch_orders['method']; ?></span></p>
      <p>Đơn hàng của bạn : <span><?= $fetch_orders['total_products']; ?></span></p>
      <p>Thanh toán : <span><?= $fetch_orders['total_price']; ?></span></p>
      <p>Trạng thái đơn hàng : <span style="color:<?php if($fetch_orders['payment_status'] == 'chờ xác nhận'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">Không có đơn đặt hàng!</p>';
      }
      }
   ?>

   </div>

</section>










<!-- footer section starts  -->
<?php include 'view/footer.php'; ?>
<!-- footer section ends -->






<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>