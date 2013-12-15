<?php
function register_user($registerdata)	{
	array_walk($registerdata, 'arraysanitize');
	$registerdata['password'] = md5($registerdata['password']);
	
	$fields = '`' . implode('`, `', array_keys($registerdata)) . '`';
	$data = '\'' . implode('\', \'', $registerdata) . '\'';
	
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
}

function register_project($registerdata, $temp, $ext)	{
	array_walk($registerdata, 'arraysanitize');
	
	$filepath = 'user/' . substr(md5(time()), 0, 10) . '.' . $ext;
	move_uploaded_file($temp, $filepath);
	
	$registerdata['filelocation'] = $filepath;
	
	$fields = '`' . implode('`, `', array_keys($registerdata)) . '`';
	$data = '\'' . implode('\', \'', $registerdata) . '\'';
	mysql_query("INSERT INTO `projects` ($fields) VALUES ($data)");
}

function user_data($user_data)	{
	$data = array();
	$user_data = (int)$user_data;
	
	$nargs = func_num_args();
	$gargs = func_get_args();
	
	if ($nargs > 1) {
		unset($gargs[0]);
		
		$fields = '`' . implode('`, `', $gargs) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `id` = $user_data"));
		
		return $data;
	}
}

function logged_in()	{
	return (isset($_SESSION['id'])) ? true : false;
}


function user_exists($username)	{
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `username` = '$username'");
	return (mysql_result($query, 0) == 1);
}

function project_exists($projectname)	{
	$username = sanitize($projectname);
	$query = mysql_query("SELECT COUNT(`id`) FROM `projects` WHERE `projectname` = '$projectname'");
	return (mysql_result($query, 0) == 1);
}

function email_exists($email)	{
	$email = sanitize($email);
	$query = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `email` = '$email'");
	return (mysql_result($query, 0) == 1);
}

function user_active($username)	{
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `username` = '$username' AND `active` = 1");
	return (mysql_result($query, 0) == 1);
}

function user_id_from_username($username)	{
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `id` FROM `users` WHERE `username` = '$username'"), 0, 'id');
}

function login($username, $password)	{
	$username = sanitize($username);
	$password = sanitize($password);
	$user_id = user_id_from_username($username);
	$password = md5($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `username` ='$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}
?>