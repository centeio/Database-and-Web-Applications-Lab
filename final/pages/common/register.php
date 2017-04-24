<?php 
	include_once('../../config/init.php');
    
    $username = '';
    $password = '';

	$smarty->assign('style','css/Register.css');
    $smarty->assign('username',$username);
    $smarty->assign('password',$password);
	
    $smarty->display('common/register.tpl');
?>