<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追加</title>
    <link rel="stylesheet" href="css/add-pro.css">
</head>
<body>
    
<?php require 'header.php';?>

<?php require 'db-connect.php';?>
<div class="container">
<?php

$pdo=new PDO($connect,USER,PASS);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $read_pro = $_POST['read_pro'];
    $author = $_POST['author'];
    $artist = $_POST['artist'];
    $image = $_POST['image'];

    // Validation and sanitization of inputs should be done here

    // Prepare the SQL statement to insert the new product
$sql = $pdo->prepare('INSERT INTO mylist (id,name, ex, category, status, read_pro, author, artist, image) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)');


    // Execute the query with the form data
   

    
    $sql->execute([$id,$name, $ex, $category, $status, $read_pro, $author, $artist, $image]);
    if ($sql->rowCount() > 0) {
        echo '新しい漫画情報を登録しました。'; // "New product information has been registered."
    } else {
        echo '漫画情報の登録に失敗しました。'; // "Failed to register product information."
    }
}
echo '<form action="mylist.php" method="post"><input type="submit" value="戻る"></form>';
?>
</div>
 <?php require 'footer.php'; ?>

</body>
</html>
