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
    $stmt = $conn->prepare("SELECT idproduct AS id, name, price, AVG(rate) AS rate, COUNT(review.id) AS count 
                            FROM product JOIN review ON (review.idproduct = product.id) 
                            GROUP BY idproduct, price, name
                            HAVING AVG(rate) >= 0 
                            ORDER BY rate DESC
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
                            WHERE idProduct = ?
			    ORDER BY date DESC;");
    $stmt->execute(array($productId));
    return $stmt->fetchAll();
  }
  
  function isFavorite($productid, $userid) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM favorite 
                            WHERE idproduct = ? AND iduser = ?");
    $stmt->execute(array($productid,$userid)); 
    return $stmt->fetchAll();
  }
  
  function addFavorite($userid, $productid) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO favorite (iduser,idproduct) 
                            VALUES (?,?)");
    $stmt->execute(array($userid, $productid)); 
    return;
  }
  
  function removeFavorite($userid, $productid) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM favorite 
                            WHERE iduser = ? AND idproduct = ?");
    $stmt->execute(array($userid, $productid)); 
    return;
  }
  
  function addToShoppingBag($userid, $productid, $quantity = 1) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO \"to-go\" (iduser,idproduct,quantity) 
                            VALUES (?,?,?)");
    $stmt->execute(array($userid, $productid, $quantity)); 
    return;
  }
  
  function addAnotherToShoppingBag($userid, $productid) {
    global $conn;
    $stmt = $conn->prepare("UPDATE \"to-go\" 
                            SET quantity = quantity + 1 
                            WHERE iduser = ? AND idproduct = ?;");
    $stmt->execute(array($userid, $productid)); 
    return;
  }
?>