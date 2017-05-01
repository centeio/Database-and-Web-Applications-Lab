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
    
    $categories = getCategories();
    
    $highlights;
    $highlights[0]['image_path'] = $BASE_URL . 'images/h1.jpg';
    $highlights[0]['link'] = '';
    $highlights[1]['image_path'] = $BASE_URL . 'images/h2.jpg';
    $highlights[1]['link'] = '';
    $highlights[2]['image_path'] = $BASE_URL . 'images/h3.jpg';
    $highlights[2]['link'] = '';
    
    $smarty->assign('style','css/Products.css');
    $smarty->assign('products', $products);
    $smarty->assign('highlights', $highlights);
    $smarty->assign('categories', $categories);
    
    $smarty->display('products/products.tpl');
    
?>