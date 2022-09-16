<?php

namespace Config\lib;

use PDO;

class Connection 
{

    private $dsn = 'pgsql:host=host.docker.internal;port=54320;dbname=devdb';
    private $user = 'devuser';
    private $password = 'devsecret';

    private PDO $connection ;

    public function __construct()
    {  
        $this->connection = new PDO($this->dsn, $this->user, $this->password);
    }

    public function find($query)
    {
        $execQuery = $this->connection->query($query);
        return $execQuery->fetchAll();
    }

    public function insert($query, Array $param)
    {
        $execQuery = $this->connection->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $execQuery->execute($param);
        return $execQuery->fetchAll();
    }

}
