<?php
  
  function getAllAvailableProducts() {
    global $conn;
    $stmt = $conn->prepare("SELECT product.id AS id, name, price, COALESCE(AVG(rate),0) AS rate, COUNT(review.id) AS count 
                            FROM product LEFT OUTER JOIN review ON (review.idproduct = product.id)
                            WHERE availability = TRUE
                            GROUP BY product.id, price, name
                            ORDER BY rate DESC;");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getBestSellers() {
    global $conn;
    $stmt = $conn->prepare("SELECT idproduct AS id, name, price, AVG(rate) AS rate, COUNT(review.id) AS count 
                            FROM product JOIN review ON (review.idproduct = product.id) 
                            WHERE availability = TRUE
                            GROUP BY idproduct, price, name
                            HAVING AVG(rate) >= 0 
                            ORDER BY rate DESC
                            LIMIT 6;");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getFilteredProducts($filter) {
    global $conn;
    $stmt = $conn->prepare("SELECT DISTINCT id, name, price, rate, count
                            FROM (SELECT product.id AS id, name, price, COALESCE(AVG(rate),0) AS rate, COUNT(review.id) AS count 
                                FROM product LEFT OUTER JOIN review ON (review.idproduct = product.id)
                                WHERE availability = TRUE
                                GROUP BY product.id, price, name) p 
                            JOIN kind ON p.id = idproduct
                            WHERE " . $filter . "
                            ORDER BY rate DESC;");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getCategories() {
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM category;");
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
  
  function addNewProduct($name, $price, $stock, $details){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO product (name, price, stock, details, idPromotion, idSpecialOccasion) 
                            VALUES (?, ?, ?, ?, NULL, NULL);");
    if($stmt->execute(array($name, $price, $stock, $details))){
        $result['status'] = 'Success';
        $result['last_id'] = $conn->lastInsertId();
    }
    else{
        $result['status'] = $conn->errorInfo();
    }
    
    return $result;
  }
  
  function addNewCategoryToProduct($productId, $categoryId){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO \"kind\" (idProduct, idCategory)
                            VALUES (?, ?);");
    $stmt->execute(array($productId, $categoryId));
    
    return $result;
  }
  
  function deleteProduct($id){
    global $conn;
    $stmt = $conn->prepare("UPDATE product
                            SET availability = FALSE
                            WHERE id = ?;");
    if($stmt->execute(array($id))){
        $result['status'] = 'Success';
    }
    else{
        $result['status'] = $conn->errorInfo();
    }
    
    return $result;
  }
?>