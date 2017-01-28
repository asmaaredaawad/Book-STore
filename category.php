<?php
class Category{
	var $id;
	var $name;
	var $user_id;
	
	private static $conn = Null;

	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','BookStore');
		}

		if($id!=-1) {
			$query = "select * from category where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$category = mysqli_fetch_assoc($result);
			$this->id = $category['id'];
			$this->name = $category['name'];
			$this->user_id = $category['user_id'];

		}
	}

	function insert() {
		$query = "insert into category(name,user_id) values('$this->name','$this->user_id')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	} 

	function delete($id)
	{
		$query = "delete from category where id = '$id'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}
	function update() {
		$query = "update category set name='$this->name',user_id='$this->user_id' where id='$this->id'";
		mysqli_query(self::$conn,$query);
	}
	function getCategory($id) {
		$query = "select * from category where id='$id' limit 1";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data []= $row;
		}
		return $data;
		
	}
	function updateWithId($id) {
		$query = "update category set name='$this->name' where id='$id'";
		mysqli_query(self::$conn,$query);
	}

	function categories() {
		$query = "select * from category";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data []= $row;
		}
		return $data;
	}

	function get_category_name($id){
		$query="select name from category where id='$id'";
		$result= mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data []= $row;
		}
		return $data;
	}

	// function get_subcategory($id){
	// 	$query=" select C.name ,C.id ,S.name ,S.id from subcategory S JOIN category C ON C.id = S."$category_id ;
 //        $result = mysqli_query(self::$conn,$query);
	// 	$data = [];

	// 	while($row = mysqli_fetch_assoc($result)) {
	// 		$data []= $row;
	// 	}
	// 	return $data;
	// }


}

?>
