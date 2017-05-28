<?php
  function getAllOrders() {
    
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"order\" 
                            ORDER BY id DESC;");
    
    $stmt->execute(array());

    return $stmt->fetchAll();
  }
  
  function getOrders($idClient) {
    
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"order\" 
                            WHERE idclient = ?;");
    
    $stmt->execute(array($idClient));

    return $stmt->fetchAll();
  }
  
  function getProductsFromOrder($idOrder) {
    
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"order-product\" JOIN product ON (idproduct = product.id) 
                            WHERE idorder = ?;");
    
    $stmt->execute(array($idOrder));

    return $stmt->fetchAll();
  }
  
  function getAdress($id) {
    
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM address NATURAL JOIN  \"zip-code\"
                            WHERE address.id = ?;");
    
    $stmt->execute(array($id));

    return $stmt->fetch();
  }
  
  function cancelOrder($id) {
    global $conn;
    
    $stmt = $conn->prepare("UPDATE \"order\"
                            SET state = 'canceled'
                            WHERE id = ?;");
    
    $stmt->execute(array($id));

    return $stmt->fetch();
  }

?>
