<?php

// src/EventListener/BienvenueListener.php
namespace App\EventListener;

use App\Events\BienvenueUtilisateur;
use Symfony\Component\EventDispatcher\EventDispatcher;

class BienvenueListener
{

    public function updateResponse(BienvenueUtilisateur $event)
    {
        die('Yeah !');
    }
}
