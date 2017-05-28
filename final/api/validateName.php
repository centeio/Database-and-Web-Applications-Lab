<?php
    include_once('../config/init.php');
    include_once($BASE_DIR .'database/users.php');
	
    echo validateName($_POST['name'], $_POST['type']);
?>