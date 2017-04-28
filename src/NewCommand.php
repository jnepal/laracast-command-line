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
use GuzzleHttp\ClientInterface;
use ZipArchive;

class NewCommand extends Command{
    
    private $client;
    
    public function __construct(ClientInterface $client) {
        $this->client = $client;
        
        parent::__construct();
    }
    
    public function configure() {
        $this->setName("new")
             ->setDescription("Create A New Laravel Application")
             ->addArgument("name", InputArgument::REQUIRED);
    }
    
    public function execute(InputInterface $input, OutputInterface $output) {
       //assert that the folder doesn't already exist
        $directory = getcwd()."/".$input->getArgument("name");  
        $output->writeln("<info>Crafting Application ...</info>");
        
        $this->assertApplicationDoesNotExists($directory, $output);
        
        //download nightly version of laravel
        //extract zip file
        $this->download($zipFile = $this->makeFilename())
             ->extract($zipFile, $directory)
             ->cleanUp($zipFile);
        
        //Alert The User Zip File is Ready
        $output->writeln("<info>Application Ready</info>");
    }
    
    private function assertApplicationDoesNotExists($directory, OutputInterface $output){
        
        if(is_dir($directory)){
            $message = "<error>Application Already Exists!</error>";
            $output->writeln($message);
            exit();
        }
    }
    
    private function makeFileName(){
        
        return getcwd()."/laravel_".md5(time().  uniqid()).'.zip';
    
    }
    
    private function download($zipfile){
        $response = $this->client->request("GET", "http://cabinet.laravel.com/latest.zip")->getBody();
        file_put_contents($zipfile, $response);
        
        return $this;     
    }
    
    private function extract($zipFile, $directory){
        $archive = new ZipArchive();
        
        $archive->open($zipFile);
        $archive->extractTo($directory);
        $archive->close();
        
        return $this;
    }
    
    private function cleanUp($zipFile){
        //Permission given for deletion
        @chmod($zipFile, 0777);
        //@ Suppress any Warning
        @unlink($zipFile);
        
        return $this;
    }
}

