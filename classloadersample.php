<?php
use Symfony\Component\Filesystem\Filesystem;


$symfonyPath = realpath('../Symfony/vendor/symfony/symfony/src');

require_once $symfonyPath . '/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;
$loader = new UniversalClassLoader();
// Você pode buscar nos caminhos definidos pela diretiva include_path como um último recurso.
$loader->useIncludePath(true);
// ... register namespace e prefixos aqui
$loader->registerNamespace('Symfony', $symfonyPath);
$loader->register();

$fs = new Filesystem();

var_dump($fs);