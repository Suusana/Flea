<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>LOGIN PAGE</h1>
    <form action="./homepage.html" method="post">
        Username:<input type="text" name="username">
        Password:<input type="text" name="password">
        <input type="submit">
    </form>

    <?php
    include_once("./connect.php");
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? and password = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);

    $stmt->execute();
    $user = $stmt->fetch();

    if (empty($user)) {
        header('Refresh:0');
    } else {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }
    ?>


</body>

</html>