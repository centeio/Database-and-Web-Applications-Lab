<?php 
	include_once('../../config/init.php');
    
    $occasions;
    $occasions[0]['image_path'] = $BASE_URL . 'images/valentineSpecial.jpg';
    $occasions[0]['name'] = 'Valentine\'s Day';
    $occasions[0]['link'] = '';
    $occasions[1]['image_path'] = $BASE_URL . 'images/chocolateBundle.jpg';
    $occasions[1]['name'] = 'Chocolate Bundle';
    $occasions[1]['link'] = '';
    $occasions[2]['image_path'] = $BASE_URL . 'images/Halloween.jpg';
    $occasions[2]['name'] = 'Halloween';
    $occasions[2]['link'] = $BASE_URL . 'pages/products/products.php';

	$smarty->assign('style','css/SpecialOccasion.css');
    $smarty->assign('occasions',$occasions);
	
    $smarty->display('products/special_occasion.tpl'); 
?>
