<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include "db.php";
$get = $_GET['del'];
if($get != ''){
    $res = $db->query("SELECT `id`, `mylinks` FROM user_file WHERE `hash` = '$get'");
    $res2=$res->fetch();
    $file = $res2['id'];
    if($file !=''){
        $del = $db->query("DELETE FROM `user_file` WHERE `user_file`.`id` = '$file'");
        $name = "users_file/root/".$res2['mylinks'];
        unlink($name);
        header('location: http://92.253.206.13/index.php?id=files');
    }
}
