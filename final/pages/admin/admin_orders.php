<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');
    include_once($BASE_DIR .'database/orders.php');
    
    session_start();
    if(!isset($_SESSION['user_id']) || !$_SESSION['is_admin']){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }
    
    $orders = getAllOrders();
    $norders = count($orders);
    foreach ($orders as $key => $order) {
        $orders[$key]['client'] = getClient($order['idclient']);
        $orders[$key]['products'] = getProductsFromOrder($order['id']);
        $orders[$key]['address'] = getAdress($order['idaddress']);
        
        if($order['state'] == 'requested'){
            $orders[$key]['date'] = date_format(date_create($order['orderdate']), 'jS F Y');
        } else if($order['state'] == 'canceled'){
            $orders[$key]['date'] = date_format(date_create($order['canceleddate']), 'jS F Y');
        } else if($order['state'] == 'sent'){
            $orders[$key]['date'] = date_format(date_create($order['sentdate']), 'jS F Y');
        } else {
            $orders[$key]['date'] = date_format(date_create($order['arriveddate']), 'jS F Y');
        }
    }
	
	$smarty->assign('style','css/AdminPage.css');
    $smarty->assign('orders',$orders);
    $smarty->assign('norders',$norders);
    
    
    $smarty->display($BASE_DIR .'templates/admin/admin_orders.tpl'); ?>