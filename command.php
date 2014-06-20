<?php
use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\Console\Application;

set_include_path(__DIR__ . PATH_SEPARATOR . get_include_path());

$symfonyPath = realpath(__DIR__ . '/../Symfony/vendor/symfony/symfony/src' );

require $symfonyPath . '/Symfony/Component/ClassLoader/UniversalClassLoader.php';
$loader = new UniversalClassLoader();
$loader->useIncludePath(true);
$loader->registerNamespace('Symfony', $symfonyPath);
$loader->register();

$command = $argv[1];
$command = explode(':',$command);
foreach($command as $index => $token)
{
  $command[$index] = ucfirst($token);
}
$command = implode('', $command);

$application = new Application();
$application->add(new $command());
$application->run();