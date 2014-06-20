<?php
ini_set('display_error', 'on');

define('DS', DIRECTORY_SEPARATOR);

use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\Yaml\Parser;
use TreinaWeb2\Db\Adapter;
use TreinaWeb2\Orm\Mapper;
use TreinaWeb2\Controller\FrontController;

use Doctrine\ORM\Tools\Setup, Doctrine\ORM\EntityManager, Doctrine\ORM\Configuration, Doctrine\Common\Cache\ArrayCache as Cache, Doctrine\Common\Annotations\AnnotationRegistry;

set_include_path(__DIR__ . PATH_SEPARATOR . get_include_path());

$symfonyPath = realpath(__DIR__ . '/../Symfony/vendor');
$doctrinePath = $symfonyPath . '/doctrine';

require $symfonyPath . '/symfony/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';

$loader = new UniversalClassLoader();
$loader->useIncludePath(true);
$loader->registerNamespace('Symfony', $symfonyPath . '/symfony/symfony/src');
$loader->registerNamespace('TreinaWeb2', (realpath(__DIR__ . '/../lib/vendor')));
$loader->registerNamespaces(array(
    'Doctrine\\Common' => $symfonyPath . '/doctrine/common/lib',
    'Doctrine\\Common\\Cache' => $symfonyPath . '/doctrine/cache/lib',
    'Doctrine\\Common\\Annotations' => $symfonyPath . '/doctrine/annotations/lib',
    'Doctrine\\Common\\Lexer' => $symfonyPath . '/doctrine/lexer/lib',
    'Doctrine\\Common\\Collections' => $symfonyPath . '/doctrine/collections/lib',
    'Doctrine\\DBAL' => $symfonyPath . '/doctrine/dbal/lib',
    'Doctrine' => $symfonyPath . '/doctrine/orm/lib'
));
$loader->register();

$yaml = new Parser();
$connection = $yaml->parse(file_get_contents(__DIR__ . DS . 'config.yml'));

$config = new Configuration();
$cache = new Cache();
$config->setMetadataCacheImpl($cache);

AnnotationRegistry::registerFile($doctrinePath . '/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
$driver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(new Doctrine\Common\Annotations\AnnotationReader(), array(
    __DIR__ . DS . 'Application' . DS . 'Model'
));
$config->setMetadataDriverImpl($driver);
$config->setProxyDir(__DIR__ . DS . 'library' . DS . 'Application' . DS . 'Model' . DS . 'Proxy');
$config->setProxyNamespace('Application\Model\Proxy');

$GLOBALS['em'] = EntityManager::create($connection, $config);

$frontController = FrontController::getInstance();
$frontController->setPath(__DIR__ . DS . 'Application' . DS . 'View');
$frontController->dispatch();





