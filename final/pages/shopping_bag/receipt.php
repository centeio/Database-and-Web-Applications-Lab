<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    include_once($BASE_DIR .'database/users.php');
    include_once($BASE_DIR .'database/orders.php');
    
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }
    
    $user = getClient($_SESSION['user_id']);
    $id = "CW" + $_SESSION['user_id'] + date("Ymd");
    $address =  $_POST["address"];
    $city =  $_POST["city"];
    $zipcode =  $_POST["zip_code"];
    $phone = $_POST["phone_number"];
    $date = date("Y-m-d");
    
    $products = getShoppingBag($_SESSION['user_id']);
    $subTotal = 0;

    foreach ($products as $key => $product) {
        $products[$key]['total'] = $product['quantity']*$product['price'];
        $subTotal += $products[$key]['total'];
    }
    
    $shipping = 5.48;
    
    //Create new order
    $answer = json_decode(addAddress($address, $zipcode, $city));
    createOrder($_SESSION['user_id'], $answer->addressID, $products);

	$smarty->assign('style','css/Receipt.css');
    $smarty->assign('user', $user);
    $smarty->assign('address', $address);
    $smarty->assign('city', $city);
    $smarty->assign('zipcode', $zipcode);
    $smarty->assign('phone', $phone);
    $smarty->assign('date', $date);
    $smarty->assign('id', $id);
    $smarty->assign('products', $products);
    $smarty->assign('subTotal', $subTotal);
    $smarty->assign('shipping', $shipping);
    $smarty->assign('total', $subTotal + $shipping);
    
	$smarty->display('shopping_bag/receipt.tpl');  
?>