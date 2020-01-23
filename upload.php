<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include "db.php";
include "function.php";
/* if($_FILES['userfile']['error']>0){
    echo "<p>Ошибка</p>";
    switch($_FILES['userfile']['error']){
        case 1: echo "размер файла больше допустимого"; break;
        case 3: echo "загружена только часть файла"; break;
        case 4: echo "файл небыл загружен"; break;

    }
    exit;
} */


/* function string_type_file($string){
    if($string){
        $search = explode('.', $string);
        $count = count($search);
        echo $search[$count-1];
    }
}; */


/* при записи в базу - если не пишет проблема в разметки базы, проверь и сравни правильность столбцов (он просто не дает записать в этот столбец) убил часа 4*/

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES["inputfile"]["name"]==TRUE){
    $h = trim(md5_file($_FILES["inputfile"]["tmp_name"]));
    $rezult = move_uploaded_file($_FILES["inputfile"]["tmp_name"], "users_file/root/".$_FILES["inputfile"]["name"]);
    $n = trim($_COOKIE['name']);
    $l = trim($_FILES["inputfile"]["name"]);
    $d = date("d.m.Y");
    $t = string_type_file($l);
    $sql = "INSERT INTO user_file (name, hash, mylinks, date, type) VALUES (:name, :hash, :mylinks, :date, :type)";
    $param = ['name' => $n, 'hash' => $h, 'mylinks' => $l, 'date' => $d, 'type' => $t];
    $stmt = $db->prepare($sql);
    $stmt->execute($param);
    header("location: http://92.253.206.13/index.php?id=files");



    /* try {
        $h = trim(md5_file($_FILES["inputfile"]["tmp_name"]));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $n = trim($_COOKIE['name']);
        $l = trim($_FILES["inputfile"]["name"]);
        $d = date("d.m.Y");
        $t = string_type_file($l);
        $sql = "INSERT INTO user_file (name, hash, mylinks, date, type) VALUES (:name, :hash, :mylinks, :date, :type)";
        $param = ['name' => $n, 'hash' => $h, 'mylinks' => $l, 'date' => $d, 'type' => $t];
        $stmt = $db->prepare($sql);
        $stmt->execute($param);
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    } */
}
header("location: http://92.253.206.13/index.php?id=files");
?>
