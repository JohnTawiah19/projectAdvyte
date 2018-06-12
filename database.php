<?php
//Database conneection settings
$link = mysqli_connect('localhost', 'root', '', 'Advyt');
if($link === false) {
	die("ERROR: Could not connect.".mysqli_connect_error());
}
?>