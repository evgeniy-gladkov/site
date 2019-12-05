<?php
include_once 'db.php';

$login = trim($_POST['login']);
$password = trim($_POST['password']);

if(!empty($login) && !empty($password)){
    $sql = 'SELECT name, password FROM user WHERE name = :login';
    $param = [':login' => $login];
    $stmt = $db->prepare($sql);
    $stmt->execute($param) ;
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if($user){
        if($password == $user->password){
            setcookie("name", $user->name, time()+3600);
            header('location: index.php');
        }else{
            setcookie("error", "НЕ ВЕРНЫЙ ЛОГИН ИЛИ ПАРОЛЬ", time()+3);
            header('location: index.php'); 
        }
    }else{
        setcookie("error", "НЕ ВЕРНЫЙ ЛОГИН ИЛИ ПАРОЛЬ", time()+3);
        header('location: index.php'); 
    }

}else{
    setcookie("error", "ПОЛЯ НЕ ЗАПОЛНЕНЫ", time()+3);
    header('location: index.php'); 
}
