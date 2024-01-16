<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追加</title>
    <link rel="stylesheet" href="css/add-pro.css">
</head>
<body>
    
<div class="container">
<?php
$id = $name = $ex = $price = $category = $status = $read_pro = $author = $artist = $image = '';

echo '<form action="add-output.php" method="post" enctype="multipart/form-data">';
echo '<table>';
echo '<tr><td>リスト番号</td>';
echo '<td><input type="text" name="id" value="', $id , '">';
echo '</td></tr>';
echo '<tr><td>名<漫画/td>';
echo '<td><input type="text" name="name" value="', $name , '">';
echo '</td></tr>';
echo '<tr><td>概要</td>';
echo '<td><input type="text" name="ex" value="', $ex , '">';
echo '</td></tr>';
echo '<tr><td>カテゴリー</td>';
echo '<td><input type="text" name="category" value="', $category , '">';
echo '</td></tr>';
echo '<tr><td>連載状況</td>';
echo '<td><input type="text" name="status" value="', $status , '">';
echo '</td></tr>';
echo '<tr><td>読書状況</td>';
echo '<td><input type="text" name="read_pro" value="', $read_pro , '">';
echo '</td></tr>';
echo '<tr><td>作者</td>';
echo '<td><input type="text" name="author" value="', $author , '">';
echo '</td></tr>';
echo '<tr><td>イラストレーター</td>';
echo '<td><input type="text" name="artist" value="', $artist , '">';
echo '</td></tr>';
echo '<tr><td>商品画像</td>';
echo '<td><input type="file" name="image">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="確定">';
echo '</form>';

?>
</div> 

</body>
</html>