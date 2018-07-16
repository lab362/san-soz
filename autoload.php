<?php 
spl_autoload_register(function ($class_name) {
    $filename = __DIR__ . "/class/" .$class_name . '.php';
    include $filename;
});