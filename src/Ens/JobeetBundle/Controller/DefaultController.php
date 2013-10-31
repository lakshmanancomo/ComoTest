<?php

namespace Ens\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();
 	    
 	    $entities = $em->getRepository('EnsJobeetBundle:Job')->findAll();
 	
 	    return $this->render('EnsJobeetBundle:Default:index.html.twig', array('entities' => $entities));
    }

    public function showAction($id) {
 
	    $em = $this->getDoctrine()->getEntityManager();
	    $entity = $em->getRepository('EnsJobeetBundle:Job')->find($id);
	 
	    if (!$entity) {
	        throw $this->createNotFoundException('Unable to find Job entity.');
	    }
	 
	    return $this->render('EnsJobeetBundle:Default:show.html.twig', array(
	        'entity'      => $entity
	    ));
	}
}
