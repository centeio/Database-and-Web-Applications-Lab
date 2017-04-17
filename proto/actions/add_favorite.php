<?php
include_once('../config/init.php');

    if (isset($_POST["product"])) {
        global $conn;
        $stmt = $conn->prepare("INSERT into favorite (iduser,idproduct) values (?,?)");
        $stmt->execute(array($_SESSION['user_id'],$_POST["product"]));

        echo json_encode(array("result"=>true));
    }else{  
        echo json_encode(array("result"=>false));
    }
?>