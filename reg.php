<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='css/style.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>

<div class='entry'>    
    <form class='form' action="pf.php" method="POST">
        <p align='center'>РЕГИСТРАЦИЯ</p>
        <input class='login' type="text" name="login" placeholder='login'><br>
        <input class='pass' type="password" name="password" placeholder='password'><br>
        <input class='submit' type="submit" value="зарегистрация"><br>
        <br><a class='reg' href="index.php">Главная</a>
        <?php
            if(!isset($_COOKIE['name'])){
                echo "<br>".$_COOKIE['error'];
            }
        ?>
    </form>
</div>    

</body>
</html>



