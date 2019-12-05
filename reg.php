<form action="pf.php" method="POST">
<input type="text" name="login">
<input type="password" name="password">
<input type="submit" value="зарегистрация">
</form>
<a href="index.php">Главная</a>
<?php
    if(!isset($_COOKIE['name'])){
        echo $_COOKIE['error'];
    }
?>