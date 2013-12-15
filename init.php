<?php
session_start();
// error_reporting(0);

require 'connect.php';
require 'functions.php';
require 'users.php';

if (logged_in() == true)	{
	$session_user_id = $_SESSION['id'];
	$user_data = user_data($session_user_id, 'id', 'username', 'password', 'firstname', 'lastname', 'email');
	
	//echo $user_data['firstname'];
}

$errors = array();
?>