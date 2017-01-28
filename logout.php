<?php
	session_start();
	unset($_SESSION['user_id']);
	echo "<meta http-equiv='Refresh' content='0;url=login.php' />"; 

?>