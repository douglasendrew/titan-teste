<?php 
    use Init\SystemInit;
    require __DIR__ ."/vendor/autoload.php";

    $init = new SystemInit();
    $init->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
?>