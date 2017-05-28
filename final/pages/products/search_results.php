<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');  

    $products = search($_GET['search']);
    
    foreach ($products as $key => $product) {
        $reviews = getAllProductReviewsInfo($product['id']);
        $products[$key]['rate'] = $reviews['average'];
        $products[$key]['count'] = $reviews['count'];
        
        $imageName = getAllProductImages($product['id'])[0]['name'];
        $src = $BASE_DIR . 'images/thumbnails/' . $imageName;
        if (is_file($src) && file_exists($src)) {
            $products[$key]['image'] = $imageName;
        }
        else{
            $products[$key]['image'] = 'placeholder.jpg';
        }
    }
    
    $smarty->assign('style','css/Products.css');
    $smarty->assign('products', $products);
    
    $smarty->display('products/search_results.tpl');
    
?>