<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');
    include_once($BASE_DIR .'database/orders.php');
    
    session_start();
    if(!isset($_SESSION['user_id']) || !$_SESSION['is_admin']){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }
    
    $norders = count(getAllOrders());

    $nclients = count(getClients());

    $nviews = count(getNVisitors());

    $smarty->assign('style','css/AdminPage.css');
    $smarty->assign('nclients',$nclients);
    $smarty->assign('nviews',$nviews);    
    $smarty->assign('norders',$norders); ?>