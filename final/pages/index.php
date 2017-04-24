<?php 
	include_once('../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    include_once($BASE_DIR .'database/special occasion.php');
    
    $special_occasions = getCurrentSpecialOccasions();
    foreach ($special_occasions as $key => $special_occasion) {
        $special_occasions[$key]['image_path'] = $BASE_URL . 'images/carousel/' . getSpecialOccasionGallery($special_occasion['id'])[0]['name'];
        $special_occasions[$key]['link'] = $BASE_URL . 'pages/products/special_occasion.php?id=' . $special_occasion['id'];
    }
    //TODO: if count(special_occasions == 0) -> show some products (or promotions?)
    
    $products = getBestSellers();
    foreach ($products as $key => $product) {
        $products[$key]['image'] = getAllProductImages($product['id'])[0]['name'];
    }
    
    $smarty->assign('style','css/MainPage.css');
    $smarty->assign('products', $products);
    $smarty->assign('special_occasions', $special_occasions);
                            
    $smarty->display('products/best_seller.tpl'); 
?>
