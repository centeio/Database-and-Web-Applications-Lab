<?php
    include_once('../config/init.php');
    include_once('../database/users.php');

    if($_POST['username'] != "")
        updateUsername($_POST['username']);

    if($_POST['first_name'] != "")
        updateFirstname($_POST['first_name']);

    if($_POST['last_name'] != "")
        updateLastname($_POST['last_name']);

    if($_POST['email'] != "")
        updateEmail($_POST['email']);

    if($_POST['phone'] != "")
        updatePhonenumber($_POST['phone']);
    else
        updatePhonenumber(null);

    if($_POST['taxpayernumber'] != "")
        updateTaxpayernumber($_POST['taxpayernumber']);
    else
        updateTaxpayernumber(null);

     header("Location: " . $_SERVER["HTTP_REFERER"]);
?>