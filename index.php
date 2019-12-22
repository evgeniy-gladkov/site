<?php
//test git
if(!isset($_COOKIE['name'])){
    echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link href='css/style.css' rel='stylesheet'>
    <title>index.php</title>
</head>
<body>
    <div class='entry'>
        <form class='form' action='login.php' method='POST'>
            <p align='center'>ВХОД</p>
            <input class='login' type='text' name='login'><br>
            <input class='pass' type='password' name='password'><br>
            <input type='submit' value='ВХОД'>
            <p>login : root pass : 1234</p>
            <a href='reg.php'>регистрация</a>
        </form>
    </div>
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
    <link href='css/style.css' rel='stylesheet'>
    <title>index.php</title>
</head>
<body>";
    echo "<div class='wraper'>";
        echo "<div class='menu'>";
        echo "<a href='index.php'><p class='link-menu'>".$_COOKIE['name']."</p></a>";
        echo "<a href='index.php?id=files'><p class='link-menu'>FILES</p></a>";
        echo "<a href='quit.php'><p class='link-menu'>Выход</p></a>";
    echo "</div>";

    echo "<div class='content'>";
    switch($_SERVER['QUERY_STRING']){
        case 'id=files': include_once 'icloud/file.php'; break;
        default: echo "такой страницы нет";
    }
    echo "</div>";
    echo "</div>";
echo "</body>
</html>";
} 

/* СОРТИРОВКА ФАЙЛОВ ПО КАТАЛОГАМ */
//echo fileperms("users_file/root2");  
?>






