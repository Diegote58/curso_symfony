<?php

namespace CursoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="empresa_index")
     */
    public function indexAction()
    {
        return $this->render('CursoBundle:Default:index.html.twig');
    }
}


