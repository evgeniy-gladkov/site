<?php
include_once "db.php";
$get = $_GET['del'];
if($get != ''){
    $res = $db->query("SELECT `id`, `link` FROM user_file WHERE `hash` = '$get'");
    $res2=$res->fetch();
    $file = $res2['id'];
    if($file !=''){
        $del = $db->query("DELETE FROM `user_file` WHERE `user_file`.`id` = '$file'");
        $name = "users_file/root/".$res2['link'];
        unlink($name);
        header('location: index.php?id=files');
    }
}
