<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');
    include_once($BASE_DIR .'database/products.php');
    include_once($BASE_DIR .'database/orders.php');
    
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }

    $products = getFavorites($_SESSION['user_id']);
    
    foreach ($products as $key => $product) {
        $products[$key]['image'] = getAllProductImages($product['id'])[0]['name'];
    }

	$smarty->assign('style','css/UserFavorites.css');
    $smarty->assign('products',$products);
    
    $smarty->assign('num_orders', count(getOrders($_SESSION['user_id'])));
    $smarty->assign('num_favorites', count($products));

    $smarty->display('users/user_favorites.tpl'); 
?>