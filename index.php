<?php
//test git
if(!isset($_COOKIE['name'])){
    echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>index.php</title>
</head>
<body>
<form action='login.php' method='POST'>
    <input type='text' name='login'>
    <input type='password' name='password'>
    <input type='submit' value='ВХОД'>
    <p>login : root pass : 1234</p>
    <a href='reg.php'>регистрация</a>
</form>

</hr>   
</body>
</html>";
echo $_COOKIE['error'];
}else{
    echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>index.php</title>
</head>
<body>";
    echo "<p><a href='index.php'>".$_COOKIE['name']."</a></p>";
    echo "<p><a href='index.php?id=files'>FILES</a></p>";
    echo "<p><a href='quit.php'>Выход</a></p><hr>";

    
    switch($_SERVER['QUERY_STRING']){
        case 'id=files': include_once 'icloud/file.php'; break;
        default: echo "такой страницы нет";
    }
echo "</body>
</html>";
} 

/* СОРТИРОВКА ФАЙЛОВ ПО КАТАЛОГАМ */
//echo fileperms("users_file/root2");  
?>






