<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Acme;

use Acme\Command;
use Symfony\Component\Console\Input\InputArgument;

class CompleteCommand extends Command{
    
    public function configure() {
        $this->setName("complete")
             ->setDescription("Complete a task by its id")
             ->addArgument('id', InputArgument::REQUIRED);
        
        parent::configure();
    }
    
    public function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output) {
        $id = $input->getArgument("id");
        
        $sql = "DELETE FROM tasks WHERE id = :id";
        $this->database->query($sql, compact('id'));
        
        $output->writeln("<info>Task Completed</info>");
        
        $this->showTasks($output);
    }
}
