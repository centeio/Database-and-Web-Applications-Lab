<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');  

    $products = getAllAvailableProducts();
    
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
    
    $categories = getCategories();
    
    $highlights;
    $highlights[0]['image_path'] = $BASE_URL . 'images/carousel/h1.jpg';
    $highlights[0]['link'] = '';
    $highlights[1]['image_path'] = $BASE_URL . 'images/carousel/h2.jpg';
    $highlights[1]['link'] = '';
    $highlights[2]['image_path'] = $BASE_URL . 'images/carousel/h3.jpg';
    $highlights[2]['link'] = '';
    
    $smarty->assign('style','css/Products.css');
    $smarty->assign('products', $products);
    $smarty->assign('highlights', $highlights);
    $smarty->assign('categories', $categories);
    
    $smarty->display('products/products.tpl');
    
?>