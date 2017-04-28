<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Acme;

use Acme\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class AddCommand extends Command{
    
    public function configure() {
        $this->setName("add")
             ->setDescription("Adds a New Task")
             ->addArgument("description", InputArgument::REQUIRED);
        parent::configure();
    }
    
    public function execute(InputInterface $input, OutputInterface $output) {
        $description = $input->getArgument("description");
        
        
        $sql = "INSERT INTO tasks(description) VALUES(:description)";
        $this->database->query($sql, compact('description'));
            
        $output->writeln("<info>Task Added</info>");
    
        $this->showTasks($output);
    }
}