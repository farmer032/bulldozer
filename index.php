<?php

require_once 'src/autoload/Autoloader.php';

$autoLoader = new Autoloader("src");
$autoLoader->loadClasses();

$frontController = new FrontController();
$frontController->index();

