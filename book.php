<?php
class Book
{
	var $id;
	var $name;
	var $price;
	var $description;
	var $user_id;
	var $category_id;
	var $subcategory_id;

	private static $conn = Null;

	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','BookStore');
		}

		if($id!=-1) {
			$query = "select * from book where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$book = mysqli_fetch_assoc($result);
			$this->id = $book['id'];
			$this->name = $book['name'];
			$this->user_id = $book['user_id'];
			$this->category_id = $book['category_id'];
			$this->subcategory_id = $book['subcategory_id'];
		}
	}

	function insert() {
		$query = "insert into book(name,price,description,user_id,category_id,subcategory_id) 
		values('$this->name','$this->price','$this->description','$this->user_id','$this->category_id','$this->subcategory_id')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	} 

	function delete($id)
	{
		$query = "delete from book where id = '$id'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}
	function update() {
		$query = "update book set name='$this->name' where id='$this->id'";
		mysqli_query(self::$conn,$query);
	}

	function updateWithId($id) {
		$query = "update book set name='$this->name',price='$this->price',description=
		'$this->description',category_id='$this->category_id',subcategory_id='$this->subcategory_id'
		 where id='$id'";
		mysqli_query(self::$conn,$query);
	}
	function books() {
		$query = "select * from book";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data []= $row;
		}
		return $data;
	}
	function getBook($id) {
		$query = "select * from book where id='$id' limit 1";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data []= $row;
		}
		return $data;
		
	}
	// delete when category deleted
	function delete_by_cat($category_id)
	{
		$query = "delete from book where category_id = '$category_id'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}
	// delete when subcategory deleted
	function delete_by_subcat($subcategory_id)
	{
		$query = "delete from book where subcategory_id = '$subcategory_id'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}
}



?>