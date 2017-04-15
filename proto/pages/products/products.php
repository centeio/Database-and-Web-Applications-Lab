<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');

    $products = getAllAvailableProducts();
    
    foreach ($products as $key => $product) {
        $reviews = getAllProductReviewsInfo($product['id']);
        $products[$key]['rate'] = round($reviews['average']);
        $products[$key]['count'] = $reviews['count'];
        $products[$key]['image'] = getAllProductImages($product['id'])[0]['name'];
    }
    
    $smarty->assign('style','css/Products.css');
    $smarty->assign('products', $products);
    
    $smarty->display('products/products.tpl');
    
?>