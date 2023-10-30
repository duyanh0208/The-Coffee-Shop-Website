<?php

include '../asset/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['update_payment'])){

   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $update_status = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_status->execute([$payment_status, $order_id]);
   $message[] = 'cập nhật trạng thái thành công!';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quản lý đơn hàng</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../view/admin_header.php' ?>

<!-- placed orders section starts  -->

<section class="placed-orders">

   <h1 class="heading">quản lý đơn hàng</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> id người dùng : <span><?= $fetch_orders['user_id']; ?></span> </p>
      <p> thời gian đặt hàng : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> tên : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> email : <span><?= $fetch_orders['email']; ?></span> </p>
      <p> số điện thoại : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> địa chỉ : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> tổng sản phẩm : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> tổng thanh toán : <span><?= $fetch_orders['total_price']; ?></span> </p>
      <p> phương thức thanh toán : <span><?= $fetch_orders['method']; ?></span> </p>
      <form action="" method="POST">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         <select name="payment_status" class="drop-down">
            <option value="" selected disabled><?= $fetch_orders['payment_status']; ?></option>
            <option value="chờ xác nhận">chờ xác nhận</option> 
            <option value="đang xử lý">đang xử lý</option>
            <option value="đã hoàn thành">đã hoàn thành</option>
         </select>
         <div class="flex-btn">
            <input type="submit" value="update" class="btn" name="update_payment">
            <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('xoá đơn đặt hàng này?');">xoá</a>
         </div>
      </form>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">Chưa có đơn đặt hàng nào!</p>';
   }
   ?>

   </div>

</section>

<!-- placed orders section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>