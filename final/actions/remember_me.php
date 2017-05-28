<?
//Testing Remeber Me  
if(!isset($_SESSION['user_id']) && isset($_COOKIE["selector"]) && isset($_COOKIE["validator"])){
    checkAuthentication();
}

function checkAuthentication() {
    global $conn;
      
    $stmt = $conn->prepare("SELECT *
                            FROM auth_tokens 
                            WHERE selector = ?");
      
    $stmt->execute(array($_COOKIE["selector"]));
    
    $row = $stmt->fetch();
      
    if($row) {
        if(hash('sha256', $_COOKIE["validator"]) == $row['hashedValidator']){
            session_start();
            $_SESSION['user_id'] = $row['userid'];
            if($row['userid'] < 3){
                $_SESSION['is_admin'] = true;
            }
            else{
                $_SESSION['is_admin'] = false;
            }
            return true;
        }
    }

    return false;
}
?>