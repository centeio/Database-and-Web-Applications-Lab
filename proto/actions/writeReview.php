<?
include_once('../config/init.php');

session_start();

global $conn;
$stmt = $conn->prepare("insert into "review" (rate, "comment", idUser, idProduct) values (?, ?, ?, ?);");
$stmt->execute(array($_POST['rating'], $_POST['comment'], $_SESSION['user_id'], $_POST['productID']));

?>