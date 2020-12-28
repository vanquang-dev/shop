<?php 
	/**
	 * 
	 */
	class Order extends Database
	{
		public $table_name = 'orders';
		public $id;
		public $id_user;
		public $id_product;
		public $address;
		public $number;
		public $price;
		public $status;

		public function add() {
		    $query = "INSERT INTO `".$this->table_name."` (
		    `id_user`, `id_product`, `number`, `price`, `address`, `status`) VALUES (
		    '".$this->id_user."',
		    '".$this->id_product."',
		    '".$this->number."',
		    '".$this->price."',
		    '0',
		    '0'
		    )";
		    return mysqli_query($this->get_connection(), $query);
		}

		function get_orders() {
			$query = "SELECT *, `orders`.`id` AS `order_id`, `orders`.`price` AS `price_order` FROM `".$this->table_name."` JOIN `products` ON `orders`.`id_product` = `products`.`id` WHERE `id_user` = '".$this->id_user."' AND `status` = '0'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}

		function get_order() {
			$query = "SELECT *, `orders`.`id` AS `order_id`, `orders`.`price` AS `price_order` FROM `".$this->table_name."` JOIN `products` ON `orders`.`id_product` = `products`.`id` WHERE `orders`.`id` = '".$this->id."' AND `status` = '1'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}

		function get_orders_success() {
			$query = "SELECT *, `orders`.`id` AS `order_id`, `orders`.`price` AS `price_order` FROM `".$this->table_name."` JOIN `products` ON `orders`.`id_product` = `products`.`id` WHERE `id_user` = '".$this->id_user."' AND `status` = '1'";
			$query_statement = mysqli_query($this->get_connection(), $query);
			return $query_statement;
		}

		public function update() {
		    $query = "UPDATE `".$this->table_name."` SET `status` = '1', `address` = '".$this->address."' WHERE `id`= ".$this->id;
		    $query_attachment = mysqli_query($this->get_connection(), $query);
		    return $query_attachment;
		}

		function destroy() {
			$query = "DELETE FROM `".$this->table_name."` WHERE `id` = ".$this->id;
			return mysqli_query($this->get_connection(), $query);
		}
	}

?>