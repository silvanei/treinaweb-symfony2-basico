<?php
define('DS', DIRECTORY_SEPARATOR);

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

class CreateController extends Command
{

    protected function configure()
    {
        $this->setName('create:controller')
            ->setDescription('Creates a TW controller')
            ->addArgument('controller', InputArgument::REQUIRED, 'which is the controller name?')
            ->addArgument('project', InputArgument::REQUIRED, 'which is the project name?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fs = new Filesystem();
        
        $controller = $input->getArgument('controller');
        $project = $input->getArgument('project');
        if ($controller && $project) {
            $path = getcwd() . DS . $project . DS . 'Application' . DS . 'Controller';
            $controllerClass = $path . DS . ucfirst($controller) . 'Controller.php';
            if ($fs->exists($controllerClass)) {
                $output->writeln("Controller $controller already exists");
                goto end_execute;
            }
            try {
                file_put_contents($controllerClass, $this->getData($controller));
                $fs->mkdir(str_replace('Controller', 'View', $path) . DS . ucfirst($controller));
                $output->writeln("Created controller $controller");
            } catch (IOException $e) {
                $output->writeln($e->getMessage());
            }
        }
        end_execute:
    }

    private function getData($controller)
    {
        $controller = ucfirst($controller);
        $data = <<<BLOCK
<?php
namespace Application\Controller;

use Application\Model\\$controller;

use TreinaWeb\Controller\PageController;

class $controller extends PageController
{
  public function indexAction()
  {
  }
}
BLOCK;
        return $data;
    }
}