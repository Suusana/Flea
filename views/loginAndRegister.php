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
    <link rel="stylesheet" href="../static/css/index.css">
    <link rel="stylesheet" href="../static/css/loginAndRegister.css">
    <link rel="stylesheet" href="../static/iconfont/iconfont.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>
    <!-- header -->
    <div class="header">
        <div class="top">
            <div class="avatar"></div>
            <span class="loginBtn" onclick="Index.func.LoginPopUp()">Login</span>
        </div>

        <div class="nav">
            <div class="box">
                <a href="./Index.html">
                    <p class="iconfont icon-zhuye"></p>
                    <span>Home</span>
                </a>
                <a href="./Marketplace.html">
                    <p class="iconfont icon-shangpin"></p>
                    <span>Market Place</span>
                </a>
                <div class="logo">
                    <h1><a href="./index.php">FLEA</a></h1>
                </div>
                <a href="./Index.html">
                    <p class="iconfont icon-message_fill_light"></p>
                    <span>Message</span>
                </a>
                <a href="./Index.html">
                    <p class="iconfont icon-geren"></p>
                    <span>My Info</span>
                </a>
            </div>

        </div>
    </div>

    <!-- body -->
    <div class="search">
        <form id="searchForm" action="#">
            <input type="text" name="item" id="search" placeholder="Search for the item you want"
                style="margin-left: 420px;">
            <span class="iconfont icon-sousuoxiao" id="submitForm" onclick="Index.func.searchItem()"></span>
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
        <a href="./Index.html">More</a>
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

    <!-- login -->
    <div class="mask"></div>
    <div class="login-box">
        <!-- Login form start here -->
        <div class="container">
            <div class="cover">
                <div class="front">
                    <img src="../static/img/websitephoto.png">
                </div>
            </div>
            <div class="forms">
                <div class="form-content">
                    <div class="login-form">
                        <div class="title">Login Page</div>
                        <form action="#" method="post">
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input type="text" name="username" placeholder="Enter your username" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password" placeholder="Enter your password" required>
                                </div>
                                <div class="text">Forgot password?</div>
                                <div class="button input-box">
                                    <input type="submit" value="Login" name="login">
                                </div>
                                <div class="text sign-up-text">Don't have an account? <span
                                        onclick="Index.func.RegisterPopUp()">Signup
                                        now</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <span class="closeBtn" onclick="Index.func.CloseLogin()">&times;</span>
    </div>

    <?php
    if (@$_POST['login'] == "Login") {

        require_once "../controller/pdo.php";
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = ? and password = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);

        $stmt->execute();
        $user = $stmt->fetch();

        if (empty($user)) {
            echo "<script>alert('Your username or password is incorrect')</script>";
            header('Refresh:0');
        } else {
            $_SESSION['username'] = $username;
            header('Location: index.php');
        }
    }
    ?>

    <!-- register -->
    <div class="register-box">
        <h2>Register</h2>
        <label for="show" class="close-btn" onclick="Index.func.CloseRegister()">&times;</label>

        <form action="../controller/register.php" method="post" id="registerForm">
            <label>Username:</label><br>
            <input type="text" placeholder="Please enter your username" name="username" id="username"><br>
            <label>E-mail Address:</label><br>
            <input type="email" placeholder="Please enter your E-mail" name="email" id="email"><br>
            <label>Phone:</label><br>
            <input type="text" placeholder="Please enter your phone number" name="phone" id="phone"><br>
            <label>Password:</label><br>
            <input type="password" placeholder="Please enter your password" name="password" id="password"><br>
            <label>Confirm Password:</label><br>
            <input type="password" placeholder="Please confirm your password" id="Cpassword"><br>
        </form>
        <input type="button" value="Sign up" name="Signupa" class="Signup" onclick="register()">
    </div>

    <?php
    ob_end_flush();
    ?>

    <script src="../static/js/index.js"></script>
    <script src="../static/js/register.js"></script>
    <script>Index.func.init()</script>
</body>

</html>