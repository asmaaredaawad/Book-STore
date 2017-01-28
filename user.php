<?php
class User{
	var $name;
	var $id;
	var $password;
	var $email;
	
	

	private static $conn = Null;

	function __construct($id=-1) {
		if(self::$conn == Null) {
			self::$conn = mysqli_connect('localhost','root','iti','BookStore');
		}

		if($id!=-1) {
			$query = "select * from users where id=$id limit 1";
			$result = mysqli_query(self::$conn,$query);
			$user = mysqli_fetch_assoc($result);
			$this->id = $user['id'];
			$this->name = $user['name'];
			$this->password = $user['password'];
			$this->email = $user['email'];
			
		}
	}


	function insert() {
		$query = "insert into user(name,password,email) values('$this->name','$this->password','$this->email')";
		$result  = mysqli_query(self::$conn,$query);
		return mysqli_insert_id(self::$conn);
	}

	function if_exist($email) {
		$query = "select id from user where email='$email'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False;
	}

	function users() {
		$query = "select * from user";
		$result = mysqli_query(self::$conn,$query);
		$data = [];

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}

	function delete($id)
	{
		$query = "delete from students where id = '$id'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}
	function getUser($email,$password) {
		$query = "select * from user where email='$email' and password='$password' limit 1";
		$result = mysqli_query(self::$conn,$query);
		$user = mysqli_fetch_assoc($result);
		$this->id = $user['id'];
		$this->name = $user['name'];
		$this->password = $user['password'];
		$this->email = $user['email'];
	}
	function getUser_by_id($id) {
		$query = "select * from user where id='$id' limit 1";
		$result = mysqli_query(self::$conn,$query);
		$user = mysqli_fetch_assoc($result);
		$this->id = $user['id'];
		$this->name = $user['name'];
		$this->password = $user['password'];
		$this->email = $user['email'];
	}
	function checkBeforeLogin($email,$password) {
		$query = "select id from user where email='$email' and password='$password'";
		$result = mysqli_query(self::$conn,$query);
		return (mysqli_num_rows($result)>0)?True:False ;
	}

}

?>