<?php
	require_once('/inc/db.php');
	require_once('/inc/bcrypt.php');
	require_once('/inc/classes.php');
 
$email = $_POST['email'];
$password = $_POST['key'];

$user = new user();
$selectedUser = $user->getByEmailAddress($email);
$user->authenticateUser($password);




?>