<?php
setcookie("name", NULL, time()-3600);
header("location: index.php");
?>