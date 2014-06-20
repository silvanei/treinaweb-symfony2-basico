<?php

use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\Yaml\Parser;
use TreinaWeb2\Db\Adapter;
use TreinaWeb2\Orm\Mapper;
use TreinaWeb2\Controller\FrontController;

set_include_path(__DIR__ . PATH_SEPARATOR . get_include_path());

$symfonyPath = realpath(__DIR__ . '/../Symfony/vendor/symfony/symfony/src' );
require $symfonyPath . '/Symfony/Component/ClassLoader/UniversalClassLoader.php';
$loader = new UniversalClassLoader();
$loader->useIncludePath(true);
$loader->registerNamespace('Symfony', $symfonyPath);
$loader->registerNamespace('TreinaWeb2', (realpath(__DIR__ . '/../lib/vendor' )));
$loader->register();

$yaml = new Parser();
$config = $yaml->parse(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'config.yml'));

$adapter = new Adapter($config);
Mapper::$defaultAdapter = $adapter->factory();

$frontController = FrontController::getInstance();
$frontController->setPath(__DIR__ . DIRECTORY_SEPARATOR . 'Application' .
    DIRECTORY_SEPARATOR . 'View');
$frontController->dispatch();