<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include_once "db.php";
if(!isset($_COOKIE['name'])){
    header("location: index.php");
    exit;
}
echo "<form method='post' action='upload.php' enctype='multipart/form-data'>
<label for='inputfile'></label>
<input type='file' id='inputfile' name='inputfile'></br>
<input type='submit' value='загрузить'>
</form>";
$login = $_COOKIE['name'];
$sql = "SELECT `name`, `hash`, `link` FROM user_file WHERE `name` LIKE '$login'";
$stmt = $db->query($sql);
if($stmt){
    while($row=$stmt->fetch()){
        echo "<a href='download.php?file={$row['hash']}'>".$row['link']."</a> <a href='del.php?del={$row['hash']}'> DELETED </a><br>";
    }    
}
?>