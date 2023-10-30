<?php

include 'asset/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

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
   <h3>Về chúng tôi</h3>
   <p><a href="home.php">Trang chủ</a> <span> / Về chúng tôi</span></p>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about.jpg" alt="">
      </div>

      <div class="content">
         <h3>Coffee & Tea</h3>
         <p>Chọn cà phê, chọn tâm trạng của bạn. <br>
            nhà trong ngõ, ra đời năm 1990.
         </p>
         <a href="menu.php" class="btn">Thực đơn</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="title">team</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/t1.jpg" alt="">
         <h3>Đức Huy</h3>   
      </div>

      <div class="box">
         <img src="images/t2.jpg" alt="">
         <h3>Khánh Huyền</h3> 
      </div>

      <div class="box">
         <img src="images/t3.jpg" alt="">
         <h3>Thảo Hương</h3>
      </div>

   </div>

</section>

<!-- steps section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="title">Đánh giá</h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/pic-1.png" alt="">
            <p>Đồ khi ship đến vẫn còn thơm nóng. Lần đầu đặt thử mà ưng quá trời luôn</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Trấn Thành</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/Khánh.jpg" alt="">
            <p>Ngon, hợp với giá tiền. Đồ ăn nhanh nhưng lại không hề bị ngấy, cảm giác đỡ béo</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Khánh không béo ị</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/Nghĩa.jpg" alt="">
            <p>Không gian quán chill lắm. Cuối tuần nào cũng phải ra ngồi, bận quá thì đặt về vậy ^^</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Minh Nghĩa</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/Kim.jpg" alt="">
            <p>Mới đặt về thử thấy đồ ăn cũng ngon :> lần sau mình sẽ rủ Huỳn ra quán</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Kim 73kg</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-5.png" alt="">
            <p>Quán tủ của tui ^^ Tuần nào cũng phải ủng hộ vài bữa </p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Alicu</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-7.jpg" alt="">
            <p>rất thích cách xử lí đơn của quán, giao hàng cũng nhanh nữa</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Kim Taehyung</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- reviews section ends -->



















<!-- footer section starts  -->
<?php include 'view/footer.php'; ?>
<!-- footer section ends -->=






<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>