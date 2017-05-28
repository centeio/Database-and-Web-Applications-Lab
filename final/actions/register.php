<?
include_once('../config/init.php');
include_once('../database/users.php');

if(register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['firstName'], $_POST['lastName']) != "true");
    header('Location: '.$BASE_URL .'pages/common/register.php');

header('Location: '.$BASE_URL .'pages/user/user_page.php');
?>