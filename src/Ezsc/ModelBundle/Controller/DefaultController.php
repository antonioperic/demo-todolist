<?php

namespace Ezsc\ModelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ezsc\ModelBundle\Entity\Product;

class DefaultController extends Controller
{
    /**
     * @Route("/model/persist")
     * @Template()
     */
    public function indexAction()
    {  
        $product = new Product();
        $product->setName('ezsc');
        $product->setSlug('slug');
        $product->setPrice('13');
        $product->setDescription('best summer camp ever');
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
      
     
     /*
        $em = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()->getRepository('EzscModelBundle:Product');
        
        $product = $repo->find(1);
        $product->setName('The brand new name');
        
        $em->remove($product);
        $em->flush();
        */
        
        
        
        
        return array('product' => $product);
    }
    
    /**
     * @Route("/model/get/{slug}")
     * @Template("EzscModelBundle:Default:index.html.twig")
     */
    public function getAction($slug)
    {
        $repo = $this->getDoctrine()->getRepository('EzscModelBundle:Product');
        
        $product = $repo->getOneBySlug($slug);
        
        if(!$product) {
            throw $this->createNotFoundException("Product doesn't exist in database");
        }
        
        return array('product' => $product);
    }
}
