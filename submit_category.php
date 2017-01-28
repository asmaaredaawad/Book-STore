<?php
	session_start();
	require 'category.php';
	require 'subcategory.php';
	require 'book.php';

	$errors = [];
	if(isset($_SESSION['user_id'])) {
		if(isset($_POST['ok'])) {  #add category
			if(!isset($_POST['name']) || empty(trim($_POST['name']))){
				$errors[] = "Please, Enter a valid name";
			}
			if(!empty($errors)) {
				$_SESSION['errors'] = $errors;
				echo "<meta http-equiv='Refresh' content='0;url=login.php' />"; 
			} else {
				$category = new Category;
				$user_id = $_SESSION['user_id'];
				$category->user_id = $user_id;
				$category->name = $_POST['name'];
				$category->insert();
				echo "<meta http-equiv='Refresh' content='0;url=list_category.php' />"; 

				
			}

		} 
		elseif (isset($_POST['edit'])) { #edit category
			if(!isset($_POST['name']) || empty(trim($_POST['name']))){
				$errors[] = "Please, Enter a valid name";
			}
			$cat_id=$_POST['id'];
			if(!empty($errors)) {
				$_SESSION['errors'] = $errors;
				echo "<meta http-equiv='Refresh' content='0;url=edit_category.php?$cat_id' />"; 
			} else {
				$category = new Category;
				$subcategory = new SubCategory;

				$user_id = $_SESSION['user_id'];
				$category->user_id = $user_id;
				$category->name = $_POST['name'];
				$category->updateWithId($cat_id); #update category
				$subcategory->category_id = $cat_id;
				$subcategory->updateWithId($cat_id); #update subcategory
				echo "<meta http-equiv='Refresh' content='0;url=list_category.php' />"; 

				
			}
		}
		// when category deleted ,, i deleted its subcategory and book 
		elseif (isset($_POST['delete'])) { #delete categry
			$cat_id=$_GET['catid'];
			$category = new Category;
			$category->delete($cat_id);#delete category
			$subcategory = new SubCategory();
			$subcategory->delete_by_cat($cat_id);
			$book = new Book();
			$book->delete_by_cat($cat_id);
			
			echo "<meta http-equiv='Refresh' content='0;url=list_category.php' />"; 
		}
		else {
			header("location:register.php");
		}
	}

	else{
		echo "<meta http-equiv='Refresh' content='0;url=login.php' />"; 
	}	
?>