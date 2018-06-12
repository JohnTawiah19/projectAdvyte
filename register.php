<?php
require_once('database.php');
session_start();
function loggedin() {
	if(isset($_SESSION['email'])&&!empty($_SSESSION['email'])) {
		return true;
	}else {
		return false;
	}
}

$sql = "CREATE TABLE `registration` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `email` VARCHAR(40) NOT NULL , `password` VARCHAR(42) NOT NULL , `first_name` VARCHAR(15) NOT NULL , `last_name` VARCHAR(15) NOT NULL , `username` VARCHAR(15) NOT NULL , `phone` INT(15) NOT NULL , `confirm_password` VARCHAR(42) NOT NULL , PRIMARY KEY (`id`))";
$run = mysqli_query($link, $sql);


if(!loggedin()) {
	if(isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['phone'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])) {
		$email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));
		$username = htmlspecialchars(mysqli_real_escape_string($link, $_POST['username']));
		$fname = htmlspecialchars(mysqli_real_escape_string($link, $_POST['fname']));
		$lname = htmlspecialchars(mysqli_real_escape_string($link, $_POST['lname']));
		$phone = htmlspecialchars(mysqli_real_escape_string($link, $_POST['phone']));
		$password = md5(htmlspecialchars(mysqli_real_escape_string($link, $_POST['password'])));
		$confirm_password = md5(htmlspecialchars(mysqli_real_escape_string($link, $_POST['confirm_password'])));
		
		$sql = "SELECT * FROM registration WHERE email = '".$email."'";
		$run = mysqli_query($link, $sql);
		@$count = mysqli_num_rows($run);
		
		if($count > 0) {
			echo '<div class="alert alert-danger>Email already exists.</div>';
		}else {
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['username'] = $username;
			$sql = "INSERT INTO `registration` (`id`, `email`, `username`, `last_name`, `first_name`, `password`, `confirm_password`, `phone`) VALUES ('', '".$email."', '".$username."', '".$lname."','".$fname."', '".$password."',  '".$confirm_password."', '".$phone."')";
			if ($run = mysqli_query($link, $sql)) {
				$_SESSION['fname'] = $fname;
				$_SESSION['lname'] = $lname;
				$_SESSION['username'] = $username;
				$_SESSION['email'] = $email;
				header('location: profile.php');
			}
		}
	}
}

?>