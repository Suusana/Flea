<?php
ob_start();
session_start();
?>

<?php
include_once "pdo.php";
$username = $_SESSION['username'];
$sql = "SELECT userId FROM users WHERE username = '$username'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();

$userid = $user['userId'];
$postid = $_GET['id'];

$sql = "SELECT * FROM collections WHERE user_id = '$userid' and post_id = '$postid'";
$stmt = $pdo->query($sql);
$count = $stmt->rowCount();

if ($count != 0) {
    //用户已收藏
    $sql = "DELETE FROM collections WHERE post_id = '$postid'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header('Location:../views/Marketplace.php');
} else {
    $sql = "INSERT INTO collections (post_id,user_id) VALUES ('$postid','$userid')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo "<script>history.back();</script>";
}
?>

<?php
ob_end_flush();
?>