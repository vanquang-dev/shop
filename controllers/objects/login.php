<?php 
	/**
	 * 
	 */
	class Login extends Database
	{
		public $table_name = 'users';
		public $id;
		public $username;
		public $password;
		public $created;

		function login() {
			$query = "SELECT * FROM `".$this->table_name."` WHERE `username` = '".$this->username."'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}
	}

?>