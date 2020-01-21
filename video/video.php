<?php
/* ПРОДУБЛИРОВАТЬ В ПАПКУ ЗАГРУЗКУ УДАЛЕНИЕ ФАЙЛОВ */
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include "db.php";

function select_photo($string, $hash){
    if($string){
        $search = explode('.', $string);
        $count = count($search);
        $res = strtolower($search[$count-1]);
        if($res == "mp4"){
            echo "<div>";
                echo "<video src='../users_file/root/{$string} controls></video>";
                
                echo "<a href='../icloud/download.php?file={$hash}'>скачать</a>";
                echo "<a href='../icloud/del.php?del={$hash}'>del</a>";
            echo "</div>";
        }
    }

};

if(!isset($_COOKIE['name'])){
    header("location: index.php");
    exit;
}
echo "<form class='form-input' method='post' action='http://92.253.206.13/icloud/upload.php' enctype='multipart/form-data'>
<label class='form-br' for='inputfile'></label>
<input type='file' id='inputfile' name='inputfile'>
<input type='submit' value='загрузить'>
</form>";
$login = $_COOKIE['name'];
$sql = "SELECT `name`, `hash`, `date`, `mylinks` FROM user_file WHERE `name` LIKE '$login'";
$stmt = $db->query($sql);

if($stmt){
    while($row=$stmt->fetch()){
        select_photo($row['mylinks'],$row['hash']);


        
       /*  switch(string_type_file(strtolower($row['mylinks']))){
            case 'jpg': echo $row['mylinks']."<br>"; break;
            case 'jpeg': echo $row['mylinks']."<br>"; break;
            case 'png': echo $row['mylinks']."<br>"; break;
            case 'gif': echo $row['mylinks']."<br>"; break;
        } */
       
       /* if(string_type_file(strtolower($row['mylinks'])) == "jpg"){
            echo $row['mylinks']."<br>";
       } */
        
        
    } 
        
}

/* if($stmt){
    while($row=$stmt->fetch()){
        echo "<a class='link-file' href='icloud/download.php?file={$row['hash']}'>".$row['mylinks']." <=> ".$row['date']."</a> <a class='link-file' href='icloud/del.php?del={$row['hash']}'> DELETED </a><br>";
    }    
} */

/* echo "
<div class='photo'>
    <img></img>
    <p>name</p>
    <p>share</p>
    <p>del</p>
</div>

"; */


?>