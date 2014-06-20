<?php
use TreinaWeb\Util\Autoloader;
use TreinaWeb\Db\Adapter;
use TreinaWeb\Orm\Mapper;
use TreinaWeb\Controller\FrontController;

set_include_path(__DIR__ . PATH_SEPARATOR . get_include_path());
set_include_path((realpath(__DIR__ . '/../lib/vendor' ). PATH_SEPARATOR . get_include_path()));
require 'TreinaWeb/Util/Autoloader.php';
$autoloader = Autoloader::getInstance();

$config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . 'config.ini');
$adapter = new Adapter($config);
Mapper::$defaultAdapter = $adapter->factory();

$frontController = FrontController::getInstance();
$frontController->setPath(__DIR__ . DIRECTORY_SEPARATOR . 'Application' .
    DIRECTORY_SEPARATOR . 'View');
$frontController->dispatch();