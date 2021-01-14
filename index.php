<?php
namespace serverBros;
use serverBros\hw3\controllers;

$Method = 'ViewGenreDB';
$controller = 'ViewGenre';
$arg1 = '';
$arg2 = '';
$arg3 = '';
if (isset($_GET['m'])) {
    $Method = $_GET['m'];
}
if (isset($_GET['c'])) {
    $controller = $_GET['c'];
}
if (isset($_GET['arg1'])) {
    $arg1 = $_GET['arg1'];
}
if (isset($_GET['arg2'])) {
    $arg2 = $_GET['arg2'];
}
if (isset($_GET['arg3'])) {
    $arg3 = $_GET['arg3'];
}
include('src/controllers/' . $controller . '.php');
$class = 'serverBros\\hw3\\controllers\\'.$controller;
$obj = new $class();
$obj->$Method($arg1,$arg2,$arg3);