<?php
  include_once('../config/init.php');
  include_once($BASE_DIR .'database/products.php');
  
  $categories = json_decode($_POST['categories']);

  $result = addNewProduct($_POST['name'], $_POST['price'], $_POST['stock'], $_POST['details'], $categories, $_FILES['image']['name']);
  
  //Save image
  $originalFileName = $BASE_DIR . 'images/originals/' . $_FILES['image']['name'];
  $thumbnailFileName = $BASE_DIR . 'images/thumbnails/' . $_FILES['image']['name'];
  $productFileName = $BASE_DIR . 'images/products/' . $_FILES['image']['name'];

  move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
  
  $original = imagecreatefromjpeg($originalFileName);
  
  $width = imagesx($original);
  $height = imagesy($original);
  $square = min($width, $height);

  // Create small square image
  $small = imagecreatetruecolor(200, 200); 
  imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
  imagejpeg($small, $productFileName);

  //Create thumbnail
  $thumbnailwidth = 320;
  $thumbnailheight = 150;

  $thumbnail = imagecreatetruecolor($thumbnailwidth, $thumbnailheight); 
  
  imagecopyresized($thumbnail, $original, 0, 0, 0, ($height-$thumbnailheight)/2, $thumbnailwidth, $thumbnailheight, $width, $height*($thumbnailwidth/$width));
  imagejpeg($thumbnail, $thumbnailFileName);
  
  echo json_encode($result);
?>