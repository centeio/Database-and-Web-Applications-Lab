<?php 
	include_once('../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    include_once($BASE_DIR .'database/special occasion.php');
    
    $highlights = getCurrentSpecialOccasions();
    foreach ($highlights as $key => $special_occasion) {
        $highlights[$key]['image_path'] = $BASE_URL . 'images/carousel/' . getSpecialOccasionGallery($special_occasion['id'])[0]['name'];
        $highlights[$key]['link'] = $BASE_URL . 'pages/products/special_occasion.php?id=' . $special_occasion['id'];
    }
     
    if (count($highlights) == 0){
        //show some products (or promotions?)
        $highlights[0]['image_path'] = $BASE_URL . 'images/carousel/h2.jpg';
        $highlights[0]['link'] = $BASE_URL . 'pages/products/products.php';
        $highlights[0]['name'] = 'Welcome to the shop';
    }
    
    $products = getBestSellers();
    foreach ($products as $key => $product) {
        $products[$key]['image'] = getAllProductImages($product['id'])[0]['name'];
    }
    
    $smarty->assign('style','css/MainPage.css');
    $smarty->assign('products', $products);
    $smarty->assign('highlights', $highlights);
                            
    $smarty->display('products/best_seller.tpl'); 
?>
