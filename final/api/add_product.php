<?php
  include_once('../config/init.php');
  include_once($BASE_DIR .'database/products.php');

  $result = addNewProduct($_POST['name'], $_POST['price'], $_POST['stock'], $_POST['details']);
  
  if($result['status'] === 'Success'){
      foreach($_POST['categories'] as $key => $category){
        addNewCategoryToProduct($result['last_id'], $category);
      }
  }
  
  echo json_encode($result);
?>