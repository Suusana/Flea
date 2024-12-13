<?php
include_once "./pdo.php";
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql = "SELECT username FROM users WHERE username='$username'";
$stmt = $pdo->query($sql);
$count = $stmt->rowCount();
$stmt->execute();
if ($count != 0) {
    //Username has exist
    header("location:../views/loginAndRegister.php?username=".$username.'HasAlreadyExist');
} else {
    $sql = "INSERT INTO users (username,email,contact,password) VALUES('$username','$email',$phone,'$password')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo "<script>alert('Register successfully!')</script>";
    header("location:../views/loginAndRegister.php");
}
?>