<?php
define('DS', DIRECTORY_SEPARATOR);

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOException;

class CreateProject extends Command
{

    protected function configure()
    {
        $this->setName('create:project')
            ->setDescription('Creates a TW project')
            ->addArgument('name', InputArgument::REQUIRED, 'which is the project name?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fs = new Filesystem();
        $name = $input->getArgument('name');
        if ($name) {
            if ($fs->exists($name)) {
                $output->writeln("Directory $name already exists");
                goto end_execute;
            }
            try {
                $fs->mkdir($name);
                $project = getcwd() . DS . $name;
                $fs->copy(__DIR__ . DS . 'skeleton' . DS . 'config.ini', $project . DS . 'config.ini');
                $fs->copy(__DIR__ . DS . 'skeleton' . DS . 'index.php', $project . DS . 'index.php');
                $fs->mkdir($name . DS . 'Application');
                $fs->mkdir($name . DS . 'Application' . DS . 'Controller');
                $controllerDirectory = 'Application' . DS . 'Controller';
                $fs->copy(__DIR__ . DS . 'skeleton' . DS . $controllerDirectory . DS . 'IndexController.php', $project . DS . $controllerDirectory . DS . 'IndexController.php');
                $fs->mkdir($name . DS . 'Application' . DS . 'Model');
                $fs->mkdir($name . DS . 'Application' . DS . 'Model' . DS . 'Mapper');
                $fs->mkdir($name . DS . 'Application' . DS . 'View');
                $output->writeln("Created project $name");
            } catch (IOException $e) {
                $output->writeln($e->getMessage());
            }
        }
        end_execute:
    }
}