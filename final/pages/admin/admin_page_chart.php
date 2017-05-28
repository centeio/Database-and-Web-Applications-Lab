<?php 
	include_once('../../config/init.php');
	include_once('admin_menu.php');

	$smarty->assign('style','css/AdminPage.css');
    
    $smarty->display($BASE_DIR .'templates/admin/admin_page_chart.tpl'); ?>