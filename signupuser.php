<?php
session_start();
require_once 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST") {
	
	$uname = strip_tags($_POST['user_name']);
	$email = strip_tags($_POST['user_email']);
	$upass = strip_tags($_POST['user_password']);
	
	$uname = $DBcon->real_escape_string($uname);
	$email = $DBcon->real_escape_string($email);
	$upass = $DBcon->real_escape_string($upass);
	
	$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
	
	$check_email = $DBcon->query("SELECT email FROM signed_users WHERE email='$email'");
	$count=$check_email->num_rows;
	
	if ($count==0) {
		
		$query = "INSERT INTO signed_users(username,email,password) VALUES('$uname','$email','$hashed_password')";

		if ($DBcon->query($query)) {
            header ("Location: ../ved_med_portal/login-signup.php?success=successfully registered !");
		}else {
            header ("Location: ../ved_med_portal/login-signup.php?error=Error while Registering");
		}
		
	} else {
        header ("Location: ../ved_med_portal/login-signup.php?error=Sorry Email already taken !");			
	}
	$DBcon->close();
}
?>