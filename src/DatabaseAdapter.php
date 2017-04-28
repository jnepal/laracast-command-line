<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Acme;
use PDO;

Class DatabaseAdapter{
    protected $connection;
     
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }
    
    public function fetchAll($tableName){
        return $this->connection->query("Select * from ".$tableName)->fetchAll();
    }
    
    public function query($sql, $parameters){
        return $this->connection->prepare($sql)->execute($parameters);
    }
}

