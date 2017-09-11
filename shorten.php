<?php
session_start();
require_once('classes/shortener.php');

$s = new Shortener;

if(isset($_POST['url'])){
     $url = $_POST['url'];
     if($code = $s->makeCode($url)){
        $_SESSION['feedback'] = "Generated! <a href=\"http://localhost/linkshortner/{$code}\">http://localhost/linkshortner/{$code}</a>";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
     }else{
        $_SESSION['feedback'] = "There was a problem";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
     }
}
?>