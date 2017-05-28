<?
include_once('../config/init.php');
include_once($BASE_DIR .'database/products.php');

echo editProduct($_POST['id'], $_POST['name'], $_POST['price'], $_POST['stock'], $_POST['details'], $_POST['newCategories']);
?>