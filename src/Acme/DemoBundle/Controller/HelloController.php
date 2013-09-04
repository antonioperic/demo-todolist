<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HelloController extends Controller
{
    public function listAction($categorySlug, $page)
    {
        
        return $this->render('AcmeDemoBundle:Hello:index.html.twig', array(
                'categorySlug' => $categorySlug,
                'page' => $page,
            )
        );
    }
}
