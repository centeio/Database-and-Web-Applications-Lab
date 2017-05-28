<?php
include_once('../config/init.php');
include_once($BASE_DIR .'database/users.php');

session_start();

    if (isset($_POST["client"])) {
        try{
            if ($_POST["action"] === "block"){
                desactivate($_POST["client"]);
                echo json_encode(array("result"=>"desactivate"));
            }
            else if ($_POST["action"] === "unblock") {
                activate($_POST["client"]);
                echo json_encode(array("result"=>"activate"));
            }
            
        }
        catch(PDOException $ex){
            echo json_encode(array("result"=>"exception"));
        }
         

    }else{  
        echo json_encode(array("result"=>false));
    }
?>