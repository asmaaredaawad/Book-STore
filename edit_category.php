<?php
	session_start();
	if(!isset($_SESSION['user_id'])) {
		header('location:login.php');
	}
	
	include 'head.php';
	include 'category.php';
	

	$category = new Category();
	$cat = $category->getCategory($_GET['cat_id']);
	foreach($cat as $category) { 
	
?>
<div class='row'></div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-6'>
	<h2 class='col-md-12 text-primary'><i class='glyphicon glyphicon-folder-open'></i>Edit Caregory...</h2>
	
	<form role='form' class='form-horizontal col-md-12' action='submit_category.php' method='post'>
		<div class='form-group has-warning'>
			<label class='col-md-2'>name</label>
			<div class='col-md-10 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-folder-open'></i></span>
				<input placeholder='name' class='form-control' name='name' value="<?= $category['name'] ?>" />
				<input placeholder='id' class='form-control' name='id' type="hidden" value="<?= $category['id'] ?>" />
			</div>
			<?php } ?>
		</div>	
		</div>		
		<span class='col-md-2'></span>
		<input type='submit' class='col-md-4 btn btn-primary btn-lg' name='edit' value='edit' />
	</form>	
</div>
<div class='col-md-2'></div>
</div>
<?php
	include 'foot.php';
?>