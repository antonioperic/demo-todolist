<?php

namespace Ezsc\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('::frontend/ToDoBundle/homepage.html.twig');
    }
}
