<?php

require_once('database.php');
session_start();

if(isset($_POST['email'])&&isset($_POST['password'])) {
	$email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));
	$password = md5(htmlspecialchars(mysqli_real_escape_string($link, $_POST['password'])));
					
	$sql = "SELECT * FROM registration WHERE email = '".$email."' AND  password = '".$password."'";
	$run = mysqli_query($link, $sql);
	$count = mysqli_num_rows($run);
	$row = $run->fetch_assoc();
					
	if ($count == 1) {
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $row['username'];
		$_SESSION['fname'] = $row['first_name'];
		$_SESSION['lname'] = $row['last_name'];
		$_SESSION['phone'] = $row['phone'];
		header('location: profile.php');
	}else {
		echo '<div class="alert alert-danger"> Your email or password is incorrect </div>';
		
	}
}else {
	echo '<div class="alert alert-danger"> Form control error. Please contact admin asap. </div>';
}

?>
