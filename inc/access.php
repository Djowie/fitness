<?php 
session_start();
$currentUser = unserialize($_SESSION['currentUser']);
echo '<pre>';
print_r($currentUser);
echo '</pre>';


?>
asd