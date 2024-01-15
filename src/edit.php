<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品情報変更</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
        <?php require 'header.php'; ?>
        <?php require 'db-connect.php'; ?>
        <div class="container">

        <?php
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('select * from product where id=?');
        $sql->execute([$_GET['id']]);
        foreach ($sql as $row){
            echo '<form action="pro-edit-output.php" method="post" enctype="multipart/form-data">';
echo '<table>';
echo '<tr><td>商品番号</td>';
echo '<td><input type="text" name="id" value="', $row['id'] , '">';
echo '</td></tr>';
echo '<tr><td>商品名</td>';
echo '<td><input type="text" name="name" value="', $row['name'] , '">';
echo '</td></tr>';
echo '<tr><td>商品説明</td>';
echo '<td><input type="text" name="ex" value="', $row['ex'] , '">';
echo '</td></tr>';
echo '<tr><td>価格</td>';
echo '<td><input type="text" name="price" value="', $row['price'] , '">';
echo '</td></tr>';
echo '<tr><td>サイズ</td>';
echo '<td><input type="text" name="size" value="', $row['size'] , '">';
echo '</td></tr>';
echo '<tr><td>色</td>';
echo '<td><input type="text" name="color" value="', $row['color'] , '">';
echo '</td></tr>';
echo '<tr><td>カテゴリー</td>';
echo '<td><input type="text" name="category" value="', $row['category'] , '">';
echo '</td></tr>';
echo '<tr><td>素材</td>';
echo '<td><input type="text" name="sozai" value="', $row['sozai'] , '">';
echo '</td></tr>';
echo '<tr><td>在庫</td>';
echo '<td><input type="text" name="zaiko" value="', $row['zaiko'] , '">';
echo '</td></tr>';
echo '<tr><td>商品画像</td>';
echo '<td><input type="text" name="image" value="', $row['image'] , '">';
echo '</td></tr>';

echo '</table>';
echo '<input type="submit" value="変更">';
echo '</form>';
echo '<p><a href="ad-product.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
        }
?>
</body>
</html>