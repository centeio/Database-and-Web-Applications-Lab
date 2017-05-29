<?php
include_once('../config/init.php');
include_once($BASE_DIR .'database/products.php');

try{
    updateShoppingBag($_SESSION['user_id'],$_POST['product'],$_POST['quantity']);
    echo json_encode(array("result"=>"success"));
}
catch(PDOException $ex){               
    echo json_encode(array("result"=>"failure"));
}
?>