<?php

namespace App;

class TestController
{
    
    public static function testePrimeiro()
    {
        echo json_encode([
            'sucesso' => true
        ]);
    }

    public static function postPrimeiro($param = null)
    {
        echo json_encode([
            'sucesso' => $param
        ]);
    }

}

