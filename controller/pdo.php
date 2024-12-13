<?php
$dsn='mysql:dbname=flea;host=localhost';
$user ='root';
$password='';
try{
    $pdo = new PDO($dsn,$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e){
    echo 'Database connection failed: '.$e->getMessage();
}
?>