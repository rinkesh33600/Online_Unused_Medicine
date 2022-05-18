<?php

require_once 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST") {

    $uname = $_POST['name'];
    $email = $_POST['email'];
    $numb=$_POST['number'];
    $dates=$_POST['dates'];
    $medname=$_POST['medicine'];
    $quantity=$_POST['quantity'];
    $state=$_POST['state'];
    $addr=$_POST['address'];

    $total=0;
    $query1="SELECT * from donate_medicine where medicine='$medname'";
    $result1=mysqli_query($DBcon,$query1);
    $num=mysqli_num_rows($result1);

    $query2="SELECT SUM(quantity) from donate_medicine where medicine='$medname'";
    $result2=mysqli_query($DBcon,$query2);
    $num1=mysqli_num_rows($result2);
    while($row=mysqli_fetch_assoc($result2)){
        $total=$row['SUM(quantity)'];
    }


    if($num>=1){
        if($total>=$quantity){
            $sql1 = "INSERT INTO buy_medicine(name,email,ph_number,date_of_med,medicine,quantity,state,address) VALUES('$uname','$email','$numb','$dates','$medname','$quantity','$state','$addr')";
            $res1=mysqli_query($DBcon,$sql1);

            header ("Location: ../ved_med_portal/BuyMedicine.php?success=Your Medicine is Available. We will Send to your Address shortly");
        }
        else{
            header ("Location: ../ved_med_portal/BuyMedicine.php?error=Sorry your medicine is out of stock!");

        }
    }
    else{
        header ("Location: ../ved_med_portal/BuyMedicine.php?error=Sorry your Medicine is not Available");
    }
    
}
$DBcon->close();
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Medicine</title>
    <link rel="stylesheet" href="BuyMedicine-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<style>
div.msgsuccess{
    background-color: rgba(0, 128, 0, 0.71);
    border: 2px solid green;
    text-align: center;
    padding: 1%;
    font-size: 1.4vw;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    width: 76%;
    margin-top: -11%;
    position: absolute;
    margin-left: 13%;
    border-radius: 10px;
    animation: msg 4s linear 0s 1;
  animation-fill-mode: forwards;
}
a.home{
        width: 10%;
        cursor: pointer;
        display: inline-block;
        position: absolute;
        margin-top:31.5%;
        margin-left:-55%;
        background:black;
        border-radius:20px;
        text-align:center;
        padding:1%;
        border:1px solid white;
        color: skyblue;
        transition: 0.5s;

}
    div.msgerror{
        background-color: rgba(255, 0, 0, 0.712);
        border: 2px solid red;
        text-align: center;
        padding: 1%;
        font-size: 1.4vw;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        width: 76%;
        margin-top: -11%;
        position: absolute;
        margin-left: 13%;
        border-radius: 10px;
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
</style>
</head>
<body>
    <div class="container">
        <img src="images/BM-Img.jpg" alt="">
    </div>
    <div class="Buy-form">
        <h1>Buy Your Medicine Freely Now!</h1>
        <form action="#" method="POST">
                <div class="form1">
                <div class="form-Details">
                    <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="form-Details">
                    <input type="email" id="email" name="email" placeholder="Enter your Email">
                </div>
                <div class="form-Details">
                    <input type="tel" id="phone" name="number" placeholder="Enter your Number">
                </div>
                <div class="form-Details">
                    <input type="date" id="date" name="dates" placeholder="dd-mm-yy">
                </div>
            </div>
            <div class="form2">
                
                <div class="form-Details">
                    <input type="text" id="Medi-name" name="medicine" placeholder="Enter Medicine name">
                </div>
                <div class="form-Details">
                    <input type="number" id="Qty" name="quantity" placeholder="Enter Quantity">
                </div>
                <div class="form-Details">
                    <!--- India states -->
<select id="country-state" name="state">
    <option value="ss">select state</option>
    <option value="AN">Andaman and Nicobar Islands</option>
    <option value="AP">Andhra Pradesh</option>
    <option value="AR">Arunachal Pradesh</option>
    <option value="AS">Assam</option>
    <option value="BR">Bihar</option>
    <option value="CH">Chandigarh</option>
    <option value="CT">Chhattisgarh</option>
    <option value="DN">Dadra and Nagar Haveli</option>
    <option value="DD">Daman and Diu</option>
    <option value="DL">Delhi</option>
    <option value="GA">Goa</option>
    <option value="GJ">Gujarat</option>
    <option value="HR">Haryana</option>
    <option value="HP">Himachal Pradesh</option>
    <option value="JK">Jammu and Kashmir</option>
    <option value="JH">Jharkhand</option>
    <option value="KA">Karnataka</option>
    <option value="KL">Kerala</option>
    <option value="LA">Ladakh</option>
    <option value="LD">Lakshadweep</option>
    <option value="MP">Madhya Pradesh</option>
    <option value="MH">Maharashtra</option>
    <option value="MN">Manipur</option>
    <option value="ML">Meghalaya</option>
    <option value="MZ">Mizoram</option>
    <option value="NL">Nagaland</option>
    <option value="OR">Odisha</option>
    <option value="PY">Puducherry</option>
    <option value="PB">Punjab</option>
    <option value="RJ">Rajasthan</option>
    <option value="SK">Sikkim</option>
    <option value="TN">Tamil Nadu</option>
    <option value="TG">Telangana</option>
    <option value="TR">Tripura</option>
    <option value="UP">Uttar Pradesh</option>
    <option value="UT">Uttarakhand</option>
    <option value="WB">West Bengal</option>
</select>
                </div>
                <div class="form-Details">
                    <textarea cols="20" name="address" rows="2" placeholder="Enter your Address"></textarea>
                </div>
            </div>
            <div class="form-Details">
                <input type="submit" id="submit">
            </div>
            <a href="../ved_med_portal/Donation.html" class="home">HOME</a>
            <div class="form-Details">
                <input type="reset" id="reset">
            </div>

            </form>
    </div>
    <?php 
    if (isset($_GET['success'])) { ?>
      <div class="msgsuccess">
        <?php echo $_GET['success']; ?>
    </div>
    <?php } ?>

    <?php if (isset($_GET['error'])) { ?>
      <div class="msgerror">
        <?php echo $_GET['error']; ?>
    </div>
    <?php } ?>
</body>
</html>