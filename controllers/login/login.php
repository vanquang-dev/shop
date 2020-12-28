<?php 
	session_start();
	include_once '../../models/database.php';
	include_once '../objects/login.php';

	$login = new Login();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$login->username = $username;
	$read = $login->login();
	$check_user = mysqli_num_rows($read);
	
	if ($check_user != 1) {
		header('location: ../../login.php');
		die();
	}
	$data = mysqli_fetch_array($read);
	$password_db = $data['password'];
	if (password_verify($password, $password_db)) {
		$_SESSION['user_id'] = $data['id'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['kind'] = $data['kind'];
		header('location: ../../');
		die();
	} else {
		unset($_SESSION['check_login_user']);
		die();
	}
?>