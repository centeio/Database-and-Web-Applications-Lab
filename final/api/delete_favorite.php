<?php
include_once('../config/init.php');
include_once($BASE_DIR .'database/products.php');

try{
    removeFavorite($_POST['user'],$_POST['product']);
    echo json_encode(array("result"=>"success"));
}
catch(PDOException $ex){               
    echo json_encode(array("result"=>"failure"));
}
?>