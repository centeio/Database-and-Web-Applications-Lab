<?php
    include_once('../config/init.php');
    include_once('../database/users.php');

    updatePassword($_POST['NewPass']);

    header("Location: " . $_SERVER["HTTP_REFERER"]);
?>