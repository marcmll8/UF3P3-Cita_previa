<?php

namespace Emeset;

/**
    * Emeset: objecte que encapsula l'aplicació web.
    *
    * Permet definir quin ruter utilitzem les rutes, la configuració i finalment
    * executar l'aplicació.
    *
**/
class Emeset
{

    public $ruter = null;
    public $config = [];
    public $constructor = null;

    public function __construct($config, $constructor, $ruter)
    {
        $this->ruter = $ruter;
        $this->config = $config;
        $this->constructor = $constructor;
    }
}
