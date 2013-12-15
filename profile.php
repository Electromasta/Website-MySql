<?php 
include 'init.php';
include 'header.php'; 
?>

profile page

<ul>
	<li><a href="#">Change Password</a></li>
	<li><a href="#">Messy</a></li>
	<li><a href="#">Test</a></li>
</ul>

<?php 
if (logged_in() ==true)	{
	echo 'Logged in';
} else {
	echo 'Not logged in';
}

include 'footer.php'; 
include 'exit.php';
?>