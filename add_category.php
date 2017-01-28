<?php
	session_start();
	if(!isset($_SESSION['user_id'])) {
		header('location:login.php');
	}
	
	include 'head.php';
?>
<div class='row'></div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-6'>
	<h2 class='col-md-12 text-primary'><i class='glyphicon glyphicon-folder-open'>
		
	</i></i> Add Category...</h2>
	
	<form role='form' class='form-horizontal col-md-12' action='submit_category.php' method='post'>
		<div class='form-group has-warning'>
			<label class='col-md-2'>name</label>
			<div class='col-md-8 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='name' class='form-control' name='name' />
			</div>
		</div>	
				
		<span class='col-md-2'></span>
		<input type='submit' class='col-md-4 btn btn-primary btn-lg' name='ok' value='add' />
	</form>	
</div>
<div class='col-md-2'></div>
</div>
<?php
	include 'foot.php';
?>