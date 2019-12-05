<?php
include_once "db.php";
$get = $_GET['file'];
if($get != ''){
    $res = $db->query("SELECT `link` FROM user_file WHERE `hash` = '$get'");
    $res2=$res->fetch();
    $file = $res2['link'];
    if($file != ''){
        $file2 = "/var/www/html/users_file/root/".$file;
        if (file_exists($file2)) {
            if (ob_get_level()) {
                ob_end_clean();
            }
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file2).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file2));
            readfile($file2);
            exit;
        }
    }
}
header('location: index.php?id=files');