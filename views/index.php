<?php
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
    <link rel="stylesheet" href="../static/css/index.css">
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
                    <h1><a href="./index2.html">FLEA</a></h1>
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
    </div>

    <!-- body -->
    <div class="search">
        <form id="searchForm" action="./search.php" method="post">
            <input type="text" name="item" id="search" placeholder="Search for the item you want"
                style="margin-left: 420px;">
            <span class="iconfont icon-sousuoxiao" id="submitForm" name="submitform" value="success"
                onclick="Index.func.searchItem()"></span>
        </form>
    </div>

    <!-- banner -->
    <div class="banner wrapper">
        <div class="image" id="banner">
            <!-- <a href="./Index.html">
                <img src="../static/Pimg/01.jpg">
            </a> -->
        </div>
    </div>

    <div class="shift">
        <button onclick="leftShift()" class="iconfont icon-arrow-left-bold"></button>
        <button onclick="rightShift()" class="iconfont icon-arrow-right-bold"></button>
    </div>

    <!-- Recommendation -->
    <div class="title wrapper">
        <span>Recommendation</span>
        <a href="./Marketplace.php">More</a>
    </div>
    <div class="recomend wrapper" id="recomend">
        <!-- <a href="./Index.html">
            <img src="../static/Pimg/01.jpg">
            <p>Shaking chairs sold at a loss</p>
        </a> -->
    </div>

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