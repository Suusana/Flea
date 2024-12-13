<?php
include_once "pdo.php";
$postid = $_GET['postid'];
$userid = $_GET['userid'];
$date = date('Y-m-d');

$sql = "INSERT INTO orders(postID,userID,date,status) values('$postid','$userid','$date','0')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
header('Location:../views/view.php?id='.$postid);

?>