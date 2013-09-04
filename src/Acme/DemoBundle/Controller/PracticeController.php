<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class PracticeController extends Controller
{
    /**
     * @Route("/two", name="practice_two")
     * @Template("AcmeDemoBundle:Practice:index.html.twig")
     */
    public function practiceTwoAction(Request $request)
    {
        $numA = $request->query->get('numA', 0);
        $numB = $request->query->get('numB', 0);

        if($numA * $numB > 100) {
            return $this->redirect($this->generateUrl('practice_one', array('someNumber' => 2,) ));
        }        
        elseif ($numA < 0 && $numB < 0) {
            throw $this->createNotFoundException('Both numers are lower then zero');
        }
        else if ($numA + $numB > 10) {
            $result = new \Symfony\Component\HttpFoundation\JsonResponse();
            $result->setData(array('result' => $numA + $numB, ));
            
            return $result;
        }
        
        return array(
            'someNumber' => $numA - $numB,
        );
    }
    
    
    /**
     * @Route("/{someNumber}", name="practice_one")
     * @Template()
     */
    public function indexAction($someNumber)
    {
        return array(
            'someNumber' => $someNumber,
        );
    }
    
    

}
