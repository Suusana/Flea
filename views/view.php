<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLEA</title>
    <link rel="stylesheet" href="../static/css/base.css">
    <link rel="stylesheet" href="../static/css/common.css">
    <link rel="stylesheet" href="../static/css/post.css">
    <link rel="stylesheet" href="../static/iconfont/iconfont.css">


</head>

<body>
    <!-- header -->
    <div class="header">
        <a href="./MyInfo.php" class="top">
            <div class="avatar"></div>
            <span>
                <?php echo $_SESSION['username'] ?>
            </span>
        </a>

        <div class="nav">
            <div class="box">
                <a href="./index.php">
                    <p class="iconfont icon-zhuye"></p>
                    <span>Home</span>
                </a>
                <a href="./Marketplace.php">
                    <p class="iconfont icon-shangpin"></p>
                    <span>Market Place</span>
                </a>
                <div class="logo">
                    <h1><a href="./index.php">FLEA</a></h1>
                </div>
                <a href="#">
                    <p class="iconfont icon-message_fill_light"></p>
                    <span>Message</span>
                </a>
                <a href="./MyInfo.php">
                    <p class="iconfont icon-geren"></p>
                    <span>My Info</span>
                </a>
            </div>
        </div>
    </div>

    <!-- body -->
    <?php
    include_once "../controller/pdo.php";

    // Get the id from the URL
    $postId = $_GET['id'];

    // Fetch the post from the database
    $sql = "SELECT * FROM posts WHERE postId = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $postId]);
    $post = $stmt->fetch();

    if ($post) {
        // Display the post...
        $id = $post['postId'];
        $image = $post['image'];
        $title = $post['title'];
        $price = $post['price'];
        $content = $post['content'];
        $username = $post['P_username'];
        $date = $post['date'];

        $sql = "SELECT avatar FROM users WHERE username = '$username'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch();

        $avatar = $user['avatar'];

        echo "<div class='background wrapper'>
        <a onclick='goBack()' id='back'>←Back</a>
        <div class='post'>
            <div class='user-content'>
                <div class='userlogo'><img src='$avatar'></div>
                <div class='username'>$username</div>
            </div>
            <div class='post-content'>
                <img class='post-image' src='$image' alt='post image'>
                <div class='test'>$title</div>
                <div class='introduce'>$content</div>
                <div class='price'>
                    <p>RM$price</p>
                </div>
                <div class='icons-container'>
                    <div class='iconfont icon-gouwuchekong' onclick='goBuy($id)'></div>
                    <div class='iconfont icon-shoucang' onclick='collect($id)'></div>
                    <a href='#' class='messbox'>
                        <div class='iconfont icon-xiaoxi'></div>
                    </a>
                </div>
                <h4>Last Edit: $date</h4>
            </div>
        </div>
    </div>
    ";

    } else {
        // Post not found...
        echo "<p>Post not found</p>";
    }
    ?>

    <!-- footer -->
    <div class="footer">
        <div class="wrapper">
            <div class="top">
                <p>FLEA</p>
                <p>The best choice for second-hand goods</p>
            </div>
            <div class="bottom">
                <p>
                    <a href="./index.html">Home</a> |
                    <a href="./Index.html">Market Place</a> |
                    <a href="./Index.html">Message</a> |
                    <a href="./Index.html">My Info</a>
                </p>
                <p> CopyRight © 2023 FLEA | @Six Six Six | All Right Reserved</p>
            </div>
        </div>
    </div>

    <?php
    ob_end_flush();
    ?>
    <script src="../static/js/index.js"></script>
</body>

</html>