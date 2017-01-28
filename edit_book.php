<?php
	session_start();
	if(!isset($_SESSION['user_id'])) {
		header('location:login.php');
	}
	
	include 'head.php';
	include 'category.php';
	include 'book.php';

	$category = new Category();
	$book = new Book();
	
	$book = $book->getBook($_GET['book_id']);
	foreach($book as $book) { 

?>
<div class='row'></div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-6'>
	<h2 class='col-md-12 text-primary'><i class='glyphicon glyphicon-user'></i>
		</i> Edit Book...</h2>
	
	<form role='form' class='form-horizontal col-md-12' action='submit_book.php' method='post'>
		<div class='form-group has-warning'>
			<label class='col-md-3'>Name</label>
			<div class='col-md-9 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='name' class='form-control' name='name' value="<?= $book['name'] ?>" />
				<input placeholder='id' class='form-control' name='id' type="hidden" value="<?= $book['id'] ?>" />
			</div>
		</div>
		<div class='form-group has-warning'>
			<label class='col-md-3'>Price</label>
			<div class='col-md-9 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='price' class='form-control' name='price' type="number" value="<?= $book['price'] ?>" />
			</div>
		</div>
		<div class='form-group has-warning'>
			<label class='col-md-3'>Description</label>
			<div class='col-md-9 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='description' class='form-control' name='description' type="text" value="<?= $book['description'] ?>"/>
			</div>
		</div>	
		<?php }?>
		
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
		<input type='submit' class='col-md-10 btn btn-primary btn-lg' name='edit' value='edit' />
	</form>	
</div>
<div class='col-md-2'></div>
</div>
<?php
	include 'foot.php';
?>