<?php 

namespace App\Core;

use Container\Container as App;

class Controller 
{
    protected $app;

    public function __construct()
    {
        $this->app = App::getInstance();
    }
}