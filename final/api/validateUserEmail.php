<?php
    include_once('../config/init.php');
    include_once($BASE_DIR .'database/users.php');
	
    echo validateEmail($_POST['email']);
?>