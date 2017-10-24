<?php

namespace CursoBundle\Controller;

use CursoBundle\Entity\Empresa;
use CursoBundle\Form\EmpresaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class EmpresaController extends Controller
{

    /**
     * @Route("/empresa",name="empresa_show")
     */
    public function createEmpresaAction(Request $request)
    {
        // 1) build the form
        $emp = new Empresa();
        $form = $this->createForm(EmpresaType::class,$emp);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $emp = $form->getData();
            // 3) save the Entity!
            $em = $this->getDoctrine()->getManager();
            $em->persist($emp);
            $em->flush();

            return $this->redirectToRoute('empresa_index');
        }

        return $this->render('CursoBundle:Default:crearEmpresa.html.twig',array('form'=>$form->createView()));
    }

}


