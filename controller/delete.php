<?php
include_once "pdo.php";
$id = $_GET['id'];
$sql = "DELETE FROM posts WHERE postId = '$id'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
header('Location:../views/MyInfo.php');
?>