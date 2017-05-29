<?php
  include_once('../config/init.php');
  include_once($BASE_DIR .'database/products.php');

  $ratings = $_POST['rating'];
  
  $filter = '';
  
  if(count($_POST['category']) != 0){
      $filter .= 'idcategory IN (';
      foreach($_POST['category'] as $key => $category){
          if($key != 0)
              $filter .= ', ';
          $filter .= $category;
      }
      $filter .=') AND ';
  }
  
  $filter .= 'price BETWEEN ' . $_POST['price'][0] . ' AND ' . $_POST['price'][1];
  
   if(count($_POST['rating']) != 0){
       $filter .= 'AND ROUND(rate,0) IN (';
       foreach($_POST['rating'] as $key => $rating){
          if($key != 0)
              $filter .= ', ';
          $filter .= $rating;
      }
      $filter .=')';
   }
  
  $products = getFilteredProducts($filter);
  
  foreach ($products as $key => $product) {
        $reviews = getAllProductReviewsInfo($product['id']);
        $products[$key]['rate'] = round($reviews['average']);
        $products[$key]['count'] = $reviews['count'];
        $products[$key]['image'] = getAllProductImages($product['id'])[0]['name'];
    }
  
  echo json_encode($products);
?>