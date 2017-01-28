<?php
	session_start();
	if(!isset($_SESSION['user_id'])) {
		header('location:login.php');
	}
	include 'head.php';
	include 'user.php';
	include 'category.php';
	include 'subcategory.php';
	include 'book.php';

	echo "<h2 style='text-align: center;color: #619ACF;'>Welcome To Our Book Store</h2>";
	
?>
 
<?php 
	include 'foot.php';
?>
