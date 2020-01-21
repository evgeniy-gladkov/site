<?php
/* выводить расширение файла sound-1.mp3 = mp3*/
function string_type_file($string){
    if($string){
        $search = explode('.', $string);
        $count = count($search);
        return $search[$count-1];
    }
};
?>