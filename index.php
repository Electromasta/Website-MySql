<?php 
include 'init.php';
include 'header.php'; 
?>

<div class="container">
	<div class="row-fluid">
		<div class="span6">
		<h4>Most Popular</h4>
			<p>
				<?php include 'tennewest.php'; ?>
			</p>
		</div>
		<div class="span6">
		<h4>Newest</h4>
			<p>
				<?php include 'tennewest.php'; ?>
			</p>
		</div>
	</div>
</div>

<?php 
if (logged_in() ==true)	{
	echo 'Logged in';
} else {
	echo 'Not logged in';
}

include 'footer.php'; 
include 'exit.php';
?>