<?php
//$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
if (isset($_POST['logout-submit'])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ./");
}
else{
    header("Location: ./");
    exit();
}