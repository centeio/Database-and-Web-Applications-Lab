<?php
    $headers = "Content-type:text/plain;charset=UTF-8" . "\r\n";
    $headers .= 'From: <' . $_POST['email'] . '>' . "\r\n";
    mail("tiagoalmeida.95@hotmail.com", $_POST['subject'], $_POST['message'], $headers);
?>