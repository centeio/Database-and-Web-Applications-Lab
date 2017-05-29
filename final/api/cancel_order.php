<?php
include_once('../config/init.php');
include_once($BASE_DIR .'database/orders.php');

session_start();

try{
    if($_SESSION['is_admin']){
        cancelOrder($_POST['order']);
        echo json_encode(array("result"=>"success"));
    }else{
        echo json_encode(array("result"=>"failure"));
    }
}
catch(PDOException $ex){               
    echo json_encode(array("result"=>"failure"));
}
?>