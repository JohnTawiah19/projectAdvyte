<?php
	// User signs up
	//Name to be displayed on profile page
	$_SESSION['name'] = $_POST['username'];
	$_SESSION['email'] = $_POST['email'];

	$username = $mysqli->escape_string($_POST['username']);
	$email = $mysqli->escape_string($_POST['email']);
	$password = $mysqli->escape_string($_POST['password']);
	$hash = $mysqli->escape_string( md5( rand(0,1000) ) );


	$result = $mysqli->query("SELECT * FROM users WHERE email = '$email' OR username = '$username'") or die($mysqli->error);
	//Check if User has already registered
	if($result->num_rows > 0) {
		
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( advyte.com )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login signup/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php");

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }


?>