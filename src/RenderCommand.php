<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class RenderCommand extends Command{
    
    public function configure() {
        $this->setName("render")
             ->setDescription("Render Some tabular Data");
        parent::configure();
    }
    public function execute(InputInterface $input, OutputInterface $output) {
        
        $table = new Table($output);
        $table->setHeaders(['Name', 'Age'])
              ->setRows([
                  ['John Doe', 30],
                  ['Jane Doe', 50],
                  ['Taylor Otwell', 29]
              ])
              ->render();
       
    }
}
