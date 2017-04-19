<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
    global $conn;

    if (!$_GET['id']) {
        $_SESSION['error_messages'][] = 'Undefined product';
        header("Location: $BASE_URL");
        exit;
    }
    
    $product = getProduct($_GET['id']);
    $rate = getAllProductReviewsInfo($product['id']);
    $reviews = getAllProductReviews($product['id']);
    $images = getAllProductImages($product['id']);
  
    $product['rate'] = $rate['average'];
    $product['votes'] = $rate['count'];

	$smarty->assign('style','css/Product.css');
	$smarty->assign('product', $product);
    $smarty->assign('reviews', $reviews);
    $smarty->assign('images', $images);
    
    if(isset($_SESSION['user_id'])){
        $isFavorite = isFavorite($_GET['id'],$_SESSION['user_id']);
        if($isFavorite)
            $smarty->assign('heart', 'fa-heart');
        else
            $smarty->assign('heart', 'fa-heart-o');
    }
    
    $smarty->display('products/product.tpl'); 
?>
