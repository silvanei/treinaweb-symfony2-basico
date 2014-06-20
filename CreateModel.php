<?php
define('DS', DIRECTORY_SEPARATOR);

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

class CreateModel extends Command
{

    protected function configure()
    {
        $this->setName('create:model')
            ->setDescription('Creates a TW model and its mapper')
            ->addArgument('model', InputArgument::REQUIRED, 'which is the model name?')
            ->addArgument('project', InputArgument::REQUIRED, 'which is the project name?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fs = new Filesystem();
        
        $model = $input->getArgument('model');
        $project = $input->getArgument('project');
        if ($model && $project) {
            $path = getcwd() . DS . $project . DS . 'Application' . DS . 'Model';
            $modelClass = $path . DS . ucfirst($model) . '.php';
            if ($fs->exists($modelClass)) {
                $output->writeln("Model $modelClass already exists");
                goto end_execute;
            }
            try {
                $handle = fopen($modelClass, 'x');
                fclose($handle);
                file_put_contents($modelClass, $this->getModel($model));
                $output->writeln("Created model $model");
                $mapperClass = $path . DS . 'Mapper' . DS . ucfirst($model) . '.php';
                $handle = fopen($mapperClass, 'x');
                fclose($handle);
                file_put_contents($mapperClass, $this->getMapper($model));
            } catch (IOException $e) {
                $output->writeln($e->getMessage());
            }
        }
        end_execute:
    }

    private function getModel($model)
    {
        $model = ucfirst($model);
        $data = <<<MODEL
<?php
namespace Application\Model;

use Application\Model\Mapper\\$model as PedidoMapper;

class $model
{
  private \$mapper = null;

  public function __construct()
  {
    \$this->mapper = new {$model}Mapper();
  }
}
MODEL;
        return $data;
    }

    private function getMapper($model)
    {
        $model = ucfirst($model);
        $data = <<<MAPPER
<?php
namespace Application\Model\Mapper;

use TreinaWeb\Orm\Mapper;

class $model extends Mapper
{
  protected \$table = '';
  protected \$primaryKey = '';
  protected \$adapter = null;
}
MAPPER;
        return $data;
    }
}