#! /usr/bin/env php
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Acme\ShowCommand;
use Symfony\Component\Console\Application;
use Acme\DatabaseAdapter;
use Acme\AddCommand;
use Acme\CompleteCommand;

require "vendor/autoload.php";

$app = new Application("Task App Demo", "1.0");

try{
    $pdo = new PDO('sqlite:db.sqlite');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(Exception $e){
   echo $e->getMessage();
}

$dbAdapter = new DatabaseAdapter($pdo);
$app->add(new ShowCommand($dbAdapter));
$app->add(new AddCommand($dbAdapter));
$app->add(new CompleteCommand($dbAdapter));

$app->run();

