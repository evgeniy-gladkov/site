<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include "db.php";
$get = $_GET['del'];
if($get != ''){
    $res = $db->query("SELECT `id`, `link` FROM user_file WHERE `hash` = '$get'");
    $res2=$res->fetch();
    $file = $res2['id'];
    if($file !=''){
        $del = $db->query("DELETE FROM `user_file` WHERE `user_file`.`id` = '$file'");
        $name = "http://localhost/users_file/root/".$res2['link'];
        unlink($name);
        header('location: http://localhost/index.php?id=files');
    }
}
