<?php
$link = mysql_connect('localhost','root',''); 
mysql_select_db('project');
if (!$link) { 
	die('Well, it\'s broke: ' . mysql_error()); 
} 
?>