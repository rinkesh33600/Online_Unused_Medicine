<?php
session_start();
require_once 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	
	$email = strip_tags($_POST['user_email']);
	$password = strip_tags($_POST['user_password']);
	
	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT user_id, email, password FROM signed_users WHERE email='$email'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; 
	if($count==1){
		if (password_verify($password, $row['password'])) {
			header("location: ../ved_med_portal/Donation.html");
		} else {
			header ("location: ../ved_med_portal/login-signup.php?error=Invalid Password !");
		}
	}
	else{
		header ("location: ../ved_med_portal/login-signup.php?error=Email not Present! Register");
	}

	
	$DBcon->close();
	}
?>