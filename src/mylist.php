<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My manga list</title>
    <link rel="stylesheet" href="./css/mylist.css">
</head>
<body>

<?php require 'db-connect.php'; ?>
<div class="search-bar">
<form action="ad-product.php" method="post">
    商品検索
    <input type="text" name="keyword">
    <input type="submit" name="検索">
</form>
</div>
<hr>
<div class="products-container">
    <?php
        $pdo = new PDO($connect, USER, PASS);
        if(isset($_POST['keyword'])){
            $sql = $pdo->prepare('select * from mylist where name like ?');
            $sql->execute(['%'.$_POST['keyword'].'%']);
        } else {
            $sql = $pdo->query('select * from mylist');
        }
        
        $counter = 0;
        foreach ($sql as $row) {
            if ($counter > 0 && $counter % 5 == 0) {
                echo '</div><div class="products-container">'; // This line is not needed anymore.
            }
            echo '<div class="product-item">';
            echo '<div class="product-image">';
            echo '<a href="ad-detail.php?id=' . $row['id'] . '"><img src="' . $row['image'] . '" alt="image"></a>';
            echo '</div>'; // Close product-image
            echo '<div class="product-info">';
            echo '<p>リスト番号：' . $row['id'] . '</p>';
            echo '<p>漫画名：' . $row['name'] . '</p>';
            echo '</div>'; // Close product-info
            echo '</div>'; // Close product-item
            $counter++;
            }
            
    ?>
       <div class="product-item">
        <a href="product-add.php" class="add-product-link">
            <img src="image/plus-symbol-button.png" alt="Add Product">
        </a>
    </div>
        
</div>
    

<?php require 'footer.php'; ?>
</body>
</html>