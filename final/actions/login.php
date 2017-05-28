<?
include_once('../config/init.php');

session_start();

if(!isset($_SESSION['user_id'])) {
    echo "HELLO";
    header('Location: '.$BASE_URL .'pages/common/register.php');
}

if($_SESSION['is_admin'] == FALSE)
    header('Location: '.$BASE_URL .'pages/user/user_page.php');
else
    header('Location: '.$BASE_URL .'pages/admin/admin_page_chart.php');
?>