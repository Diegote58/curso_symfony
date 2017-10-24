<?php

namespace CursoBundle\Controller;

use CursoBundle\Entity\Empresa;
use CursoBundle\Entity\Persona;
use CursoBundle\Form\EmpresaType;
use CursoBundle\Form\PersonaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class PersonaController extends Controller
{
    /**
     * @Route("/personas",name="persona_index")
     */
    public function indexAction()
    {
        $lista = $this->getDoctrine()->getRepository(Persona::class)->findAll();

        return $this->render('CursoBundle:Persona:index.html.twig',array('people'=>$lista));
    }

    /**
     * @Route("/personas/new",name="persona_show")
     */
    public function createPersonaAction(Request $request)
    {

       // var_dump($request);
        $em = $this->getDoctrine()->getEntityManager();
        $pers = new Persona();
        $empresas = $em->getRepository('CursoBundle:Empresa')->findAll();

      //  $form = $this->createForm(PersonaType::class,$pers);
        $form = $this->createFormBuilder($pers)
                        ->add('nombre')
                        ->add('apellido')
                        ->add('dni',IntegerType::class)
                        ->add('empresa',EntityType::class,
                            array('class' => 'CursoBundle:Empresa',
                                'choice_label' => 'nombre'))
                        ->add('Guardar',SubmitType::class)
                        ->add('Resetear',ResetType::class)
                        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
           // $empresa = $em->getRepository('CursoBundle:Empresa')->find($request->get('empresa_id'));

            // 1) build the form
            $pers->setNombre($data->getNombre());
            $pers->setApellido($data->getApellido());
            $pers->setDni($data->getDni());
            $pers->setEmpresa($data->getEmpresa());

            // 3) save the Entity!
            $em->persist($pers);
            $em->flush();

            return $this->redirectToRoute('persona_index');
        }


        return $this->render('CursoBundle:Persona:newPersona.html.twig',array('form' => $form->createView()));
    }
}


