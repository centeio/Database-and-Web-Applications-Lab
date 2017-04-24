<?php
if(isset($_POST['action']) && !empty($_POST['action'])) {
    include_once('../config/init.php');
    
    $action = $_POST['action'];
    switch($action) {
        case 'verifyUser' :
            echo (verifyUser($_POST['username'],$_POST['password']) == false? "false": "true");
            break;
    }
}

  function verifyUser($username, $password) {
    
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM \"user\" 
                            WHERE username = ? AND password = ?");
    //TODO: hash password
    $stmt->execute(array($username, $password));
    
    $row = $stmt->fetch();
    if($row){
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['is_admin'] = $row['isadmin'];
    }

    return $row;
  }
  
  function getClient($id) {
    
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"user\" NATURAL JOIN client 
                            WHERE id = ?");
    
    $stmt->execute(array($id));

    return $stmt->fetch();
  }
  
  function getClients() {
    
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"user\" NATURAL JOIN client");
    
    $stmt->execute();

    return $stmt->fetchAll();
  }
  
  function getAddresses($iduser) {
    
    global $conn;
    $stmt = $conn->prepare("SELECT iduser, idaddress, address, zipnumber, city 
                            FROM \"client-address\" NATURAL JOIN client NATURAL JOIN address NATURAL JOIN \"zip-code\"
                            WHERE iduser = ?;");
    
    $stmt->execute(array($iduser));

    return $stmt->fetchAll();
  }
  
  function getFavorites($iduser) {
    
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM favorite JOIN product ON (idproduct = product.id) 
                            WHERE iduser = ?;");
    
    $stmt->execute(array($iduser));

    return $stmt->fetchAll();
  }
?>
