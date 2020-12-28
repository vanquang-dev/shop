<?php 
	/**
	 * 
	 */
	class Register extends Database
	{
		public $table_name = 'users';
		public $id;
		public $username;
		public $password;
		public $created;

		public function check() {
			$query = "SELECT * FROM `".$this->table_name."` WHERE `username` = '".$this->username."'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}

		public function add() {
		    $query = "INSERT INTO `".$this->table_name."` (
		    `username`, `password`, `kind`) VALUES (
		    '".$this->username."',
		    '".$this->password."',
		    '1'
		    )";
		    return mysqli_query($this->get_connection(), $query);
		}

		function get_user() {
			$query = "SELECT * FROM `".$this->table_name."` WHERE `username` = '".$this->username."' AND `password` = '".$this->password."'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}
	}

?>