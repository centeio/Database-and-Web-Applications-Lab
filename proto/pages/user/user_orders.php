<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    include_once($BASE_DIR .'database/orders.php');
    
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }

    $orders = getOrders($_SESSION['user_id']);
    
    foreach ($orders as $key => $order) {
        $products = getProductsFromOrder($order['id']);
        $address = getAdress($order['idaddress']);
        $subTotal = 0;
        
        foreach ($products as $key2 => $product) {
            $products[$key2]['image'] = getAllProductImages($product['id'])[0]['name'];
            $products[$key2]['total'] = $product['quantity']*$product['price'];
            $subTotal += $products[$key2]['total'];
        }
        
        $orders[$key]['products'] = $products;
        $orders[$key]['subTotal'] = $subTotal;
        $orders[$key]['shipping'] = 5.74;
        $orders[$key]['total'] = $orders[$key]['subTotal'] + $orders[$key]['shipping'];
        
        $orders[$key]['address'] = $address['address'];
        $orders[$key]['zipnumber'] = $address['zipnumber'];
        $orders[$key]['city'] = $address['city'];
    }

	$smarty->assign('style','css/UserOrders.css');
    $smarty->assign('orders', $orders);
    
    $smarty->display('users/user_orders.tpl'); 
?>