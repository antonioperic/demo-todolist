<?php

namespace Ezsc\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EzscHelloBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function squareAction($someNumber)
    {
        return $this->render('EzscHelloBundle:Default:square.html.twig', 
                array('result' => $someNumber * $someNumber));
    }
}
