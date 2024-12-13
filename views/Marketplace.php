<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charaset="utf-8">
    <title>Flea</title>
    <link rel="stylesheet" href="../static/css/base.css">
    <link rel="stylesheet" href="../static/css/common.css">
    <link rel="stylesheet" href="../static/css/marketplace.css">
    <link rel="stylesheet" href="../static/iconfont/iconfont.css">
</head>

<body>
    <!-- header -->
    <div class="header">
        <a href="./MyInfo.php" class="top">
            <div class="avatar"></div>
            <span>
                <?php echo $_SESSION['username']; 
                $username = $_SESSION['username']
                ?>
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

    <!-- body -->
    <!-- search -->
    <div class="search">
        <form id="searchForm" action="./search.php" method="post">
            <input type="text" name="item" id="search" placeholder="Search for the item you want"
                style="margin-left: 420px;">
            <span class="iconfont icon-sousuoxiao" id="submitForm" name="submitform" value="success"
                onclick="Index.func.searchItem()"></span>
        </form>
    </div>

    <div class="background wrapper" id="posts">
        <!-- <div class="post">
            <img src="../static/Pimg/ipad.jpg">

            <div class="test">
                Apple iPad Pro 4th Generation (11)
            </div>
            <div class="introduce">
                I bought it late last year to paint. Found it too difficult at the back. Never touched it.
                Pens can be sold individually or together for a better deal. No bumps or bruises.
                It hasn't even been turned off a few times. Almost new I bought it late last year to paint. Found it too
                difficult at the back. Never touched it.
                Pens can be sold individually or together for a better deal. No bumps or bruises.
                It hasn't even been turned off a few times. Almost new I bought it late last year to paint. Found it too
                difficult at the back. Never touched it.
                Pens can be sold individually or together for a better deal. No bumps or bruises.
                It hasn't even been turned off a few times. Almost new
            </div>


            <div class="userlogo">
                <img src="../static/Pimg/userlogo.png">
            </div>

            <div class="username">shenhanhan</div>
            <div class="price">
                <p>RM4500</p>
            </div>


            <div class="iconfont icon-gouwuchekong"></div>
            <div class="iconfont icon-shoucang"></div>
            <a href="#" class="messbox">
                <div class="iconfont icon-xiaoxi"></div>
            </a>


            <div class="report">
                <a href="javascript::void(0)" onclick="document.getElementById('light').style.display='block';
            document.getElementById('fade').style.display='block'">
                    <h1>...</h1>
                </a>
            </div>
        </div> 
        <div id="light" class="reportpage" id="Report">
            <div class="close" onclick="closeReport()">X</div>
            <form action="#" method="post">
                <div class="pornographic">
                    Pornographic <input type="checkbox">
                </div>
                <div class="fakegoods">
                    Fake goods<input type="checkbox">
                </div>
                <div class="informationleakage">
                    Information leakage <input type="checkbox">
                </div>
                <div class="dangerous">
                    Dangerous <input type="checkbox">
                </div>

                <div class="fraudandscams">
                    Fraud and scams<input type="checkbox">
                </div>
                <div class="verbalabouseorharassment">
                    Verbal abouse or harassment<input type="checkbox">
                </div>

                <div class="otherreason">
                    Other reason <br>
                    <textarea name="reson"></textarea>
                </div>

                </table>
                <div class="reset">
                    <input type="reset" value="reset">
                </div>
                <div class="submit">
                    <input type="submit" value="Save and Submit">
                </div>

            </form>
        </div>-->
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
                    <a href="Index.html">Home</a> |
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
    <script src="../static/js/Marketplace.js "></script>
    <script src="../static/js/index.js "></script>
    <script>Market.func.init()</script>
</body>

</html>