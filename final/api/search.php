<?
include_once('../config/init.php');
include_once($BASE_DIR .'database/products.php');

echo search($_POST['input']);
?>