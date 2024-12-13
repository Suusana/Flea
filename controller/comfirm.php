<?php
include_once "pdo.php";
$id = $_GET['orderid'];

$sql = "UPDATE orders set status=1 WHERE orderId = '$id';";
$stmt = $pdo->prepare($sql);
$stmt->execute();
header('Location:../views/MyInfo.php');
?>