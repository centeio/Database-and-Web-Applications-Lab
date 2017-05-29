<?php
include_once('../config/init.php');
include_once($BASE_DIR .'database/products.php');

session_start();

    if (isset($_POST["product"])) {
        try{
            addFavorite($_SESSION['user_id'],$_POST["product"]);
            echo json_encode(array("result"=>"new"));
        }
        catch(PDOException $ex){
            if($ex->getCode() == 23505){                
                removeFavorite($_SESSION['user_id'],$_POST["product"]);
                echo json_encode(array("result"=>"duplicate"));
            }else{
                echo json_encode(array("result"=>"false"));
            }
        }
         

    }else{  
        echo json_encode(array("result"=>false));
    }
?>