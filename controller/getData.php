<?php
include_once "pdo.php";
$sql = "SELECT * FROM posts LIMIT 8";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$posts = $stmt->fetchAll();
$array = array();
foreach ($posts as $post) {
    $arr = array("id" => $post['postId'], "title" => $post['title'], "image" => $post['image']);
    array_push($array, $arr);
}

echo json_encode($array);
?>