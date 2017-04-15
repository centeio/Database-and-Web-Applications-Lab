<?php
include_once('../config/init.php');

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'verifyUser' :
            echo (verifyUser($_POST['username'],$_POST['password']) == false? "false": "true");
            break;
    }
}

  function verifyUser($username, $password) {
    
    global $conn;
    $stmt = $conn->prepare("SELECT id 
                            FROM \"user\" 
                            WHERE username = ? AND password = ?");
    //TODO: hash password
    $stmt->execute(array($username, $password));
    
    $row = $stmt->fetch();
    if($row){
        session_start();
        $_SESSION['user_id'] = $row['id'];
    }

    return $row;
  }
  
  function getUser($id) {
    
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"user\" 
                            WHERE id = ?");
    //TODO: hash password
    $stmt->execute(array($id));

    return $stmt->fetch();
  }
?>
