<?php
include "db.php";
$login = trim($_POST['login']);
$password = trim($_POST['password']);
if(!empty($login) && !empty($password)){
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $sql = "SELECT `name` FROM `user` WHERE `name` = :login";
    $param = ['login' => $login];
    $stmt = $db->prepare($sql);
    $stmt->execute($param);
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    if($user){
        setcookie('error', 'Такой пользователь уже существует', time()+3);
        header('location: reg.php');
    }else{
        $sql = "INSERT INTO `user` (`name`, `password`)  VALUES (:login , :password)";
        $param = ['login' => $login, 'password' => $password];
        $stmt = $db->prepare($sql);
        $stmt->execute($param);
        setcookie('name', $login, time()+3600);
        header('location: index.php');      
    }
}else{
    setcookie('error', 'Поля не заполнены', time()+3);
    header('location: reg.php');
}

?>