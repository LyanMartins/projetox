<?php

if(!function_exists('dd')){
    function dd($data) {
        header('Content-Type: html');
        var_dump($data);
        die;
    }
}
