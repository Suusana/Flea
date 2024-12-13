<!-- publish post -->
<?php
if (@$_POST['publish'] == "publish") {
    require_once "./pdo.php";
    $title = $_POST['title'];
    $content = $_POST['text'];
    $price = $_POST['price'];
    $date = date('Y-m-d');
    $file = $_FILES['file'];
    $username = $_POST['username'];


    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    if ($fileError === 4) {
        // no image
        $sql = "INSERT INTO posts (title,content,price,date,P_username) VALUES('$title','$content',$price,'$date','$username')";
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

                    $sql = "INSERT INTO posts (title,content,price,date,P_username,image) VALUES('$title','$content',$price,'$date','$username','$fileDestination')";
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