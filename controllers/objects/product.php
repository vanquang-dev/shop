<?php 
	/**
	 * 
	 */
	class Product extends Database
	{
		public $table_name = 'products';
		public $id;
		public $name;
		public $price;
		public $image;

		public function add() {
		    $query = "INSERT INTO `".$this->table_name."` (
		    `name`, `price`, `image`) VALUES (
		    '".$this->name."',
		    '".$this->price."',
		    'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg'
		    )";
		    return mysqli_query($this->get_connection(), $query);
		}

		function get_product() {
			$query = "SELECT * FROM `".$this->table_name."` WHERE `id` = '".$this->id."'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}
	}

?>