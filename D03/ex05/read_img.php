<?php
header("content-type:image/png");
// cd ~
// php -S localhost:8100
//curl 'http://e3r9p16:8100/Desktop/PHP_MonGit/D03/ex05/read_img.php'
$file =  '../img/42.png';
readfile($file);

?>
