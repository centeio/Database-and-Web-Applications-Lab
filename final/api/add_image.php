<?php
  include_once('../config/init.php');
  include_once($BASE_DIR .'database/products.php');

  $extension = pathinfo($_FILES['file-0']['name'], PATHINFO_EXTENSION);
  $result = addNewImage($_POST['productID'], $extension);

  if($result['status'] == "success") {
      
      //Save image
      $originalFileName = $BASE_DIR . 'images/originals/' . $result['imageName'];
      $thumbnailFileName = $BASE_DIR . 'images/thumbnails/' . $result['imageName'];
      $productFileName = $BASE_DIR . 'images/products/' . $result['imageName'];

      move_uploaded_file($_FILES['file-0']['tmp_name'], $originalFileName);

      if($extension == "png")
          $original = imagecreatefrompng($originalFileName);
      else
          $original = imagecreatefromjpeg($originalFileName);

      $width = imagesx($original);
      $height = imagesy($original);
      $square = min($width, $height);
      
      // Create small square image
      $small = imagecreatetruecolor(200, 200); 
      imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
      
      if($extension == "png")
          imagepng($small, $productFileName);
      else
          imagejpeg($small, $productFileName);

      //Create thumbnail
      $thumbnailwidth = 320;
      $thumbnailheight = 150;

      $thumbnail = imagecreatetruecolor($thumbnailwidth, $thumbnailheight); 

      imagecopyresized($thumbnail, $original, 0, 0, 0, ($height-$thumbnailheight)/2, $thumbnailwidth, $thumbnailheight, $width, $height*($thumbnailwidth/$width));
      
      if($extension == "png")
          imagepng($thumbnail, $thumbnailFileName);
      else
          imagejpeg($thumbnail, $thumbnailFileName);
  }
  echo json_encode($result);
?>