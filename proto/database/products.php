<?php
  
  function getAllAvailableProducts() {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM product
                            WHERE availability = TRUE
                            ORDER BY id ASC;");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getBestSellers() {
    global $conn;
    $stmt = $conn->prepare("SELECT idproduct AS id, name, price, SUM(quantity) AS sum
                            FROM \"to-go\" JOIN product ON (idproduct = product.id) 
                            WHERE availability = TRUE
                            GROUP BY idproduct, name, price
                            ORDER BY sum DESC
                            LIMIT 6;");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getShoppingBag($userId) {
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM \"to-go\" JOIN product ON (idproduct = product.id)
                            WHERE iduser = ?;");
    $stmt->execute(array($userId));
    return $stmt->fetchAll();
  }
    
  function getAllProductReviewsInfo($productId) {
    global $conn;
    $stmt = $conn->prepare("SELECT AVG(rate) AS average, COUNT(id) AS count
                            FROM review
                            WHERE idproduct = ?;");
    $stmt->execute(array($productId));
    return $stmt->fetch();
  }
  
  function getAllProductImages($productId) {
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM image
                            WHERE idproduct = ?
                            ORDER BY id ASC;");
    $stmt->execute(array($productId));
    return $stmt->fetchAll();
  }
  
  function getProduct($productId) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM product
                            WHERE id = ?;");
    $stmt->execute(array($productId));
    return $stmt->fetch();
  }
  
  function getAllProductReviews($productId) {
    global $conn;
    $stmt = $conn->prepare("SELECT idproduct, rate, date, comment, firstname, lastname
                            FROM review JOIN Client
                            ON idUser = Client.id
                            WHERE idProduct = ?;");
    $stmt->execute(array($productId));
    return $stmt->fetchAll();
  }
?>