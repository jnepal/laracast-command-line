#! /usr/bin/env php
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Acme\RenderCommand;
use Symfony\Component\Console\Application;

require "vendor/autoload.php";

$app = new Application("Render Command Demo", "1.0");

$app->add(new RenderCommand());

$app->run();
