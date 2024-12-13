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
    <link rel="stylesheet" href="../static/css/buy.css">
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

    <!-- <div class="background wrapper">
        <div class="address">
            <i class="iconfont icon-shouhuodizhi" id="elment"></i>
            <div class="p">
                dakwhdkjawndkaawdjooawkdnawklioashfaskdfasdjflksdfadsf
                asefkasjfnajdfaajsjdiowefiisifisdofioaefnoakenfaiefoaise
                asenofaksnfoiesnfse9f9usndkfnaksefaasefasefasefesfasdfxxxxxxxxxx
                xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            </div>
            <div class="username">
                zhangsan
            </div>
            <div class="contact">
                016951489
            </div>
        </div>

        <div class="payment">
            <i class="iconfont icon-qianbao"></i>
            <i class="iconfont icon-yinhangka"><br></i>
            <i class="iconfont icon-xianjin"><br></i>
            <div class="title">
                <h2>Payment method</h2>
            </div>

        </div>

        <div class="detail">
            <img src="./static/Pimg/01.jpg">
            <div class="price">
                <h1>RM750</h1>
            </div>
            <div class="p">
                xxxxxxxxxxxxxxxxxxxxxxdakwhdkjawndkaawdjooawkdnawklioashfaskdfasdjflksdfadsf
                asefkasjfnajdfaajsjdiowefiisifisdofioaefnoakenfaiefoaise
                asenofaksnfoiesnfse9f9usndkfnaksefaasefasefasefesfasdfxxxxxxxxxx
                xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
                xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            </div>
        </div>
        <div class="last">
            <h2>TOTAL RM750</h2>
        </div>
        <div class="buy" onclick="buy()">
            BUY
        </div>
    </div> -->

    <?php
    include_once "../controller/pdo.php";
    //display items    
    $id = $_GET['id'];
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch();
    $address = $user['address'];
    $phone = $user['contact'];
    $userid = $user['userId'];

    $sql = "SELECT * FROM posts WHERE postId = '$id'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $post = $stmt->fetch();
    $price = $post['price'];
    $content = $post['content'];
    $image = $post['image'];

    echo "<div class='background wrapper'>
        <div class='address'>
        <span onclick = 'goBack()' id ='back'>←Back</span>
            <i class='iconfont icon-shouhuodizhi' id='elment'></i>";
    echo "<div class='p'>$address</div>
            <div class='username'>$username</div>
            <div class='contact'>$phone</div>
        </div>

        <div class='payment'>
        <i class='iconfont icon-qianbao'></i>
        <i class='iconfont icon-yinhangka'><br></i>
        <i class='iconfont icon-xianjin'><br></i>
        <div class='title'>
            <h2>Payment method</h2>
        </div>

        </div>

        <div class='detail'>
        <img src='$image'>
        <div class='price'><h1>RM$price</h1></div>
        <div class='p'>$content</div>
        </div>
        <div class='last'>
        <h2>TOTAL RM$price</h2>
        </div>";
    echo "<div class='buy' onclick='buy($id,$userid)'>BUY</div>
            </div>";
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
    <script>Index.func.init()</script>
</body>

</html>