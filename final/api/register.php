<?php
include_once('../config/init.php');
include_once($BASE_DIR .'database/users.php');

echo register($_POST['username'], $_POST['email'], $_POST['password'], $['firstName'], $['lastName']);
?>