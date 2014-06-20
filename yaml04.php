<?php
header("Content-Type: text/html; charset=UTF-8");

use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;

$symfonyPath = realpath('../Symfony/vendor/symfony/symfony/src');

require_once $symfonyPath . '/Symfony/Component/ClassLoader/UniversalClassLoader.php';

$loader = new UniversalClassLoader();

$loader->useIncludePath(true);

$loader->registerNamespace('Symfony', $symfonyPath);
$loader->register();

$yaml = new Parser();

try
{
  $value = $yaml->parse(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'yaml04.yml'));
  echo '<pre>';
  print_r($value);
  echo '</pre>';
}
catch (ParseException $e)
{
  printf("Incapaz de interpretar o texto YAML: %s", $e->getMessage());
}