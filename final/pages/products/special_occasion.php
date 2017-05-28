<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    include_once($BASE_DIR .'database/special occasion.php');
    
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
        $src = $BASE_DIR . 'images/carousel/' . $image['name'];
        if (is_file($src) && file_exists($src)) {
            $highlights[$key2]['image_path'] = $BASE_URL . 'images/carousel/' . $image['name'];
        }
        else{
            $highlights[$key2]['image_path'] = $BASE_URL . 'images/carousel/placeholder.jpg';
        }
        $highlights[$key2]['link'] = $BASE_URL . 'pages/products/product?id=' . $image['idproduct'];
    }
    
    $occasions = getCurrentSpecialOccasions();
    $special_occasion = [];
    $index = -1;
    
    foreach ($occasions as $key3 => $occasion) {
        if($occasion['id'] == $_GET['id']){
            $special_occasion = $occasion;           
            $index = $key3;            
            break;
        }
    }
    
    //Occasion not found
    if($index == -1){
        $_SESSION['error_messages'][] = 'Expired special_occasion';
        header("Location: $BASE_URL");
        exit;
    }
    
    $smarty->assign('style','css/Products.css');
    $smarty->assign('products', $products);
    $smarty->assign('highlights', $highlights); 
    $smarty->assign('special_occasion', $special_occasion);
    if($index - 1 < 0){
        $smarty->assign('linkPrevious', $BASE_URL . 'pages/products/special_occasion.php?id='. $occasions[count($occasions) - 1]['id']);
    }
    else{
        $smarty->assign('linkPrevious', $BASE_URL . 'pages/products/special_occasion.php?id='. $occasions[($index - 1) % count($occasions)]['id']);
    }
    $smarty->assign('linkNext', $BASE_URL . 'pages/products/special_occasion.php?id='. $occasions[($index + 1) % count($occasions)]['id']);
    
    $smarty->display('products/special_occasion.tpl')
?>
