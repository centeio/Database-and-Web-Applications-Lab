<?php
include_once('../config/init.php');
include_once($BASE_DIR .'database/products.php');

try{
    removeShoppingBag($_SESSION['user_id'],$_POST['product']);
    echo json_encode(array("result"=>"success"));
}
catch(PDOException $ex){               
    echo json_encode(array("result"=>"failure"));
}
?>