#! /usr/bin/env php

<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

require "vendor/autoload.php";

$app = new Application("Laracast Demo", "1.0");

//Register a New Command

$app->register("sayHelloTo")
    ->setDescription("Offer a Greeting to given person")
    ->addArgument("name", InputArgument::REQUIRED, "Your Name")
    ->setCode(function(InputInterface $input, OutputInterface $output){
        $name = $input->getArgument("name");
        //<commment></comment> will add styling 
        //<info></info> will add styling 
        //$output->writeln('<comment>Hello'.',' .$name.'</comment>');
        
        $message = "Hello ". $input->getArgument("name");
        
        $output->writeln("<info>{$message}</info>");//Here single quote won't work
    });
      
$app->run();

        
     