<?php

// src/EventListener/BienvenueListener.php
namespace App\EventListener;

use App\Events\BienvenueUtilisateur;
use http\Env\Response;
use Symfony\Component\EventDispatcher\EventDispatcher;

class BienvenueListener
{

    public function updateResponse(BienvenueUtilisateur $event)
    {


        $response = $event->getResponse();

        $response->setContent( str_replace('</h1>', ".</h1> Bienvenue parmi nous " . $event->getName() . "!", $response->getContent()  ) );

        $event->setResponse($response);

    }
}
