<?
include_once('../config/init.php');
include_once($BASE_DIR .'database/users.php');
include_once($BASE_DIR .'database/products.php');

global $conn;

$user = getClient($_SESSION['user_id']);
$answer = array();
$currentDate = getDate();
$answer['Date'] = $currentDate['mday']."/".$currentDate['mon']."/".$currentDate['year'];
$answer['FirstName'] = $user['firstname'];
$answer['LastName'] = $user['lastname'];

$stmt = $conn->prepare("insert into \"review\" (rate, \"comment\", idUser, idProduct) values (?, ?, ?, ?);");
$stmt->execute(array($_POST['rating'], $_POST['comment'], $_SESSION['user_id'], $_POST['productID']));

//Update average rating
$rate = getAllProductReviewsInfo($_POST['productID']);
$answer['averageRate'] = $rate['average'];
$answer['votes'] = $rate['count'];

echo json_encode($answer);
?>