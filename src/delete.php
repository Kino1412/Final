<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
<div class="container"> 
<?php require 'db-connect.php'; ?>
<?php
     $pdo = new PDO($connect, USER, PASS);
     $sql=$pdo->prepare('delete from mylist where id=?');
     if($sql->execute([$_GET['id']])){
        echo '削除に成功しました。';
     }else{
        echo '削除に失敗しました。';
     }
     echo '<p><a href="mylist.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
?>
</div>
</body>
</html>