<?php
	session_start();
	if(!isset($_SESSION['user_id'])) {
		header('location:login.php');
	}
	
	include 'head.php';
	include 'category.php';
	include 'subcategory.php';
	// include 'book.php';

	$category = new Category();
	$subcategory = new SubCategory();
	
?>
<div class='row'></div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-6'>
<?php
$cats=$category->categories();
$subcats=$subcategory->list_subcategories();
	if (empty($cats)) {
		echo"<h2>You must add category first</h2>";
	}elseif(empty($subcats)){
		echo"<h2>You must add  at least one subcategory first</h2>";
	}else{

?>
	<h2 class='col-md-12 text-primary'><i class='glyphicon glyphicon-user'></i>
		<i class='glyphicon glyphicon-user'></i> Add Book...</h2>
	
	<form role='form' class='form-horizontal col-md-12' action='submit_book.php' method='post'>
		<div class='form-group has-warning'>
			<label class='col-md-3'>Name</label>
			<div class='col-md-9 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='name' class='form-control' name='name' />
			</div>
		</div>
		<div class='form-group has-warning'>
			<label class='col-md-3'>Price</label>
			<div class='col-md-9 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='price' class='form-control' name='price' type="number" />
			</div>
		</div>
		<div class='form-group has-warning'>
			<label class='col-md-3'>Description</label>
			<div class='col-md-9 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='description' class='form-control' name='description' type="text" />
			</div>
		</div>	

		<div class='form-group has-warning'>
		<label class='col-md-3'>Category</label>
			<div class='col-md-9 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-folder-open'></i></span>

				<select class="form-control" name="category" id="category">
				  <option selected="">Choose Category</option>
				  <?php
				  	$categories = $category->categories(); 
				    foreach($categories as $category) { 
				  ?>
				      <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
				  <?php
				    } 
				  ?>

				</select>
			</div>		
		</div>	

	  
      <div class="form-group has-warning">
        <label class='col-md-3'>Subcategory</label>
        <div class="col-md-9 input-group">
	        <span class='input-group-addon'><i class='glyphicon glyphicon-folder-open'></i></span>
	          <select id="subcategory" name="subcategory" class="form-control">
	          	<option selected="">Choose SubCategory</option>
	          </select>
        </div>
      </div>
		
		<span class='col-md-3'></span>
		<input type='submit' class='col-md-10 btn btn-primary btn-lg' name='ok' value='add' />
	</form>	
	<?php } ?>
</div>
<div class='col-md-2'></div>
</div>
<?php
	include 'foot.php';
?>