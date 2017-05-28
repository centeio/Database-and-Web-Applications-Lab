<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');
    
    session_start();
    if(!isset($_SESSION['user_id']) || !$_SESSION['is_admin']){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }
    
    $clients = getClients();

	$smarty->assign('style','css/AdminClients.css');
    $smarty->assign('clients',$clients);
    
    $smarty->display('admin/admin_clients.tpl'); 
?>