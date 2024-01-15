<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品情報変更</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
    <?php require 'header.php';?>
    <?php require 'db-connect.php';?>
    <div class="container">
    <?php
$pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update Shohin set  name=?, ex=?, price=?, size=?, color=?, category=?, sozai=?, zaiko=?, image=? where id=?');
    
    if (empty($_POST['name'])) {
        echo '商品名を入力してください。';
    } else
    if (empty($_POST['ex'])) {
        echo '商品説明を入力してください。';
    } else
    if (!preg_match('/[0-9]+/', $_POST['price'])) {
        echo '商品価格を整数で入力してください。';
    } else
    if (empty($_POST['size'])) {
        echo '商品サイズを入力してください。';
    } else
    if (empty($_POST['color'])) {
        echo '商品色を入力してください。';
    } else
    if (empty($_POST['category'])) {
        echo 'カテゴリーを入力してください。';
    } else
    if (empty($_POST['sozai'])) {
        echo '商品素材を入力してください。';
    } else
    if (!preg_match('/[0-9]+/', $_POST['zaiko'])) {
        echo '商品在庫を整数で入力してください。';
    } else
    if (empty($_POST['image'])) {
        echo 'パスを入力してください。';
    }
    if($sql->execute([$_POST['name'],$_POST['ex'], $_POST['price'],$_POST['size'],$_POST['color'],$_POST['category'],$_POST['sozai'],$_POST['zaiko'],$_POST['image'], $_POST['id']])){
        echo '<font color="red">更新に成功しました。</font>';
    }else{
        echo '<font color="red">更新に失敗しました。</font>';
    }
    
?>
        <hr>
<?php

        echo '<p><a href="ad-product.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
   
?>
</div>
<?php require 'footer.php';?>
</body>
</html>