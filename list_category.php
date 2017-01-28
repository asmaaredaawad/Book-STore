<?php
	session_start();
    if(!isset($_SESSION['user_id'])) {
        header('location:login.php');
    }
	
	include 'head.php';
	include 'category.php';
	// include 'book.php';

	$category = new Category();

?>
<div class='row'></div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-6'>
	<h2 class='col-md-12 text-primary'><i class='glyphicon glyphicon-list'></i>
		All Categories...</h2>
	 <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        	<th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php
					  	$categories = $category->categories(); 
					    foreach($categories as $category) { 
					  ?>
                            <tr>
                                <td><?= $category['id'] ?></td>
			                    <td><?= $category['name'] ?></td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="/store/edit_category.php?cat_id=<?= $category['id'] ?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="/store/submit_category.php?catid=<?= $category['id'] ?>" method="POST" style="display: inline;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" name="delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
						    } 
						?>
                    </tbody>
                </table>
		
</div>
<div class='col-md-2'></div>
</div>
<?php
	include 'foot.php';
?>