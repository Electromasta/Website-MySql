<?php 
include 'init.php';
include 'header.php'; 

if (empty($_POST) === false)	{
	$required_fields = array('username', 'password', 'password2', 'firstname', 'lastname', 'email',);
	foreach($_POST as $key=>$value)	{
		if (empty($value) && in_array($key, $required_fields) === true)	{
			$errors[] = 'Missing Field required';
			break 1;
		}
	}
	
	if (empty($errors)	=== true)	{
		//Check everything is filled
		if (user_exists($_POST['username']) === true)	{
			$errors[] = 'Sorry, the username \'' . htmlentities($_POST['username']) . '\' is already taken.';
		}
		if (preg_match("/\\s/", $_POST['username']) == true)	{
			$errors[] = 'Username contains spaces.';
		}
		//Password checking, needs more work
		if (strlen($_POST['password']) < 6)	{
			$errors[] = 'Password too short, must be 6+';
		}
		if ($_POST['password'] !== $_POST['password2'])	{
			$errors[] = 'Passwords don\'t match.';
		}
		if (filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) === false)	{
			$errors[] = 'That is not a valid email address';
		}
		if (email_exists($_POST['email']) === true)		{
			$errors[] = 'That email is taken.';
		}
	}
}
?>

<h4>register page</h4>

<?php
if (isset($_GET['success']) && empty($_GET['success']))	{
	echo 'Registration Successful';
} else {

if(empty($_POST) === false && empty($errors) === true )	{
	$registerdata = array(
		'username'	=> $_POST['username'],
		'password'	=> $_POST['password'],
		'firstname'	=> $_POST['firstname'],
		'lastname'	=> $_POST['lastname'],
		'email'		=> $_POST['email'],
	);
	
	register_user($registerdata);
	header('Location: register.php?success');
	exit();
	
} else if (empty($errors) === false){
	print_r($errors);
}
?>

<form action="" method="post">
	<ul>
		<li>Username:<input type="text" name="username"></li>
		<li>Password:<input type="password" name="password"></li>
		<li>Repeat Password:<input type="password" name="password2"></li>
		<li>Name:<input type="text" name="firstname"></li>
		<li>Last Name:<input type="text" name="lastname"></li>
		<li>Email:<input type="text" name="email"></li>
		<li><input type="submit" value="Register"></li>
	</ul>
</form>


<?php 
}

if (logged_in() ==true)	{
	echo 'Logged in';
} else {
	echo 'Not logged in';
}

include 'footer.php'; 
include 'exit.php';
?>