<?php
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + round($mtime[0], 3);
define("TSTART", $mtime);
session_start();


// Подключаем классы
spl_autoload_register(function ($class) {
    require_once('protected/class/' . $class . '.php');
});


require_once('protected/controller.php');



$controller = new controller;


//echo $controller->color;
//
// url manager
// получаем имя метода из URL и заносим его в $matches
//preg_match_all('/\/(.*?)(\.|$|\?)/i', $_SERVER['REQUEST_URI'], $matches);
//if (preg_match("/(^\/resize$)/i", $_SERVER['REQUEST_URI']))
//    $controller->resize();

if (preg_match("/(^\/$|^\/index.php$)/i", $_SERVER['REQUEST_URI']))
    $controller->index();

if (preg_match("/^\/clogin$/i", $_SERVER['REQUEST_URI']))
    $controller->login();

if (preg_match("/(^\/logout$)/i", $_SERVER['REQUEST_URI']))
    $controller->logout();

if (preg_match("/(^\/phones$)/i", $_SERVER['REQUEST_URI']))
    $controller->phones();

if (preg_match("/(^\/add_phone$)/i", $_SERVER['REQUEST_URI']))
    $controller->add_phone();

if (preg_match("/(^\/edit_phone)/i", $_SERVER['REQUEST_URI']))
    $controller->edit_phone();

if (preg_match("/(^\/delete_phone)/i", $_SERVER['REQUEST_URI']))
    $controller->delete_phone();

if (preg_match("/(^\/refs)/i", $_SERVER['REQUEST_URI']))
    $controller->refs();

if (preg_match("/(^\/ref)/i", $_SERVER['REQUEST_URI']))
    $controller->ref();

if (preg_match("/(^\/add_ref_item)/i", $_SERVER['REQUEST_URI']))
    $controller->add_ref_item();

if (preg_match("/(^\/edit_ref_item)/i", $_SERVER['REQUEST_URI']))
    $controller->edit_ref_item();

if (preg_match("/(^\/status)/i", $_SERVER['REQUEST_URI']))
    $controller->status();

if (preg_match("/(^\/delete_ref_item)/i", $_SERVER['REQUEST_URI']))
    $controller->delete_ref_item();

$controller->notfound();
