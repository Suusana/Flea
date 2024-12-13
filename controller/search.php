<?php
include_once "pdo.php";

$sql = "SELECT * FROM posts";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll();

$array = array();

foreach ($posts as $post) {
    $username = $post['P_username'];

    $sql = "SELECT avatar FROM users WHERE username = '$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch();
    $arr = array(
        "id" => $post['postId'],
        "title" => $post['title'],
        "content" => $post['content'],
        "price" => $post['price'],
        "P_username" => $post['P_username'],
        "image" => $post['image'],
        "avatar" => $user['avatar']
    );
    array_push($array, $arr);

}

echo json_encode($array);

?>