<?php
	session_start();
	if(!isset($_SESSION['user_id'])) {
		header('location:login.php');
	}
	
	include 'head.php';
	include 'category.php';
	$category = new Category();

?>
<div class='row'></div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-6'>
	<h2 class='col-md-12 text-primary'><i class='glyphicon glyphicon-folder-open'>
		
	</i> Add SubCategory...</h2>
	
	<form role='form' class='form-horizontal col-md-12' action='submit_subcategory.php' method='post'>
		<div class='form-group has-warning'>
			<label class='col-md-2'>Name</label>
			<div class='col-md-10 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='name' class='form-control' name='name' />
			</div>
		</div>	

		<div class='form-group has-warning'>
		<label class='col-md-2'>Category</label>
			<div class='col-md-10 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-folder-open'></i></span>

				<select class="form-control" name="category">
				  <option selected="selected">Choose Category</option>
				  <?php
				  	$categories = $category->categories(); 
				    foreach($categories as $category) { ?>
				      <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
				  <?php
				    } ?>

				</select>
			</div>		
		</div>	
		
		<span class='col-md-2'></span>
		<input type='submit' class='col-md-10 btn btn-primary btn-lg' name='addsubcat' value='add' />
	</form>	
</div>
<div class='col-md-2'></div>
</div>
<?php
	include 'foot.php';
?>