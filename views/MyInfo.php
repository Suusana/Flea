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

    <div class="top1 wrapper">
        <img src="../static/Pimg/01.jpg">
        <div class="text">
            <?php echo $_SESSION['username'] ?>
        </div>
    </div>

    <div class="left-nav">
        <ul>
            <li class="active" id="nav">
                <span class="iconfont icon-xiazai43"></span>
                Modify personal information
            </li>
            <li id="nav">
                <span class="iconfont icon-fabu"></span>
                Publishing posts
            </li>
            <li id="nav">
                <span class="iconfont icon-shebeiguanli"></span>
                Manage posts
            </li>
            <li id="nav">
                <span class="iconfont icon-icon-"></span>
                Manage Collections
            </li>
            <li id="nav">
                <span class="iconfont icon-dingdan"></span>
                Transaction information
            </li>
        </ul>
    </div>
    <!-- <div class="info show" id="my"> 
        <img src="../static/Pimg/01.jpg">
        <p>User Id: 1
            <br>
            
            <br>

        </p>

        <form action="./MyInfo.php" method="post" id="Info">
            <label for="name">Name: <br>
                <input type="text" id="name" name="name"></label><br>
            Gender:
            <div class="sex">
                <label for="sex1"><input type="radio" name="gender" id="sex1" value="Male">Male</label>
                <label for="sex2"><input type="radio" name="gender" id="sex2" value="Female">Female </label><br>
            </div>
            <label for="email"> E-mail: <br>
                <input type="email" id="email" name="email"></label><br>
            <label for="phone">Phone number: <br>
                <input type="text" id="phone" name="phone"></label><br>
            <label for="addr">Address: <br>
                <input type="text" id="addr" name="address"></label><br>
            <input type="button" id="submitForm" value="save and submit">
        </form>
    </div>-->

    <!-- user information -->
    <?php
    include_once "../controller/pdo.php";
    $Curretusername = $_SESSION['username'];

    $sql = "SELECT * FROM users WHERE username = '$Curretusername'";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $user = $stmt->fetch();

    $Id = $user['userId'];
    $username = $user['username'];
    $name = $user['name'];
    $gender = $user['gender'];
    $email = $user['email'];
    $phone = $user['contact'];
    $address = $user['address'];
    echo "<div class='info show' id='my'>
    <img src='../static/Pimg/01.jpg'>
    <p>User Id: $Id
        <br>
        Username:$username
        <br>
    </p>

    <form action='./MyInfo.php' method='post' id='Info'>
        <label for='name'>Name: <br>
            <input type='text' id='name' name='name' value='$name'></label><br>
        Gender:
        <div class='sex'>";
    if ($gender == 0) {
        echo "<label for='sex1'><input type='radio' name='gender' id='sex1' value='0' checked>Male</label>
            <label for='sex2'><input type='radio' name='gender' id='sex2' value='1'>Female </label><br>";
    } else {
        echo "<label for='sex1'><input type='radio' name='gender' id='sex1' value='0'>Male</label>
            <label for='sex2'><input type='radio' name='gender' id='sex2' value='1' checked>Female </label><br>";
    }
    echo "</div>
        <label for='email'> E-mail: <br>
            <input type='email' id='email' name='email' value='$email'></label><br>
        <label for='phone'>Phone number: <br>
            <input type='text' id='phone' name='phone' value='$phone'></label><br>
        <label for='addr'>Address: <br>
            <input type='text' id='addr' name='address' value='$address'></label><br>
            <input type='hidden' id='id' name='id' value='$Id'>
        <input type='submit' id='submitForm' name='save' value='saveAndSubmit'>
    </form>
</div>";
    ?>

    <!-- update user information -->
    <?php
    if (@$_POST['save'] == "saveAndSubmit") {
        include_once "../controller/pdo.php";
        $UpdateName = $_POST['name'];
        $UpdateGender = $_POST['gender'];
        $UpdateEmail = $_POST['email'];
        $UpdatePhone = $_POST['phone'];
        $UpdateAddress = $_POST['address'];
        $Id = $_POST['id'];

        $sql = "UPDATE users set name='$UpdateName',gender='$UpdateGender',email='$UpdateEmail',contact = '$UpdatePhone',address='$UpdateAddress'WHERE userId = $Id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        header("Refresh:0");
    }
    ?>

    <!-- <div class="info" id="publish">
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
    </div> -->

    <?php
    include_once "../controller/pdo.php";
    echo "<div class='info' id='publish'>
    <div class='box'>
        <form action='../controller/upload.php' method='post' onsubmit='return validate()' id='publishPost'
            enctype='multipart/form-data'>
            <input type='text' name='title' placeholder='Please enter your title'>
            <textarea id='content' name='text' placeholder='Write what you want to write!'></textarea>
            <input type='file' name='file' id='upload'>
            <input type='text' name='price' placeholder='please write your price' id='price'>
            <input type='submit' value='publish' name='publish' id='publishForm'>
            <input type='hidden' value='$username' name='username'>
        </form>
    </div>
</div>";
    ?>


    <!-- <div class="info show" id="manage">
        <div class="manage" id="managePost">
            <h3>Manage your posts</h3> -->
    <!-- <div class="post">
                <img src="../static/Pimg/01.jpg">
                <div class="content">
                    <span>Shaking chairs sold at a loss</span>
                    <p>Disposal of used rocking chairs at home, it is very comfortable, simple and generous <br>
                        Style: it is thickened and adjustable (five-speed)<br>
                        Color: gray</p>
                </div>
                <div class="button">
                    <div class="iconfont icon-xiazai43" id="modify"></div>
                    <div class="iconfont icon-lajitong" onclick="doDel($id)"></div>
                </div>
            </div> -->
    <!-- </div>
    </div> -->

    <!-- display posts -->
    <?php
    require_once "../controller/pdo.php";
    $sql = "SELECT * FROM posts WHERE P_username = '$username';";
    $stmt = $pdo->query($sql);
    $count = $stmt->rowCount();
    $stmt->execute();
    if ($count != 0) {
        echo "<div class='info' id='manage'>
        <div class='manage'>
            <h3>Manage your posts</h3>";
        while ($post = $stmt->fetch()) {
            $image = $post['image'];
            $title = $post['title'];
            $content = $post['content'];
            $id = $post['postId'];
            echo "<div class='post'>
            <img src='$image'>
            <div class='content'>
                <span>$title</span>
                <p>$content</p>
            </div>
            <div class='button'>
                <div class='iconfont icon-xiazai43' onclick = 'Edit($id)'></div>
                <div class='iconfont icon-lajitong' onclick = 'Delete($id)'></div>
            </div>
        </div>";
        }
        echo "</div>
        </div>";
    } else {
        echo "<div class='info' id='manage'>
        <div class='manage'>
            <h3>Manage your posts</h3>
        <p style='margin-left:300px; font-size:30px'>You do not have any posts!!</p>
        </div>
        </div>";
    }
    ?>

    <!-- 
    <div class="info show" id="collection">
        <div class="manage">
            <h3>Manage your collection</h3>
            <div class="post">
                <img src="../static/Pimg/01.jpg">
                <div class="content">
                    <span>Shaking chairs sold at a loss</span>
                    <p>Disposal of used rocking chairs at home, it is very comfortable, simple and generous <br>
                        Style: it is thickened and adjustable (five-speed)<br>
                        Color: gray</p>
                </div>
                <div class="iconfont icon-icon-"></div>
            </div>
        </div>
    </div> -->

    <!-- display collections -->
    <?php
    require_once "../controller/pdo.php";
    $id = $user['userId'];

    $sql = "SELECT post_id FROM collections WHERE user_id = $id";
    $stmt = $pdo->query($sql);
    $count = $stmt->rowCount();
    $stmt->execute();
    $ids = $stmt->fetchAll();
    if ($count != 0) {
        echo "<div class='info' id='collection'>
        <div class='manage'>
            <h3>Manage your collection</h3>";
        foreach ($ids as $Id) {
            $postid = $Id['post_id'];
            $sql = "SELECT * FROM posts WHERE postId = '$postid'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $post = $stmt->fetch();
            $title = $post['title'];
            $image = $post['image'];
            $content = $post['content'];
            echo "
        
            <div class='post'>
                <img src='$image'>
                <div class='content'>
                    <span>$title</span>
                    <p>$content</p>
                </div>
                <div class='iconfont icon-icon-' onclick = 'cancel($postid)'></div>
            </div>
        
        ";
        }
        echo "</div>
    </div>";
    } else {
        echo "<div class='info' id='manage'>
        <div class='manage'>
            <h3>Manage your collections</h3>
        <p style='margin-left:300px; font-size:30px'>You do not have any collections!!</p>
        </div>
        </div>";
    }
    ?>


    <!-- <div class="info" id="order">
        <div class="manage">
            <div class="post">
                <img src="../static/Pimg/01.jpg">
                <div class="content">
                    <span>Shaking chairs sold at a loss</span>
                    <p>Disposal of used rocking chairs at home, it is very comfortable, simple and generous <br>
                        Style: it is thickened and adjustable (five-speed)<br>
                        Color: gray</p>
                </div>
                <div class="num">× 1</div>
                <div class="order">
                    <p>Order Id:</p><span>1</span>
                    <p>payment:</p><span>RM 2500</span>
                    <P>Create on:</P><span>2023-10-10</span>
                </div>
            </div>

        </div>
    </div> -->

    <?php
    $sql = "SELECT * FROM orders WHERE userID = '$id'";
    $stmt = $pdo->query($sql);
    $count = $stmt->rowCount();
    $stmt->execute();
    $orders = $stmt->fetchAll();

    if ($count != 0) {
        echo "    <div class='info' id='order'>
        <div class='manage'>";

        foreach ($orders as $order) {
            $orderid = $order['orderId'];
            $postid = $order['postID'];
            $date = $order['date'];
            $status = $order['status'];
            $sql = "SELECT * FROM posts WHERE postId = '$postid'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $post = $stmt->fetch();

            $title = $post['title'];
            $image = $post['image'];
            $content = $post['content'];
            $price = $post['price'];

            echo " <h5 id = 'comfirm' onclick='comfirm($orderid,$status)'>comfirm</h5>
            <div class='post'>
            <img src='$image'>
           
            <div class='content'>
                <span>$title</span>
                <p>$content</p>
            </div>
            <div class='num'>× 1</div>
            <div class='order'>
                <p>Order Id:</p><span>$orderid</span>
                <p>payment:</p><span>RM $price</span>
                <P>Create on:</P><span>$date</span>";
            if ($status == 0) {
                echo "<P>Status:</P><span>Processing</span>";
            } else {
                echo "<P>Status:</P><span>Complete</span>";
            }
            echo "</div>
        </div>";
        }
        echo "        </div>
        </div>";

    } else {
        echo "<div class='info' id='manage'>
        <div class='manage'>
        <p style='margin-left:300px; font-size:30px'>You do not have any collections!!</p>
        </div>
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
    <script src="../static/js/MyInfo.js"></script>
</body>

</html>