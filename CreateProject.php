<?php
define('DS', DIRECTORY_SEPARATOR);

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

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
        $name = $input->getArgument('name');
        if ($name) {
            if (file_exists($name)) {
                $output->writeln("Directory $name already exists");
                goto end_execute;
            }
            try {
                mkdir($name);
                $project = getcwd() . DS . $name;
                copy(__DIR__ . DS . 'skeleton' . DS . 'config.ini', $project . DS . 'config.ini');
                copy(__DIR__ . DS . 'skeleton' . DS . 'index.php', $project . DS . 'index.php');
                mkdir($name . DS . 'Application');
                mkdir($name . DS . 'Application' . DS . 'Controller');
                $controllerDirectory = 'Application' . DS . 'Controller';
                copy(__DIR__ . DS . 'skeleton' . DS . $controllerDirectory . DS . 'IndexController.php', $project . DS . $controllerDirectory . DS . 'IndexController.php');
                mkdir($name . DS . 'Application' . DS . 'Model');
                mkdir($name . DS . 'Application' . DS . 'Model' . DS . 'Mapper');
                mkdir($name . DS . 'Application' . DS . 'View');
                $output->writeln("Created project $name");
            } catch (Exception $e) {
                $output->writeln($e->getMessage());
            }
        }
        end_execute:
    }
}