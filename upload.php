<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include "db.php";
/* if($_FILES['userfile']['error']>0){
    echo "<p>Ошибка</p>";
    switch($_FILES['userfile']['error']){
        case 1: echo "размер файла больше допустимого"; break;
        case 3: echo "загружена только часть файла"; break;
        case 4: echo "файл небыл загружен"; break;

    }
    exit;
} */

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $h = md5_file($_FILES["inputfile"]["tmp_name"]);
    $rezult = move_uploaded_file($_FILES["inputfile"]["tmp_name"], "users_file/root/".$_FILES["inputfile"]["name"]);
    $n = $_COOKIE['name'];
    $l = $_FILES["inputfile"]["name"];
    $sql="INSERT INTO user_file (name, hash, link) VALUES (:name, :hash, :link)";
    $param = ['name' => $n, 'hash' => $h, 'link' => $l];
    $stmt = $db->prepare($sql);
    $stmt->execute($param);
    header("location: index.php?id=files");
}
?>
