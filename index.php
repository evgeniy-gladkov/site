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
            <input class='login' type='text' name='login' placeholder='login'><br>
            <input class='pass' type='password' name='password' placeholder='password'><br>
            <input class='submit' type='submit' value='ВХОД'>
            <p>login : root pass : 1234</p>
            <a class='reg' href='reg.php'>регистрация</a>";
            echo $_COOKIE['error']."
        </form>
    </div>
   
</body>
</html>";

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
                echo "<a class='link-menu' href='index.php'>".$_COOKIE['name']."</a>";
                echo "<a class='link-menu' href='index.php?id=files'>ALL FILES</a>";
                echo "<a class='link-menu' href='index.php?id=photo'>PHOTO</a>";
                echo "<a class='link-menu' href='index.php?id=music'>MUSIC</a>";
                echo "<a class='link-menu' href='index.php?id=video'>VIDEO</a>";
                echo "<a class='link-menu' href='quit.php'>Выход</a>";
            echo "</div>";

            echo "<div class='content'>";
                    switch($_SERVER['QUERY_STRING']){
                        case 'id=files': include_once 'file.php'; break;
                        case 'id=photo': include_once 'photo.php'; break;
                        case 'id=music': include_once 'music.php'; break;
                        case 'id=video': include_once 'video.php'; break;
                        //default: echo "<img class='img' width='100px' height='100px'  src='users_file/root/2.mp3'></img>";
                        //default: include_once 'test.php';
                    }
            echo "</div>";
    echo "</div>";
echo "</body>
</html>";
} 
/* СОРТИРОВКА ФАЙЛОВ ПО КАТАЛОГАМ */
//echo fileperms("users_file/root2");  
?>






