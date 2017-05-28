<?php
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    include_once($BASE_DIR .'database/users.php');
    
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }
    
    $products = getShoppingBag($_SESSION['user_id']);
    $subTotal = 0;

    foreach ($products as $key => $product) {
        $products[$key]['image'] = getAllProductImages($product['id'])[0]['name'];
        $products[$key]['total'] = $product['quantity']*$product['price'];
        $subTotal += $products[$key]['total'];
    }
    
    $shipping = 5.48;
    
    $smarty->assign('style','css/CheckoutPayment.css');
    $smarty->assign('products', $products);
    $smarty->assign('subTotal', $subTotal);
    $smarty->assign('shipping', $shipping);
    $smarty->assign('total', $subTotal + $shipping);
    $smarty->assign('addresses', getAddresses($_SESSION['user_id']));
    
    $smarty->display('shopping_bag/payment.tpl'); 
?>