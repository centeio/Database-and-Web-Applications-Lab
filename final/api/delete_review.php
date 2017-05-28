<?php
  include_once('../config/init.php');
  include_once($BASE_DIR .'database/products.php');
  
  $answer = array();
  
  $answer['deleted'] = deleteReview($_POST['idreview']);
  
  //Update average rating
  $rate = getAllProductReviewsInfo($_POST['productID']);
  $answer['averageRate'] = $rate['average'];
  $answer['votes'] = $rate['count'];
  

  echo json_encode($answer);
?>