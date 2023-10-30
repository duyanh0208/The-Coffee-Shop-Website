<?php

include 'asset/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'control/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thực đơn</title>

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
      <h3>Thực đơn</h3>
      <p><a href="home.php">Trang chủ</a> <span> / Thực đơn</span></p>
   </div>

   <!-- menu section starts  -->

   <section class="products">

      <h1 class="title">Mới nhất</h1>
      <div class="filt">
         <p style="font-weight: bolder;"> Chọn loại sắp xếp
         </p>
         <form method="GET">
            <select class="form-sort" id="sort-by-price" name="sort-by-price" style="width:200px">
               <option value="">Giá</option>
               <option value="price-asc">Tăng dần</option>
               <option value="price-desc">Giảm dần</option>
               <script>
                  const sortSelect = document.getElementById('sort-by-price');
                  sortSelect.addEventListener('change', function() {
                     this.form.submit();
                  });
               </script>
            </select>


            <!-- <label for="sort-by-price"></label>
            <select id="sort-by-price" name="sort-by-price">
               <option value="">Chọn loại sắp xếp theo giá</option>
               <option value="price-desc">Từ cao đến thấp</option>
               <option value="price-asc">Từ thấp đến cao</option>
            </select> -->
            <!-- <button type="submit">Lọc</button> -->
         </form>

         <form method="GET">
            <label for="sort-by-name"></label>
            <select class="form-sort" id="sort-by-name" name="sort-by-name">
               <option value="">Tên</option>
               <option value="name-asc">A-Z</option>
               <option value="name-desc">Z-A</option>
               <script>
                  const nameSelect = document.getElementById('sort-by-name');
                  nameSelect.addEventListener('change', function() {
                     this.form.submit();
                  });
               </script>
            </select>
         </form>
      </div>
      <div class="box-container">
         </form>
         <?php
         // $category = isset($_GET['category']) ? $_GET['category'] : '';
         $sort_by_price = isset($_GET['sort-by-price']) ? $_GET['sort-by-price'] : '';
         $sort_by_name = isset($_GET['sort-by-name']) ? $_GET['sort-by-name'] : '';

         if ($sort_by_name === 'name-asc') {
            $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY name ASC");
         } elseif ($sort_by_name === 'name-desc') {
            $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY name DESC");
         } elseif ($sort_by_price === 'price-desc') {
            $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY price DESC");
         } else {
            $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY price ASC");
         }

         $select_products->execute();

         if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                  <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                  <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                  <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                  <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                  <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                  <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                  <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
                  <div class="name"><?= $fetch_products['name']; ?></div>
                  <div class="flex">
                     <div class="price"><?= $fetch_products['price']; ?></div>
                     <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2"">
         </div>
      </form>
      <?php
            }
         } else {
            echo '<p class="empty">Không có sản phẩm!</p>';
         }
      ?>

   </div>

</section>


<!-- menu section ends -->
























<!-- footer section starts  -->
<?php include 'view/footer.php'; ?>
<!-- footer section ends -->








<!-- custom js file link  -->
<script src=" js/script.js"></script>

</body>

</html>