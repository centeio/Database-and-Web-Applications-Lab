<?php 
	include_once('../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
    //TODO: what special occasions should be here? Active ones?
    $special_occasions;
    
    $special_occasions[0]['name'] = "Valentine's Day";
    $special_occasions[0]['image'] = "valentineSpecial.jpg";
    $special_occasions[1]['name'] = "Chocolate Bundle Special";
    $special_occasions[1]['image'] = "chocolateBundle.jpg";
    $special_occasions[2]['name'] = "Mother's Day";
    $special_occasions[2]['image'] = "MothersDay.jpg";
    
    $products = getBestSellers();

    foreach ($products as $key => $product) {
        $reviews = getAllProductReviewsInfo($product['id']);
        $products[$key]['rate'] = round($reviews['average']);
        $products[$key]['count'] = $reviews['count'];
        $products[$key]['image'] = getAllProductImages($product['id'])[0]['name'];
    }
    
    $smarty->assign('style','css/MainPage.css');
    $smarty->assign('products', $products);
    $smarty->assign('special_occasions', $special_occasions);
                            
    $smarty->display('products/best_seller.tpl'); 
?>
