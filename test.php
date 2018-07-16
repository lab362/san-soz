<?php 
include('autoload.php');
echo "<pre>";
print_r ( Speller::getInstance(($_GET['san'] ?? 0) )->renderAll() );
echo "</pre>";
