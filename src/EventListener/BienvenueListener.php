<?php

// src/EventListener/BienvenueListener.php
namespace App\EventListener;

use App\Events\BienvenueUtilisateur;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BienvenueListener implements EventSubscriberInterface
{

    public function updateResponse(BienvenueUtilisateur $event)
    {
        die('Yeah !');
    }

    public static function getSubscribedEvents()
    {
        // Liste des évènements, méthodes et priorités
        return [
            'bienvenue.utilisateur' => [
                ['updateResponse', -10]
            ],
        ];
    }


}
