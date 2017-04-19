<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');
    include_once($BASE_DIR .'database/orders.php');
    
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }

    $user = getClient($_SESSION['user_id']);
    $user['address'] = getAddresses($_SESSION['user_id'])[0];

	$smarty->assign('style','css/UserPage.css');
    $smarty->assign('user', $user);
    
    $smarty->assign('num_orders', count(getOrders($_SESSION['user_id'])));
    $smarty->assign('num_favorites', count(getFavorites($_SESSION['user_id'])));
    
	$smarty->display('users/user_page.tpl'); 
?>