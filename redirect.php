<?php
session_start();
require_once('classes/shortener.php');

if(isset($_GET['code'])){
    $s = new Shortener;
    $code = $_GET['code'];
   
    if($url = $s->getUrl($code)){
        header("Location: {$url}");
        die();
    }
}
header("Location: index.php");