<?php

namespace App\Controller;

use App\EventListener\BienvenueListener;
//use http\Exception\BadConversionException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\EventDispatcher\EventSubscriberInterface;
//use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
//use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventDispatcher;
use App\Events\BienvenueUtilisateur;

class IndexController extends AbstractController 
{
    /**
     * @Route(
     * "/hello-world", 
     * name="HelloWold",
     * methods={"GET"}
     * )
     */
    public function helloWord(Request $request): Response
    {
        $response = new Response();
        $response->setContent('<h1>Hello World</h1>');
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/html');
        return $response;
    }
    
    /**
     * @Route(
     * "/hello-world/{name<\w+>}", 
     * name="HelloName",
     * methods={"GET"}
     * )
     */
    public function helloName(Request $request, $name)
    {
        // Creating the response
        $response = new Response();
        $response->setContent('<h1>Hello ' . ucfirst($name) . '</h1>');
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/html');
        // Creating the dispatcher
        $eventDispatcher = new EventDispatcher();
        // Creating the event
        $event = new BienvenueUtilisateur($name, $response);
        // Creating the listener
        //$listener = new BienvenueListener();
        // Adding the litener to the config of the dispatcher
        //$eventDispatcher->addListener( BienvenueUtilisateur::NAME, array($listener, 'updateResponse'));
        // Sending the event
        $eventDispatcher->dispatch(BienvenueUtilisateur::NAME, $event);
        // Sending the response
        return $this->render('htmlSkeleton.html.twig', ['message' => "<h1>Hello " . ucfirst($name) . "</h1>"]);
        //return $response;
    }
   

}
