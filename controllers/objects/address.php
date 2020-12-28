<?php 
	/**
	 * 
	 */
	class Address extends Database
	{
		public $table_name = 'address';
		public $id;
		public $id_user;
		public $name;
		public $city;
		public $district;
		public $address;
		public $number_phone;

		public function add() {
		    $query = "INSERT INTO `".$this->table_name."` (
		    `id_user`, `name`, `city`, `district`, `address`, `number_phone`) VALUES (
		    '".$this->id_user."',
		    '".$this->name."',
		    '".$this->city."',
		    '".$this->district."',
		    '".$this->address."',
		    '".$this->number_phone."'
		    )";
		    return mysqli_query($this->get_connection(), $query);
		}

		function get_address() {
			$query = "SELECT * FROM `".$this->table_name."` WHERE `id_user` = '".$this->id_user."'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}
	}

?>