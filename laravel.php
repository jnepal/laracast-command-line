#! /usr/bin/env php
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Acme\NewCommand;
use Symfony\Component\Console\Application;


require "vendor/autoload.php";

$app = new Application('laracast Demo', '1.0');

$app->add(new NewCommand(new GuzzleHttp\Client));

$app->run();
