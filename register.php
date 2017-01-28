<?php
	session_start();
	include 'head.php';
	
?>
<div class='row'></div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-6'>
	<h2 class='col-md-12 text-primary'><i class='glyphicon glyphicon-user'></i><i class='glyphicon glyphicon-user'></i> Registeration...</h2>
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
	<form role='form' class='form-horizontal col-md-12' action='check_register.php' method='post'>
		<div class='form-group has-warning'>
			<label class='col-md-2'>Name</label>
			<div class='col-md-10 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='name' class='form-control' name='name' />
				
			</div>
		</div>
		<div class='form-group has-warning'>
			<label class='col-md-2'>Email</label>
			<div class='col-md-10 input-group'>
				<span class='input-group-addon'>@</span>
				<input placeholder='Email' class='form-control' name='email' type='text' />
			</div>
		</div>			
		<div class='form-group has-warning'>
			<label class='col-md-2'>password</label>
			<div class='col-md-10 input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input placeholder='password' class='form-control' name='password' type='password' />
			</div>
		</div>				
		<span class='col-md-2'></span>
		<input type='submit' class='col-md-10 btn btn-primary btn-lg' name='ok' value='Register' />
	</form>	
</div>
<div class='col-md-2'></div>
</div>
<?php
	include 'foot.php';
?>