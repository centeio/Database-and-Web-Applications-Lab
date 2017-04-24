<?php
include_once('../config/init.php');
include_once($BASE_DIR .'database/products.php');

try{
    addToShoppingBag($_POST['user'],$_POST["product"]);
    echo json_encode(array("result"=>"new"));
}
catch(PDOException $ex){
    if($ex->getCode() == 23505){                
        addAnotherToShoppingBag($_POST['user'],$_POST["product"]);
        echo json_encode(array("result"=>"updated"));
    }else{
        echo json_encode(array("result"=>"false"));
    }
}
?>