<?
include_once('../config/init.php');
include_once($BASE_DIR .'database/users.php');

echo addAddress($_POST['streetname'], $_POST['zipcode'], $_POST['cityname']);
?>