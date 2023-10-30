<?php

include 'asset/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address = $_POST['flat'] .', '.$_POST['building'].', '.$_POST['area'].', '.$_POST['town'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'address saved!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cập nhật địa chỉ</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include '../view/user_header.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Địa chỉ của bạn</h3>
      <input type="text" class="box" placeholder="phòng" required maxlength="50" name="flat">
      <input type="text" class="box" placeholder="số nhà" required maxlength="50" name="building">
      <input type="text" class="box" placeholder="khu" required maxlength="50" name="area">
      <input type="text" class="box" placeholder="phường" required maxlength="50" name="town">
      <input type="text" class="box" placeholder="quận" required maxlength="50" name="city">
      <input type="text" class="box" placeholder="thành phố" required maxlength="50" name="state">
      <!-- <input type="text" class="box" placeholder="country name" required maxlength="50" name="country"> -->
      <!-- <input type="number" class="box" placeholder="pin code" required max="999999" min="0" maxlength="6" name="pin_code"> -->
      <input type="submit" value="lưu địa chỉ" name="submit" class="btn">
   </form>

</section>










<?php include 'view/footer.php' ?>







<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>