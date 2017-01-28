<?php
	session_start();
	if(isset($_SESSION['user_id'])) {
		header('location:home.php');
	}
	
	include 'head.php';
?>
<div class='row'></div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-6'>
	<h2 class='col-md-12 text-primary'><i class='glyphicon glyphicon-user'></i><i class='glyphicon glyphicon-user'></i> Login...</h2>
	<?php
		if (isset($_SESSION['errors'])) {
			foreach ($_SESSION['errors'] as $key => $value) {
				?>
				<div class='alert alert-danger'><b><?php echo $value; ?></b></div>
				<?php
			}
			unset($_SESSION['errors']);

		}
	?>
	<form role='form' class='form-horizontal col-md-12' action='check_login.php' method='post'>
		<div class='form-group has-warning'>
			<label class='col-md-2'>email</label>
			<div class='col-md-10 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='email' class='form-control' name='email' />
			</div>
		</div>	
		<div class='form-group has-warning'>
			<label class='col-md-2'>Password</label>
			<div class='col-md-10 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='Password' class='form-control' name='password' type='password' />
			</div>
		</div>		
		<span class='col-md-2'></span>
		<input type='submit' class='col-md-10 btn btn-primary btn-lg' name='ok' value='Login' />
	</form>	
</div>
<div class='col-md-2'></div>
</div>
<?php
	include 'foot.php';
?>