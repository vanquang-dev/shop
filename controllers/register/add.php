<?php 
	session_start();
	include_once '../../models/database.php';
	include_once '../objects/register.php';

	$register = new Register();

	$username = $_POST['username'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];

	$register->username = $username;
	$check = mysqli_num_rows($register->check());
	
	if ($check != 0) {
		header('location: ../../register.php');
		die();
	} else if ($password != $re_password) {
		header('location: ../../register.php');
		die();
	}

	$register->password = password_hash($password, PASSWORD_DEFAULT);
	$register->add();

	$read = $register->get_user();
	$data = mysqli_fetch_array($read);

	$_SESSION['user_id'] = $data['id'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['kind'] = $data['kind'];
	header('location: ../../');
	die();
	
?>