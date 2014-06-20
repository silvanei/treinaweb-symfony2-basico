<?php
namespace TreinaWeb2\Util;

class Autoloader
{

    private static $instance;

    private function __construct()
    {
        spl_autoload_register([
            $this,
            'autoload'
        ]);
    }

    private function __clone()
    {}

    private function __sleep()
    {}

    /**
     *
     * @return Autoloader
     */
    public static function getInstance()
    {
        if (null == self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function autoload($class)
    {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        require $class . '.php';
    }
}