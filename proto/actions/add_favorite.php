<?php
include_once('../config/init.php');

session_start();

    if (isset($_POST["product"])) {
        global $conn;
        $stmt = $conn->prepare("INSERT into favorite (iduser,idproduct) values (?,?)");

        try{
        $stmt->execute(array($_SESSION['user_id'],$_POST["product"]));
        echo json_encode(array("result"=>"new"));
        }
        catch(PDOException $ex){
            if($ex->getCode() == 23505){                
                $stmt = $conn->prepare("DELETE from favorite WHERE iduser = ? AND idproduct = ?");
                $stmt->execute(array($_SESSION['user_id'],$_POST["product"]));
                echo json_encode(array("result"=>"duplicate"));
            }else{
                echo json_encode(array("result"=>"false"));
            }
        }
         

    }else{  
        echo json_encode(array("result"=>false));
    }
?>