<?php
// src/Events/BienvenueUtilisateur.php
namespace App\Events;

use Symfony\Component\EventDispatcher\Event;


class BienvenueUtilisateur extends Event
{
    const NAME = 'bienvenue.utilisateur';

    private $name;
    private $response;

    public function __construct($name, $response)
    {
        $this->name = $name;
        $this->response = $response;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getResponse()
    {
        return $this->response;
    }

}
