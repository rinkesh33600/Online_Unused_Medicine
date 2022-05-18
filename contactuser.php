<?php

session_start();
require_once 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST") {
	
	$uname = $_POST['name'];
	$email = $_POST['email'];
	$uquery =$_POST['mytext'];
	
    $sql = "INSERT INTO contact_us(name,email,query) VALUES('$uname','$email','$uquery')";

		if ($DBcon->query($sql)) {
            header ("Location: ../ved_med_portal/ContactUs.php?success=Successfully marked your query. We will Resolve your Query soon");
		}else {
            header ("Location: ../ved_med_portal/ContactUs.php?error=Back-end Error ");
		}
	$DBcon->close();
}


?>