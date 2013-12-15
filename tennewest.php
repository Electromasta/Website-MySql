<?php
	$query = mysql_query("SELECT * FROM `projects` ORDER BY `id` DESC LIMIT 10");
	print_r('<ul>');
	while ($output = mysql_fetch_assoc($query))	{
		print_r('<li>' . $output['projectname'] . '</li>');
	}
	print_r('</ul>');
?>