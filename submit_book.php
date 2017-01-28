<?php
	session_start();
	require 'category.php';
	include 'book.php';
	$errors = [];
	if(isset($_SESSION['user_id'])) {
		if(isset($_POST['ok'])) {  #add category
			if(!isset($_POST['name']) || empty(trim($_POST['name']))){
				$errors[] = "Please, Enter a valid name";
			}
			if(!isset($_POST['price']) || empty(trim($_POST['price']))){
				$errors[] = "Please, Enter a valid price";
			}
			if(!isset($_POST['description']) || empty(trim($_POST['description']))){
				$errors[] = "Please, Enter a valid description";
			}
			if(!empty($errors)) {
				$_SESSION['errors'] = $errors;
				echo "<meta http-equiv='Refresh' content='0;url=login.php' />"; 
			} else {
				$book = new Book;
				$user_id = $_SESSION['user_id'];
				$book->user_id = $user_id;
				$book->name = $_POST['name'];
				$book->price = $_POST['price'];
				$book->description = $_POST['description'];
				$book->category_id = $_POST['category'];
				$book->subcategory_id = $_POST['subcategory'];


				$book->insert();
				echo "<meta http-equiv='Refresh' content='0;url=list_book.php' />"; 

				
			}

		}
		elseif (isset($_POST['edit'])) { #edit book
			if(!isset($_POST['name']) || empty(trim($_POST['name']))){
				$errors[] = "Please, Enter a valid name";
			}
			if(!isset($_POST['price']) || empty(trim($_POST['price']))){
				$errors[] = "Please, Enter a valid price";
			}
			if(!isset($_POST['description']) || empty(trim($_POST['description']))){
				$errors[] = "Please, Enter a valid description";
			}
			$book_id=$_POST['id'];
			if(!empty($errors)) {
				$_SESSION['errors'] = $errors;
				echo "<meta http-equiv='Refresh' content='0;url=edit_category.php?$cat_id' />"; 
			} else {
				$book = new book;
				
				$user_id = $_SESSION['user_id'];
				$book->user_id = $user_id;
				$book->name = $_POST['name'];
				$book->price = $_POST['price'];
				$book->description = $_POST['description'];
				$book->category_id = $_POST['category'];
				$book->subcategory_id = $_POST['subcategory_id'];
				$book->updateWithId($book_id); 
				
				echo "<meta http-equiv='Refresh' content='0;url=list_book.php' />"; 	
			}
		}
		elseif (isset($_POST['delete'])) { #delete categry
			$book_id=$_GET['book_id'];
			$book = new Book;
			$book->delete($book_id);#delete category
			
			echo "<meta http-equiv='Refresh' content='0;url=list_book.php' />"; 
		}
		else {
				header("location:register.php");
			}
	}

	else{
		echo "<meta http-equiv='Refresh' content='0;url=login.php' />"; 
	}	
?>	
		