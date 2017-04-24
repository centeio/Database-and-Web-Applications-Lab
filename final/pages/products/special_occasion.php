<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
    /*$occasions;
    $occasions[0]['image_path'] = $BASE_URL . 'images/valentineSpecial.jpg';
    $occasions[0]['name'] = 'Valentine\'s Day';
    $occasions[0]['link'] = '';
    $occasions[1]['image_path'] = $BASE_URL . 'images/chocolateBundle.jpg';
    $occasions[1]['name'] = 'Chocolate Bundle';
    $occasions[1]['link'] = '';
    $occasions[2]['image_path'] = $BASE_URL . 'images/Halloween.jpg';
    $occasions[2]['name'] = 'Halloween';
    $occasions[2]['link'] = $BASE_URL . 'pages/products/products.php';

	$smarty->assign('style','css/SpecialOccasion.css');
    $smarty->assign('occasions',$occasions);
	
    $smarty->display('products/special_occasion.tpl'); */
    
    if (!$_GET['id']) {
        $_SESSION['error_messages'][] = 'Undefined special_occasion';
        header("Location: $BASE_URL");
        exit;
    }

    $products = getAllSpecialOccasionProducts($_GET['id']);
    
    foreach ($products as $key => $product) {
        $reviews = getAllProductReviewsInfo($product['id']);
        $products[$key]['rate'] = round($reviews['average']);
        $products[$key]['count'] = $reviews['count'];
        $products[$key]['image'] = getAllProductImages($product['id'])[0]['name'];
    }
    
    $highlights = getSpecialOccasionGallery($_GET['id']);
    
    foreach ($highlights as $key2 => $image) {
        $highlights[$key2]['image_path'] = $BASE_URL . 'images/carousel/' . $image['name'];
        $highlights[$key2]['link'] = $BASE_URL . 'pages/product?id=' . $image['idproduct'];
    }
    
    $smarty->assign('style','css/Products.css');
    $smarty->assign('products', $products);
    $smarty->assign('highlights', $highlights);
    
    $smarty->display('products/products.tpl')
?>
