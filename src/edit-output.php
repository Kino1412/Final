<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>情報変更</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
    <?php require 'db-connect.php';?>
    <div class="container">
    <?php
$pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update mylist set name=?, ex=?, category=?, status=?, read_pro=?, author=?, artist=? where id=?');
    
    if (empty($_POST['name'])) {
        echo '漫画名を入力してください。';
    } else
    if (empty($_POST['ex'])) {
        echo '概要を入力してください。';
    } else
    if (empty($_POST['category'])) {
        echo 'カテゴリーを入力してください。';
    } else
    if (empty($_POST['status'])) {
        echo '連載状況を入力してください。';
    } else
    if (empty($_POST['read_pro'])) {
        echo '商品色を入力してください。';
    } else
    if (empty($_POST['author'])) {
        echo 'を入力してください。';
    } else
    if (empty($_POST['artist'])) {
        echo 'を入力してください。';
    } else
    if (is_uploaded_file($_FILES['image']['tmp_name'])){
        if(!file_exists('image')){
            mkdir('image');
        }
        $file='upload/'.basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'],$file)){
            echo $file,'のアップロードに成功しました。';
            echo '<p><img src="',$file,'" alt="image"></p>';
        } else {
            echo 'アップロードに失敗しました。';
        }
    } else {
        echo 'ファイルを選択してください。';
    }

    if(isset($_POST['id']) && $sql->execute([$_POST['name'],$_POST['ex'], $_POST['category'],$_POST['status'],$_POST['read_pro'],$_POST['author'],$_POST['artist'],$_POST['image'], $_POST['id']])){    
        echo '<font color="red">更新に成功しました。</font>';
    }else{
        echo '<font color="red">更新に失敗しました。</font>';
    }
    
?>
        <hr>
<?php

        echo '<p><a href="mylist.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
   
?>
</div>
</body>
</html>