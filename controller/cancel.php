<?php
include_once "pdo.php";
$postid = $_GET['id'];
$sql = "DELETE FROM collections WHERE post_id = '$postid'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
header('Location:../views/MyInfo.php');
?>