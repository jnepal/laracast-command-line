<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class SayHelloCommand extends Command{
    
    public function configure() {
        
        $this->setName('sayHelloTo')
             ->setDescription("Offer a Greeting to Given Person")
             ->addArgument("name", InputArgument::REQUIRED, "Your Name")
             ->addOption("greeting", null, InputOption::VALUE_OPTIONAL, "Overide the Default Greeting", "Hello" );
        
        
    }
    
    public function execute(InputInterface $input, OutputInterface $output) {
        
        //$message = "Hello ". $input->getArgument("name");
        //Using Option
        $message = sprintf("%s %s", $input->getOption("greeting"), $input->getArgument("name"));
        $output->writeln($message);
        
    }
    
}

