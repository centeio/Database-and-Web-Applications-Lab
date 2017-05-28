<?php
  include_once('../config/init.php');
  include_once($BASE_DIR .'database/products.php');

  echo deleteImage($_POST['id']);
?>