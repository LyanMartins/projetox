<?php

namespace App;

use Config\lib\Connection;

class TestController
{

    public static Connection $connection;

    public function __construct()
    {
  
    }
    
    public static function testePrimeiro()
    {
        $connection = new Connection();
        $return = $connection->find('select * from teste');
        echo json_encode($return);
    }

    public static function postPrimeiro($param = null)
    {
        $connection = new Connection();
        $param = [
            'nomeinsert' => $param['name']
        ];
        $return = $connection->insert('insert into teste (nome) values (:nomeinsert)', $param);
        return json_encode($return);
    }

}

