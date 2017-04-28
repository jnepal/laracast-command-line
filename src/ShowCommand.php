<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Acme;

use Acme\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Acme\DatabaseAdapter;

class ShowCommand extends Command{
    
    public function configure() {
        $this->setName("show")
             ->setDescription("Show all task");
        parent::configure();
    }
    
    public function execute(InputInterface $input, OutputInterface $output) {
        $this->showTasks($output);
    }

}
