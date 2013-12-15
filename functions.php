<?php
function arraysanitize(&$data)	{
	$item = mysql_real_escape_string($data);
}

function sanitize($data)	{
	return mysql_real_escape_string($data);
}
?>