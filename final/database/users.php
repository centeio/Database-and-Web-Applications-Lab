<?php
if(isset($_POST['action']) && !empty($_POST['action'])) {
    include_once('../config/init.php');
    
    $action = $_POST['action'];
    switch($action) {
        case 'verifyUser' :
            echo (verifyUser($_POST['username'],$_POST['password'], $_POST['rememberMe']) == false? "false": "true");
            break;
        case 'checkPassword' :
            echo (checkPassword($_POST['password']) == false? "false": "true");
            break;
    }
}

  function updatePasswords() {
    global $conn;
        
    $stmt = $conn->prepare("SELECT * FROM \"user\";");
    $stmt->execute();

    $row = $stmt->fetchAll();
      
    foreach($row as $key => $value) {
        //hash password
        $options = ['cost' => 12];
        $hash = password_hash($value['password'], PASSWORD_DEFAULT, $options);
        
        $stmt = $conn->prepare("UPDATE \"user\" SET \"password\" = ? WHERE id = ?;");
        $stmt->execute(array($hash, $value['id']));
    }
      
    return "true";
  }

  function validateUsername($username) {
      
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $username))
        return "Username needs to start with a letter and can only contain letters and numbers.";
    else {
        global $conn;
        
        $stmt = $conn->prepare("SELECT *
                            FROM \"user\" 
                            WHERE username = ?");
        $stmt->execute(array($username));
        
        $row = $stmt->fetch();
        
        if($row)
            if(!isset($_SESSION['user_id']) or (isset($_SESSION['user_id']) and $row['id'] != $_SESSION['user_id']))
                return "Username already in use.";
            else
               return "User username.";
        else
            return "true";
    }
  }

  function validateEmail($email) {
      
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        return "This is not a valid email.";
      
    else {
        global $conn;
        
        $stmt = $conn->prepare("SELECT *
                            FROM \"user\" 
                            WHERE email = ?");
        $stmt->execute(array($email));
        
        $row = $stmt->fetch();
        
        if($row)
            if(!isset($_SESSION['user_id']) or (isset($_SESSION['user_id']) and $row['id'] != $_SESSION['user_id']))
                return "Email already in use.";
            else
               return "User email.";
        else
            return "true";
    }
  }

  function validateName($name, $type) {
    global $conn;
      
    if (!preg_match("/^[a-zA-Z][a-zA-Z ]*$/", $name))
        return "false";
    else {
        if(isset($_SESSION['user_id'])) {
            
            $stmt = $conn->prepare("SELECT * 
                            FROM \"user\" NATURAL JOIN client 
                            WHERE id = ?");
            $stmt->execute(array($_SESSION['user_id']));
            
            $row = $stmt->fetch();
            
            if($type == "first") {
                if($name == $row['firstname'])
                    return "User name.";
                else
                    return "true";
            } else {
                if($name == $row['lastname'])
                    return "User name.";
                else
                    return "true";
            }
        } else
            return "true";
    }
  }
  
  //Remembe Me
  function randomKey($length) {
        $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));

        for($i=0; $i < $length; $i++) {
            $key .= $pool[mt_rand(0, count($pool) - 1)];
        }
        return $key;
    }

    function rememberUser($id) {
        global $conn;
        
        $selector = randomKey(12);
        $validator = randomKey(20);
        $hash = hash('sha256', $validator);
        $expires = strtotime('+1 week');
            
        $stmt = $conn->prepare("INSERT INTO auth_tokens (selector , \"hashedValidator\" , userid, expires) values (?, ?, ?, ?);");
        $stmt->execute(array($selector, $hash, $id, date('Y-m-d H:i:s', $expires)));
        
        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            print_r($conn->errorInfo());
            
            return false;
        }
        
        setcookie("selector", $selector, $expires, '/~lbaw1611/final');
        setcookie("validator", $validator, $expires, '/~lbaw1611/final');
          
        return true;
    }
    //End remember me

  function verifyUser($username, $password, $rememberMe) {
    
    global $conn;
      
    $stmt = $conn->prepare("SELECT *
                            FROM \"user\" 
                            WHERE username = ?");
      
    $stmt->execute(array($username));
    
    $row = $stmt->fetch();
      
    if($row) {
        if(password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['is_admin'] = $row['isadmin'];
            
            if($rememberMe){
                rememberUser($row['id']);
            }
            else{
                setcookie("selector", "", -1, '/~lbaw1611/final');
                setcookie("validator", "", -1, '/~lbaw1611/final');
            }
            
            return true;
        }
    }

    return false;
  }

  function register($username, $email, $password, $firstName, $lastName) {
    
    global $conn;
      
    //hash password
    $options = ['cost' => 12];
    $hash = password_hash($password, PASSWORD_DEFAULT, $options);
      
    try {
        $conn->beginTransaction();
        
        $stmt = $conn->prepare("INSERT INTO \"user\" (username , email , \"password\") values (?, ?, ?);");
        $stmt->execute(array($username, $email, $hash));
        
        $stmt = $conn->prepare("INSERT INTO \"client\" (id, firstName, lastName, phoneNumber, taxPayerNumber)   
                                        (SELECT id, ?, ?, null, null from \"user\" WHERE username = ?);");
        $stmt->execute(array($firstName, $lastName, $username));
        
        $conn->commit();
        
        $stmt = $conn->prepare("SELECT *
                            FROM \"user\" 
                            WHERE username = ?");
        $stmt->execute(array($username));

        $row = $stmt->fetch();
        
        if($row) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['is_admin'] = $row['isadmin'];
            return "true";
        }
        
        return "Something went wrong with the server. Apologies!";

    } catch(Exception $e) {
        $conn->rollBack();
        return "Something went wrong with the server. Apologies!";
    }
  }


  function checkPassword($password) {
    
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM \"user\" 
                            WHERE id = ?");
    //TODO: hash password
    $stmt->execute(array($_SESSION['user_id']));
    $row = $stmt->fetch();
      
    if($row) {
        if(password_verify($password, $row['password'])) {
            return true;
        }
    }

    return false;
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
    $stmt = $conn->prepare("SELECT iduser, idaddress, address, zipnumber, city, country 
                            FROM \"client-address\", address, \"zip-code\"
                            WHERE \"client-address\".iduser = ? AND \"client-address\".idaddress = address.id AND address.idzipcode = \"zip-code\".id ORDER BY idaddress ASC;");
    
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

  function updateUsername($username) {
    
    global $conn;
    $stmt = $conn->prepare("UPDATE \"user\" SET username = ? WHERE id = ?;");
    
    return $stmt->execute(array($username, $_SESSION['user_id']));
  }

  function updateFirstname($firstname) {
    
    global $conn;
    $stmt = $conn->prepare("UPDATE \"client\" SET firstname = ? WHERE id = ?;");
    
    return $stmt->execute(array($firstname, $_SESSION['user_id']));
  }

  function updateLastname($lastname) {
    
    global $conn;
    $stmt = $conn->prepare("UPDATE \"client\" SET lastname = ? WHERE id = ?;");
    
    return $stmt->execute(array($lastname, $_SESSION['user_id']));
  }

  function updateEmail($email) {
    
    global $conn;
    $stmt = $conn->prepare("UPDATE \"user\" SET email = ? WHERE id = ?;");
    
    return $stmt->execute(array($email, $_SESSION['user_id']));
  }

  function updatePhonenumber($phonenumber) {
    
    global $conn;
    $stmt = $conn->prepare("UPDATE \"client\" SET phonenumber = ? WHERE id = ?;");
    
    return $stmt->execute(array($phonenumber , $_SESSION['user_id']));
  }

  function updateTaxpayernumber($taxpayernumber) {
    
    global $conn;
    $stmt = $conn->prepare("UPDATE \"client\" SET taxpayernumber = ? WHERE id = ?;");
    
    return $stmt->execute(array($taxpayernumber, $_SESSION['user_id']));
  }

  function updatePassword($password) {
    
    global $conn;
    $stmt = $conn->prepare("UPDATE \"user\" SET password = ? WHERE id = ?;");
    
    return $stmt->execute(array($password, $_SESSION['user_id']));
  }

  function addAddress($streetname, $zipcode, $cityname) {
    global $conn;
    
    $stmtAddress = $conn->prepare("SELECT * FROM \"address\" WHERE \"address\".address = ?;");
    $stmtAddress->execute(array($streetname));
      
    $stmtZipCode = $conn->prepare("SELECT * FROM \"zip-code\" WHERE zipnumber = ? AND city = ?;");
    $stmtZipCode->execute(array($zipcode, $cityname));

    $addressResult = $stmtAddress->fetchAll();
    $zipCodeResult = $stmtZipCode->fetch();
      
    $addressAssociatedZip = false;
    $addressID = 0;
      
    foreach($addressResult as $key => $value) {
        if($value['idzipcode'] == $zipCodeResult['id']) {
            $addressID = $value['id'];
            $addressAssociatedZip = true;
        }
    }
    
    /* CASE WHEN ADDRESS AND ZIP-CODE ALREADY EXIST AND THE ADDRESS IS ASSOCIATES WITH THE ZIP-CODE */
    if($addressResult and $zipCodeResult and $addressAssociatedZip) {
        
        try {
            $stmt = $conn->prepare("INSERT INTO \"client-address\" (iduser, idaddress) VALUES (?, ?);");
            $stmt->execute(array($_SESSION['user_id'], $addressID));
            
            $answer['status'] = "true";
            $answer['addressID'] = $addressResult[0]['id'];
            
            return json_encode($answer);
            
        } catch(Exception $e) {
            $answer['status'] = "Address already added!";
            
            return json_encode($answer);
        }
        
    }
    
    /* (CASE WHEN ADDRESS AND ZIP-CODE ALREADY EXIST BUT ADDRESS IS NOT ASSOCIATES WITH THE ZIP-CODE) 
        OR 
        (ADDRESS DOES NOT EXIST BUT ZIP-CODE DOES) */
    if(($addressResult and $zipCodeResult and !$addressAssociatedZip)
        or (!addressResult and $zipCodeResult)){
            
        try {
            $conn->beginTransaction();

            $stmt = $conn->prepare("INSERT INTO \"address\" (address, idzipcode) VALUES (?, ?);");
            $stmt->execute(array($streetname, $zipCodeResult['id']));

            $stmt = $conn->prepare("INSERT INTO \"client-address\" (iduser, idaddress) 
                                    (SELECT ?, id FROM \"address\" WHERE \"address\".address = ? AND \"address\".idzipcode = ?);");

            $stmt->execute(array($_SESSION['user_id'], $streetname, $zipCodeResult['id']));
            
            $conn->commit();
            
            $stmt = $conn->prepare("SELECT * FROM \"address\" WHERE \"address\".address = ? AND \"address\".idzipcode = ?;");

            $stmt->execute(array($streetname, $zipCodeResult['id']));
            $row = $stmt->fetch();
            
            $answer['status'] = "true";
            $answer['addressID'] = $row['id'];
            
            return json_encode($answer);

        } catch(Exception $e) {
            $conn->rollBack();
            
            $answer['status'] = "Something went wrong with the server. Apologies.";
            
            return json_encode($answer);
        }
    }
    
    /* CASE WHEN NEITHER THE ADDRESS NOR THE ZIP-CODE EXIST */
    if(!$zipCodeResult)  {

        try {
            $conn->beginTransaction();

            $stmt = $conn->prepare("INSERT INTO \"zip-code\" (zipnumber, city) VALUES (?, ?);");
            $stmt->execute(array($zipcode, $cityname));

            $stmt = $conn->prepare("INSERT INTO \"address\" (address, idzipcode) 
                                        (SELECT ?, id FROM \"zip-code\" WHERE zipnumber = ? AND city = ?);");
            $stmt->execute(array($streetname, $zipcode, $cityname));

            $stmt = $conn->prepare("INSERT INTO \"client-address\" (iduser, idaddress) 
                                    (SELECT ?, \"address\".id FROM \"address\", \"zip-code\" 
                                        WHERE \"address\".address = ? AND \"address\".idzipcode = \"zip-code\".id
                                            AND \"zip-code\".zipnumber = ? AND \"zip-code\".city = ?);");
            $stmt->execute(array($_SESSION['user_id'], $streetname, $zipcode, $cityname));
            
            $conn->commit();
            
            $stmt = $conn->prepare("SELECT \"address\".id FROM \"address\", \"zip-code\" 
                                        WHERE \"address\".address = ? AND \"address\".idzipcode = \"zip-code\".id
                                            AND \"zip-code\".zipnumber = ? AND \"zip-code\".city = ?;");
            $stmt->execute(array($streetname, $zipcode, $cityname));
            
            $row = $stmt->fetch();
            
            $answer['status'] = "true";
            $answer['addressID'] = $row['id'];
            
            return json_encode($answer);

        } catch(Exception $e) {
            $conn->rollBack();
            
            $answer['status'] = "Something went wrong with the server. Apologies.";
            
            return json_encode($answer);
        }
    }
      
    $answer['status'] = "false";
    return json_encode($answer);
  }
  
  function deleteAddress($addressID) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM \"client-address\" WHERE idaddress = ? AND iduser = ?;");

    return $stmt->execute(array($addressID, $_SESSION['user_id']));
  }

  function desactivate($clientID) {
       global $conn;
       $stmt = $conn->prepare("UPDATE \"client\" SET isremoved = true WHERE id = ?;");
     
       return $stmt->execute(array($clientID));
  }

  function activate($clientID) {
       global $conn;
       $stmt = $conn->prepare("UPDATE \"client\" SET isremoved = false WHERE id = ?;");
     
       return $stmt->execute(array($clientID));
  }

?>
