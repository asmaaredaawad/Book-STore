<?php
	session_start();
	include 'user.php';
	$errors = [];
	if(isset($_POST['ok'])) {
		//check username
		if (empty(trim($_POST['name']))) {
			$errors[]="enter name ";
		}else{
			if (!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])){
				$errors[]="name must contain at least character & white space only";
			}else{

				if (strlen($_POST['name'])<6) {
					$errors[]="name must contain at least 6 character";
				}
			} 
		}
		//check password
		if (empty(trim($_POST['password']))) {
			$errors[]="enter password ";
		}else{
			if (strlen($_POST['password'])<6) {
					$errors[]="password must contain at least 6 character";
				}
		}
		

	//check emmail
		if (empty(trim($_POST['email']))) {
			$errors[]="enter email ";
		}else{
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST['email'])){
				$errors[]="enter valid email";
			}
		}
		 
			$user = new User;
			if($user->if_exist($_POST['email'])) {
				$errors[]="unavailable email";
				$_SESSION['errors']= $errors;
				echo "<meta http-equiv='Refresh' content='0;url=regist.php' />"; 

			}
		
	
		if(!empty($errors)) {
			$_SESSION['errors'] = $errors;
			echo "<meta http-equiv='Refresh' content='0;url=register.php' />"; 
		} else {
			$user = new User;
			$user->name = $_POST['name'];
			$user->password= $_POST['password'];
			$user->email = $_POST['email'];
			$user_id = $user->insert();
			if($user_id){
				if(isset($_SESSION['errors'])) {
					unset($_SESSION['errors']);
				}
				echo "Thanks, You r gonna be redirect  within 5 seconds to the loign page, or u can click here <a href='login.php'>Login</a>";
				//echo "<meta http-equiv='Refresh' content='5;url=login.php' />"; 
			}
		}


	} else {
		header("location:register.php");
	}
?>