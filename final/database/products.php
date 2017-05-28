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
    $stmt = $conn->prepare("SELECT review.id, idproduct, rate, date, comment, firstname, lastname
                            FROM review JOIN Client
                            ON idUser = Client.id
                            WHERE idProduct = ?
			    ORDER BY date DESC;");
    $stmt->execute(array($productId));
    return $stmt->fetchAll();
  }

  function getProductCategories($productID) {
    global $conn;
    $stmt = $conn->prepare("SELECT category.name
                            FROM kind, category
                            WHERE kind.idproduct = ? AND idcategory = category.id");
    $stmt->execute(array($productID));
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

    function removeShoppingBag($userid, $productid) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM \"to-go\"
                            WHERE iduser = ? AND idproduct = ?");
    return $stmt->execute(array($userid, $productid)); 

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

  function updateShoppingBag($userid, $productid, $quantity) {
    global $conn;
    $stmt = $conn->prepare("UPDATE \"to-go\" 
                            SET quantity = ? 
                            WHERE iduser = ? AND idproduct = ?;");
    $stmt->execute(array($quantity, $userid, $productid)); 
    return;
  }
  
  function addNewProduct($name, $price, $stock, $details, $categories, $image){
    global $conn;
    
    try {
        $conn->beginTransaction();

        // A set of queries; if one fails, an exception should be thrown
        $stmt = $conn->prepare("INSERT INTO product (name, price, stock, details, idPromotion, idSpecialOccasion) 
                                VALUES (?, ?, ?, ?, NULL, NULL);");
        $stmt->execute(array($name, $price, $stock, $details));
        $result['last_id'] = $conn->lastInsertId();
        
        foreach($categories as $key => $category){
            $stmt = $conn->prepare("INSERT INTO \"kind\" (idProduct, idCategory)
                            VALUES (?, ?);");
            $stmt->execute(array($result['last_id'], $category));
        }
        
        $stmt = $conn->prepare("INSERT INTO image (name, idproduct) 
                                VALUES (?, ?);");
        $stmt->execute(array($image, $result['last_id']));

        $conn->commit();
        $result['status'] = 'Success';
        
    } catch (Exception $e) {
        $conn->rollback();
        
        $result['status'] = "" . $e;
    }
    
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

  function deleteImage($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM image
                            WHERE id = ?;");
    
    if($stmt->execute(array($id)))
        return false;
    
    return true;
  }

  function search($input) {
    global $conn;
    $string = "%" . $input . "%";
    $stmt = $conn->prepare("SELECT product.id AS id, product.name, product.price, COALESCE(AVG(review.rate),0) AS rate, COUNT(review.id) AS count                                 FROM product LEFT OUTER JOIN review ON (review.idproduct = product.id), kind, category 
                                WHERE product.availability = TRUE AND product.id = kind.idproduct AND kind.idcategory = category.id AND (product.name ILIKE ? OR  details ILIKE ? OR category.name ILIKE ?)
                                GROUP BY product.id, product.price, product.name;");
      
     $stmt->execute(array($string, $string, $string));
     return $stmt->fetchAll();
  }

  function editProduct($id, $name, $price, $stock, $details, $newCategories) {
    global $conn;
    $stmt = $conn->prepare("UPDATE product
                            SET name = ?
                            WHERE id = ?;");
    if(!$stmt->execute(array($name, $id)))
        return false;
      
    $stmt = $conn->prepare("UPDATE product
                            SET price = ?
                            WHERE id = ?;");
    if(!$stmt->execute(array($price, $id)))
        return false;
      
    $stmt = $conn->prepare("UPDATE product
                            SET stock = ?
                            WHERE id = ?;");
    if(!$stmt->execute(array($stock, $id)))
        return false;
      
    $stmt = $conn->prepare("UPDATE product
                            SET details = ?
                            WHERE id = ?;");
    if(!$stmt->execute(array($details, $id)))
        return false;
      
    $stmt = $conn->prepare("DELETE FROM kind
                                WHERE idproduct = ?;");
    if(!$stmt->execute(array($id)))
        return false;
      
    foreach($newCategories as $category) {
        $stmt = $conn->prepare("INSERT INTO kind (idcategory, idproduct) VALUES (?,?);");
        if(!$stmt->execute(array($category, $id)))
            return false;
    }
      
    return true;
  }

  function deleteReview($idreview) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM review
                            WHERE id = ?;");
      
    if(!$stmt->execute(array($idreview)))
        return false;
      
    return true;
      
  }
?>