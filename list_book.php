<?php
	session_start();
    if(!isset($_SESSION['user_id'])) {
        header('location:login.php');
    }
	
	include 'head.php';
	include 'category.php';
	include 'book.php';
    include 'subcategory.php';

    $book = new Book();
    $category = new Category();
    $subcategory = new SubCategory();
?>
<div class='row'></div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-8'>
	<h2 class='col-md-12 text-primary'><i class='glyphicon glyphicon-list'></i>
		All Books...</h2>
	 <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                        	<th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php
					  	$books = $book->books(); 
					    foreach($books as $book) { 
					  ?>
                            <tr>
                                <td><?= $book['id'] ?></td>
			                    <td><?= $book['name'] ?></td>
                                <td><?= $book['price'] ?></td>
                                <td><?= $book['description'] ?></td>
                                <?php
                                $catname=$category->get_category_name($book['category_id']);
                                foreach ($catname as $name) {
                                    echo "<td>". $name['name']."</td>";
                                }
                                ?>
                                <?php
                                $subcatname=$subcategory->get_subcategory_name($book['subcategory_id']);
                                foreach ($subcatname as $name) {
                                    echo "<td>". $name['name']."</td>";
                                }
                                ?>
                               
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="/store/edit_book.php?book_id=<?= $book['id'] ?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="/store/submit_book.php?book_id=<?= $book['id'] ?>" method="POST" style="display: inline;">
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