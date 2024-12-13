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
    <link rel="stylesheet" href="../static/css/marketplace.css">
    <link rel="stylesheet" href="../static/iconfont/iconfont.css">
</head>

<body>
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
                <a href="./Index.php">
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

    <?php
    include_once "../controller/pdo.php";
    $result = $_POST['item'];

    $sql = "SELECT * FROM posts WHERE title LIKE '%$result%'";
    $stmt = $pdo->query($sql);
    $count = $stmt->rowCount();

    $posts = $stmt->fetchAll();
    $stmt->execute();
    if ($count != 0) {
        foreach ($posts as $post) {
            $id = $post['postId'];
            $image = $post['image'];
            $title = $post['title'];
            $price = $post['price'];
            $content = $post['content'];
            $username = $post['P_username'];

            $sql = "SELECT avatar FROM users WHERE username = '$username'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch();

            $avatar = $user['avatar'];
            echo "<div class='background wrapper' id='posts'><div class='post'>
            <a href='./view.php?id=$id'>
                <img src='$image'>
                <div class='test'>$title</div>
                <div class='introduce'>$content</div>
            </a>

            <div class='userlogo'>
                <img src='$avatar'>
            </div>

            <div class='username'>$username</div>
            <div class='price'>
                <p>RM$price</p>
            </div>

            <div class='iconfont icon-gouwuchekong' onclick='goBuy($id)'></div>
            <div class='iconfont icon-shoucang' onclick='collect($id)'></div>
            <h5 onclick='dispayReport()'>...</h5>
            <a href='#' class='messbox'>
                <div class='iconfont icon-xiaoxi'></div>
            </a>
            </div>
            </div>


            <div id='light' class='reportpage'>
        <div class='close' onclick='closeReport()'>X</div>
        <form action='#' method='post'>
            <div class='pornographic'>
                Pornographic <input type='checkbox'>
            </div>
            <div class='fakegoods'>
                Fake goods<input type='checkbox'>
            </div>
            <div class='informationleakage'>
                Information leakage <input type='checkbox'>
            </div>
            <div class='dangerous'>
                Dangerous <input type='checkbox'>
            </div>

            <div class='fraudandscams'>
                Fraud and scams<input type='checkbox'>
            </div>
            <div class='verbalabouseorharassment'>
                Verbal abouse or harassment<input type='checkbox'>
            </div>

            <div class='otherreason'>
                Other reason <br>
                <textarea name='reson'></textarea>
            </div>

            </table>
            <div class='reset'>
                <input type='reset' value='reset'>
            </div>
            <div class='submit'>
                <input type='submit' value='Save and Submit' >
            </div>

        </form>
    </div>";
        }
    } else {
        echo "<div class='background wrapper' id='posts'>
    <p style='margin: 100px 0 0 400px; font-size:30px; font-weight: 700'>We dont have these!!</p>
    </div>";
    }

    ?>

    <div class="footer">
        <div class="wrapper">
            <div class="top">
                <p>FLEA</p>
                <p>The best choice for second-hand goods</p>
            </div>
            <div class="bottom">
                <p>
                    <a href="./index.html">Home</a> |
                    <a href="#">Market Place</a> |
                    <a href="#">Message</a> |
                    <a href="#">My Info</a>
                </p>
                <p> CopyRight © 2023 FLEA | @Six Six Six | All Right Reserved</p>
            </div>
        </div>
    </div>
    <?php
    ob_end_flush();
    ?>
    <script src="../static/js/Marketplace.js"></script>
    <script src="../static/js/index.js"></script>
</body>

</html>