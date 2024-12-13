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
    <link rel="stylesheet" href="../static/css/MyInfo.css">
    <link rel="stylesheet" href="../static/iconfont/iconfont.css">
</head>

<body>
    <div class="header">
        <a href="../views/MyInfo.php" class="top">
            <div class="avatar"></div>
            <span>
                <?php echo $_SESSION['username'] ?>
            </span>
        </a>

        <div class="nav">
            <div class="box">
                <a href="../controller/index.php">
                    <p class="iconfont icon-zhuye"></p>
                    <span>Home</span>
                </a>
                <a href="../controller/Marketplace.php">
                    <p class="iconfont icon-shangpin"></p>
                    <span>Market Place</span>
                </a>
                <div class="logo">
                    <h1><a href="./index2.html">FLEA</a></h1>
                </div>
                <a href="../controller/Index.php">
                    <p class="iconfont icon-message_fill_light"></p>
                    <span>Message</span>
                </a>
                <a href="../controller/MyInfo.php">
                    <p class="iconfont icon-geren"></p>
                    <span>My Info</span>
                </a>
            </div>
        </div>
    </div>

    <div class="top1 wrapper">
        <img src="../static/Pimg/01.jpg">
        <div class="text">
            <?php echo $_SESSION['username'] ?>&nbsp;&nbsp;&nbsp;(Id: $Id)
        </div>
    </div>

    <div class="left-nav">
        <ul>
            <a href="../views/MyInfo.php">
                <li class="active" id="nav">
                    <span class="iconfont icon-xiazai43"></span>
                    Modify personal information
                </li>
            </a>
            <a href="../views/MyInfo.php">
                <li id="nav">
                    <span class="iconfont icon-fabu"></span>
                    Publishing posts
                </li>
            </a>
            <a href="../views/MyInfo.php">
                <li id="nav">
                    <span class="iconfont icon-shebeiguanli"></span>
                    Manage posts
                </li>
            </a>
            <a href="../views/MyInfo.php">
                <li id="nav">
                    <span class="iconfont icon-icon-"></span>
                    Manage Collections
                </li>
            </a>
            <a href="../views/MyInfo.php">
                <li id="nav">
                    <span class="iconfont icon-dingdan"></span>
                    Transaction information
                </li>
            </a>
        </ul>
    </div>


    <div class="info show" id="publish">
        <div class="box">
            <form action="./upload.php" method="post" onsubmit="return validate()" id="publishPost"
                enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Please enter your title">
                <textarea id="content" name="text" placeholder="Write what you want to write!"></textarea>
                <input type="file" name="file" id="upload">
                <input type="text" name="price" placeholder="please write your price" id="price">
                <input type="submit" value="publish" name="publish" id="publishForm">
                <input type="hidden" value="">
            </form>
        </div>
    </div>

    <?php
    include_once "pdo.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE postId = '$id'";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $post = $stmt->fetch();

    $title = $post['title'];
    $content = $post['content'];
    $price = $post['price'];

    echo "<div class='info show' id='publish'>
    <div class='box'>
        <form action='./edit.php?id=$id' method='post' onsubmit='return validate()' id='publishPost'
            enctype='multipart/form-data'>
            <input type='text' id='title' name='title' placeholder='Please enter your title' value='$title'>
            <textarea id='content' name='text' placeholder='Write what you want to write!'>$content</textarea>
            <input type='file' name='file' id='upload'>
            <input type='text' name='price' placeholder='please write your price' id='price' value='$price'>
            <input type='hidden' value='$id' name = 'id'>
            <input type='submit' value='publish' name='publish' id='update'>
        </form>
    </div>
</div>";
    ?>

    <?php
    if (@$_POST['publish'] == "publish") {
        include_once "./pdo.php";
        $UpdateTitle = $_POST['title'];
        $UpdateContent = $_POST['text'];
        $UpdatePrice = $_POST['price'];
        $Id = $_POST['id'];
        $date = date('Y-m-d');

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];


        if ($fileError === 4) {
            // no image
            $sql = "UPDATE posts set title='$UpdateTitle',content='$UpdateContent',price='$UpdatePrice',date='$date' WHERE postId = $Id;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            header('Location:../views/MyInfo.php');
        } else {
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 100000000) {
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileDestination = '../static/uploads/' . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);

                        $sql = "UPDATE posts set title = '$UpdateTitle', content ='$UpdateContent', price ='$UpdatePrice', date='$date', image = '$fileDestination' WHERE postId = $Id;";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        header("Location:../views/MyInfo.php");
                    } else {
                        echo "<script>alert('Your image is too big!')</script>";
                    }

                } else {
                    echo "<script>alert('Error to uploads')</script>";
                }
            } else {
                echo "<script>alert(You cannot upload this type of image!)</script>";
            }
        }
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
    <script src="../static/js/MyInfo.js"></script>
</body>

</html>