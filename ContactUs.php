<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Contact-Us </title>
    <link rel="stylesheet" href="ContactUs-style.css">
       <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <style>
       div.msgsuccess{
  background-color: rgba(0, 128, 0, 0.76);
  color: white;
  padding: 1%;
  border: 2px solid green;
  margin-top: 2%;
  text-align: center;
  animation: msg 4s linear 0s 1;
  animation-fill-mode: forwards;
} 
div.error{
  background-color: rgba(255, 0, 0, 0.76);
  color: white;
  padding: 1%;
  border: 2px solid red;
  margin-top: 2%;
  text-align: center;
  animation: msg 4s linear 0s 1;
  animation-fill-mode: forwards;
} 
@keyframes msg {
  0%{
    opacity: 1;
  }
  90%{
    opacity: 1;
  }
  100%{
    opacity: 0;
  }
}
#bt_1{
  color: #fff;
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: #3e2093;
  cursor: pointer;
  transition: all 0.3s ease;
}
#bt_1:hover{
  background: #5029bc;
}

a.home{
  text-decoration:none;
  position: absolute;
  margin-left:40%;
  color:black;
  color: #fff;
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: #3e2093;
  cursor: pointer;
  transition: all 0.3s ease;
}
     </style>
   </head>
<body>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Chandigarh University</div>
          <div class="text-two">Mohali, Punjab</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+917734846724(Vedprakash)</div>
          <div class="text-two">+919351433600(Rinkesh)</div>
          <div class="text-two">+917300989265(Rishabh)</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">vedtanwar01@gmail.com</div>
          <div class="text-two">kumarrinkesh33600@gmail.com</div>
          <div class="text-two">tomarrishabh0109@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any types of quries related to Unused Medicine Donation System, you can send me message from here. It's my pleasure to help you.</p>
      <form action="../ved_med_portal/contactuser.php" method="post">
        <div class="input-box">
          <input type="text" name="name" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box message-box">
          <textarea name="mytext"   cols="30" rows="10" placeholder="Write Your query Here" required></textarea>
        </div>
        <div class="button">
          <input type="submit" id="bt_1" value="Send Now" >
          <a href="../ved_med_portal/index.html" class="home">HOME</a>
        </div>
        
    <?php if (isset($_GET['success'])) { ?>
    <div class="msgsuccess">
      <?php echo $_GET['success']; ?>
    </div>
    <?php } ?>
    <?php if (isset($_GET['error'])) { ?>
          <div class="msgerror">            
      <?php echo $_GET['error']; ?>
    </div>      
    <?php } ?> 


      </form>
    </div>
    </div>
  </div>
</body>
</html>
