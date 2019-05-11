<?php
// src/Events/BienvenueUtilisateur.php
namespace App\Events;

use App\EventListener\BienvenueListener;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Response;

class BienvenueUtilisateur extends Event
{
    const NAME = 'bienvenue.utilisateur';

    private $name;
    private $response;
    private $dispatcher;

    public function __construct($name, $response, $dispatcher)
    {
        $this->name = $name;
        $this->response = $response;

        // Creating the listener
        $bienvenueListener = new BienvenueListener();
        // Adding the listener to the config of the dispatcher
        $dispatcher->addListener( BienvenueUtilisateur::NAME, array($bienvenueListener, 'updateResponse'));
    }

    public function getName()
    {
        return $this->name;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

}
