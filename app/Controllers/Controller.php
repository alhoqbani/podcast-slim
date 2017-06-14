<?php
namespace App\Controllers;

use Interop\Container\ContainerInterface;

class Controller
{
    
    /**
     * @var \Interop\Container\ContainerInterface
     */
    protected $c;
    
    public function __construct(ContainerInterface $container)
    {
    
        $this->c = $container;
    }
    
}