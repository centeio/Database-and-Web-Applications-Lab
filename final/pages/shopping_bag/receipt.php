<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }
    
    $address = '<strong>Elf Cafe</strong><br>2135 Sunset Blvd<br>Los Angeles, CA 90026';
    $phone = '(213) 484-6829';
    $date = date("Y-m-d");
    
    $products = getShoppingBag($_SESSION['user_id']);
    $subTotal = 0;

    foreach ($products as $key => $product) {
        $products[$key]['total'] = $product['quantity']*$product['price'];
        $subTotal += $products[$key]['total'];
    }
    
    $shipping = 5.48;
    
	$smarty->assign('style','css/Receipt.css');
    $smarty->assign('address', $address);
    $smarty->assign('phone', $phone);
    $smarty->assign('date', $date);
    $smarty->assign('products', $products);
    $smarty->assign('subTotal', $subTotal);
    $smarty->assign('shipping', $shipping);
    $smarty->assign('total', $subTotal + $shipping);
    
	$smarty->display('shopping_bag/receipt.tpl');  
?>