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
    

<?php require 'db-connect.php';?>
<div class="container">
<?php

$pdo=new PDO($connect,USER,PASS);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $ex = $_POST['ex'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $read_pro = $_POST['read_pro'];
    $author = $_POST['author'];
    $artist = $_POST['artist'];
    $image = $_FILES['image'];

    // Validation and sanitization of inputs should be done here

    // Prepare the SQL statement to insert the new product
$sql = $pdo->prepare('INSERT INTO mylist (name, ex, category, status, read_pro, author, artist, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');


    // Execute the query with the form data
   

    
    
    if ($sql->rowCount() > 0) {
        echo '新しい漫画情報を登録しました。'; // "New product information has been registered."
    } else {
        echo '漫画情報の登録に失敗しました。'; // "Failed to register product information."
    }
    if (is_uploaded_file($_FILES['image']['tmp_name'])){
        if(!file_exists('image')){
            mkdir('image');
        }
        $file='image/'.basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'],$file)){
            echo $file,'のアップロードに成功しました。';
            echo '<p><img src="',$file,'" alt="image"></p>';
            $sql->execute([$name, $ex, $category, $status, $read_pro, $author, $artist, $file]);
        } else {
            echo 'アップロードに失敗しました。';
        }
    } else {
        echo 'ファイルを選択してください。';
    }
}
echo '<form action="mylist.php" method="post"><input type="submit" value="戻る"></form>';
?>
</div>
 
</body>
</html>
