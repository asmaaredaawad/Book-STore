<?php
	session_start();
	require 'user.php';
	$errors = [];
	if(isset($_POST['ok'])) {
		if(!isset($_POST['email']) || empty(trim($_POST['email']))){
			$errors[] = "Please, Enter a valid email";
		}

		if(!isset($_POST['password']) || empty(trim($_POST['password']))){
			$errors[] = "Please, Enter a valid password";
		} else {
			$user = new User;
			$is_exist = $user->checkBeforeLogin($_POST['email'],$_POST['password']);
			if(!$is_exist) {
				$errors[]="email or password is invalid";
			}
		}

		if(!empty($errors)) {
			$_SESSION['errors'] = $errors;
			echo "<meta http-equiv='Refresh' content='0;url=login.php' />"; 
		} else {
			$user = new User();
			$user->getUser($_POST['email'],$_POST['password']);
			
			$_SESSION['user_id'] = $user->id;
			echo "<meta http-equiv='Refresh' content='0;url=index.php' />"; 
			die();
		}

	} else {
		header("location:register.php");
	}
?>