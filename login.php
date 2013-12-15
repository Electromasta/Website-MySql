<?php
include 'init.php';
include 'header.php';

if (empty($_POST) == false) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) === true || empty ($password) === true)	{
		$errors[] = 'Re-enter username and password.';
	} else if(user_exists($username) === false)	{
		$errors[] = 'User does not exist.';
	} else if (user_active($username) == false) {
		$errors[] = 'You haven\'t activated your account.';
	} else {
		$login = login($username, $password);
		if ($login === false)	{
			$errors[] = 'Wrong Password combination.';
		} else {
			$_SESSION['id'] = $login;
			header('Location: index.php');
			exit();
		}
	}
	
	//print_r($errors);
	if (empty($errors) == false)	{
		echo '<ul><li>' . implode('</li><li>', $errors) . '</ul></li>';
	}
}

include 'footer.php';
include 'exit.php';
?>