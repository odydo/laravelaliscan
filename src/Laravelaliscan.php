<?php

namespace Odydo\Laravelaliscan;




class Laravelaliscan 
{

    public $client = false;
    public $cc = '';

    public function __construct($cc='')
    {
        $this->cc = $cc;
        if(!$this->client){
            $this->client = include __DIR__ . '/../aliscan.php';
        }
    }
    public function getClient(){
        if(!$this->client){
            //$this->client = include_once __DIR__ . '/../aliscan.php';
        }
        return $this->client;
    }

}