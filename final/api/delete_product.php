<?php
  include_once('../config/init.php');
  include_once($BASE_DIR .'database/products.php');

  $result = deleteProduct($_POST['id']);
  
  echo json_encode($result);
?>