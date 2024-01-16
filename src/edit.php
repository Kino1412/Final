<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>情報変更</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
        <?php require 'db-connect.php'; ?>
        <div class="container">

        <?php
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('select * from mylist where id=?');
        $sql->execute([$_GET['id']]);
        foreach ($sql as $row){
            echo '<form action="edit-output.php" method="post" enctype="multipart/form-data">';
            echo '<td><input type="hidden" name="id" value="', $_GET['id'] , '">';
echo '<table>';
echo '<tr><td>漫画名</td>';
echo '<td><input type="text" name="name" value="', $row['name'] , '">';
echo '</td></tr>';
echo '<tr><td>概要  </td>';
echo '<td><input type="text" name="ex" value="', $row['ex'] , '">';
echo '</td></tr>';
echo '<tr><td>カテゴリー</td>';
echo '<td><input type="text" name="category" value="', $row['category'] , '">';
echo '</td></tr>';
echo '<tr><td>連載状況</td>';
echo '<td><input type="text" name="status" value="', $row['status'] , '">';
echo '</td></tr>';
echo '<tr><td>読書状況</td>';
echo '<td><input type="text" name="read_pro" value="', $row['read_pro'] , '">';
echo '</td></tr>';
echo '<tr><td>作者</td>';
echo '<td><input type="text" name="author" value="', $row['author'] , '">';
echo '</td></tr>';
echo '<tr><td>イラストレーター</td>';
echo '<td><input type="text" name="artist" value="', $row['artist'] , '">';
echo '</td></tr>';
echo '<tr><td>商品画像</td>';
echo '<td><input type="file" name="image" value="', $row['image'] , '">';
echo '</td></tr>';

echo '</table>';
echo '<input type="submit" value="変更">';
echo '</form>';
echo '<p><a href="mylist.php"><img src="./image/undo.png" alt="Detail" width="30" height="30"></a></p>';
        }
?>
</body>
</html>