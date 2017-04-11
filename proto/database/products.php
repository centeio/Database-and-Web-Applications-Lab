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