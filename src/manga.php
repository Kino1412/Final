<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
    

<?php require 'db-connect.php'; ?>
<div class="container">
<?php
        $pdo = new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('select * from mylist where id=?');
        $sql->execute([$_REQUEST['id']]);
        foreach($sql as $row){
        echo '<div class="product-container">';
        
        // Add edit and delete buttons
        echo '<div class="edit-delete-buttons">';
        echo '<a href="edit.php?id=' . $row['id'].'"><img src="./image/edit.png" alt="Edit" width="25" height="25"></a>';
        echo '<a href="delete.php?id='.$row['id'].'" onclick="return confirm(\'この商品を削除しますか？\')"><img src="./image/trash-bin.png" alt="Delete" width="25" height="25"></a>';
        echo '</div>';
        
        echo '<div class="image-and-content">';
        echo '<div class="image">';
        echo '<img src="' . $row['image'] . '" alt="Product Image" width="200" height="150">';
        echo '</div>'; // Closing the .image div
        echo '<div class="content">';
        echo '<table>';
        echo '<tr><td>漫画名：</td><td>' . $row['name'] . '</td></tr>';
        echo '<tr><td>概要：</td><td>' . $row['ex'] . '</td></tr>';
        echo '<tr><td>カテゴリー：</td><td>' . $row['category'] . '</td></tr>';
        echo '<tr><td>連載状況：</td><td>' . $row['status'] . '</td></tr>';
        echo '<tr><td>読書状況：</td><td>' . $row['read_pro'] . '</td></tr>';
        echo '<tr><td>作者：</td><td>' . $row['author'] . '</td></tr>';
        echo '<tr><td>イラストレーター：</td><td>' . $row['artist'] . '</td></tr>';
        echo '</table>';
        
        echo '<input type="hidden" name="name" value="'.$row['name'].'">';
        echo '<input type="hidden" name="ex" value="'.$row['ex'].'">';
        echo '<input type="hidden" name="category" value="'.$row['category'].'">';
        echo '<input type="hidden" name="status" value="'.$row['status'].'">';
        echo '<input type="hidden" name="read_pro" value="'.$row['read_pro'].'">';
        echo '<input type="hidden" name="author" value="'.$row['author'].'">';
        echo '<input type="hidden" name="artist" value="'.$row['artist'].'">';
        echo '</div>'; // Closing the .content div
        echo '</div>';
        echo '</div>'; // Closing the .product-container div
        echo '<p><a href="mylist.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
    }

        ?>
    </div> 
</div>   
</body>
</html>   

