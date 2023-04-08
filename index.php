<?php

$conn = mysqli_connect('localhost','root','','contact_db') or die('connection failed');

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
   
   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dumpster Diving Diners</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" data-aos="zoom-out">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
   
<!-- custom cursor  -->
<img src="images/cursor.png" class="cursor" alt="">
<!-- custom cursor  -->

<!-- header section starts  -->

<header class="header">

   <a href="#home" class="logo">Dumpster Diving Diners</a>

   <div id="menu-btn" class="fas fa-bars"></div>

   <nav class="navbar">
      <a href="#home">home</a>
      <a href="#container">articles</a>
      <a href="#map">map</a>
      <a href="#contact">contact</a>

   </nav>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <h3 class="home-text">a dumpster diver's</h3>
   <h3>guide to dumpster dining</h3>
   <div class="wave"></div>
   <div class="wave wave-2"></div>
   <div class="wave wave-3"></div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="container" id="container">

   <h1 class="heading">articles</h1>

   <div class="box-container">

      <div class="box">
         <div class="image">
            <img src="images/img-1.jpg" alt="">
         </div>
         <div class="content">
            <h3>Canned Goods</h3>
            <p>Canned goods turn up fairly often in the dumpsters. All except the most phobic people would be willing to eat from a can, even if it came from a dumpster.</p>
            <a href="#" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 8th april, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-2.jpg" alt="">
         </div>
         <div class="content">
            <h3>Candy</h3>
            <p>Candy, especially hard candy, is usually safe if it has not drawn ants. Chocolate is often discarded because it has become discolored.</p>
            <a href="#" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 8th april, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-3.jpg" alt="">
         </div>
         <div class="content">
            <h3>College Campuses</h3>
            <p>Around breaks, students throw out many food because they do not know whether it will spoil before they return.</p>
            <a href="#" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 8th april, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-4.jpg" alt="">
         </div>
         <div class="content">
            <h3>Dairy Products</h3>
            <p>Yogurt, cheese, and sour cream are items that are often thrown out while they are still good.</p>
            <a href="#" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 8th april, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-5.jpg" alt="">
         </div>
         <div class="content">
            <h3>Carbonated Soft Drinks</h3>
            <p>A test for carbonated soft drinks is whether they still fizz vigorously. Such products should be decanted slowly into a clear glass.</p>
            <a href="#" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 8th april, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/img-6.jpg" alt="">
         </div>
         <div class="content">
            <h3>Home leftovers</h3>
            <p>Home leftovers, as opposed to surpluses from restaurants, are often bad. Avoid unfamiliar ethic foods.</p>
            <a href="#" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 8th april, 2023 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>
      </div>


   </div>

   <div id="load-more"> load more </div>

</div>

   <script>

      let loadMoreBtn = document.querySelector('#load-more');
      let currentItem = 3;

      loadMoreBtn.onclick = () =>{
         let boxes = [...document.querySelectorAll('.container .box-container .box')];
         for (var i = currentItem; i < currentItem + 3; i++){
            boxes[i].style.display = 'inline-block';
         }
         currentItem += 3;

         if(currentItem >= boxes.length){
            loadMoreBtn.style.display = 'none';
         }
      }

   </script>
   <iframe id="map" src="https://www.google.com/maps/d/u/0/embed?mid=1zQgVcB9-tLgx0XiJqCnX8WbCIeXVwN0&ehbc=2E312F" width="100%" height="700px"></iframe>

</section>

<!-- about section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <h3 data-aos="fade-up">contact</h3>

   <form action="" method="post">
      <div class="flex">
         <input data-aos="fade-right" type="text" name="name" placeholder="enter your name" class="box" required>
         <input data-aos="fade-left" type="email" name="email" placeholder="enter your email" class="box" required>
      </div>
      <input data-aos="fade-up" type="number" min="0" name="number" placeholder="enter your number" class="box" required>
      <textarea data-aos="fade-up" name="message" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
      <input type="submit" data-aos="zoom-in" value="send message" name="send" class="btn">
   </form>

</section>

<!-- contact section ends -->




<!-- footer section starts  -->

<section class="footer">

   <div class="credit">Made for <span>Bon Hackétit</span> </div>

</section>

<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>

   AOS.init({
      duration:800,
      delay:300
   });

</script>

</body>
</html>