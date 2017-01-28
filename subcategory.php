<?php
class SubCategory{
	var $id;
	var $name;
	var $user_id;
	var $category_id;
	
	private static $conn = Null;

	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','BookStore');
		}

		if($id!=-1) {
			$query = "select * from subcategory where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$sub_category = mysqli_fetch_assoc($result);
			$this->id = $sub_category['id'];
			$this->name = $sub_category['name'];
			$this->user_id = $sub_category['user_id'];
			$this->category_id = $sub_category['category_id'];


		}
	}

	function insert() {
		$query = "insert into subcategory(name,user_id,category_id) values('$this->name','$this->user_id','$this->category_id')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	} 

	function delete($id)
	{
		$query = "delete from subcategory where id = '$id'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}
	// delete when category deleted
	function delete_by_cat($category_id)
	{
		$query = "delete from subcategory where category_id = '$category_id'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}
	function update() {
		$query = "update subcategory set name='$this->name' where id='$this->id'";
		mysqli_query(self::$conn,$query);
	}
	// update when category updtate
	function updateWithCatId($id) {
		$query = "update subcategory set category_id='$this->category_id' where category_id='$id'";
		mysqli_query(self::$conn,$query);
	}
	// update subcategory directly
	function updateWithId($id) {
		$query = "update subcategory set name='$this->name',category_id='$this->category_id' where id='$id'";
		mysqli_query(self::$conn,$query);
	}

	function getSubcategories($category_id) //get subcategories of a specific category
	{
		$query = "select * from subcategory where category_id=".$category_id ;
		$result = mysqli_query(self::$conn,$query);
		$data = [];
		while($row = mysqli_fetch_assoc($result)) 
		{
			$data[] = $row;
		}
		return $data;
	}
	// list all subcategories
	function list_subcategories(){
		$query="select * from subcategory";
		$result = mysqli_query(self::$conn,$query);
		$data = [];
		while($row = mysqli_fetch_assoc($result)) 
		{
			$data[] = $row;
		}
		return $data;
	}
	// get subcategory
	function getSubCategory($id) {
		$query = "select * from subcategory where id='$id' limit 1";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data []= $row;
		}
		return $data;
		
	}
	function get_subcategory_name($id){
		$query="select name from subcategory where id='$id'";
		$result= mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data []= $row;
		}
		return $data;
	}
}

?>
