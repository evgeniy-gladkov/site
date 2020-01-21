<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include "db.php";
if(!isset($_COOKIE['name'])){
    header("location: index.php");
    exit;
}
echo "<form class='form-input' method='post' action='icloud/upload.php' enctype='multipart/form-data'>
<label class='form-br' for='inputfile'></label>
<input type='file' id='inputfile' name='inputfile'>
<input type='submit' value='загрузить'>
</form>";
$login = $_COOKIE['name'];
$sql = "SELECT `name`, `hash`, `date`, `mylinks` FROM user_file WHERE `name` LIKE '$login'";
$stmt = $db->query($sql);
if($stmt){
    while($row=$stmt->fetch()){
        echo "<a class='link-file' href='icloud/download.php?file={$row['hash']}'>".$row['mylinks']." <=> ".$row['date']."</a> <a class='link-file' href='icloud/del.php?del={$row['hash']}'> DELETED </a><br>";
    }    
}
?>