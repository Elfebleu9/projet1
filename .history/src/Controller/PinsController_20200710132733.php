<?php

namespace App\Controller;

use App\Entity\Pin;
use App\Repository\PinRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PinsController extends AbstractController
{
    /**
     * @Route("/", name="app_home", methods="GET")
     */
    public function index(PinRepository $repo):Response
    {    
        return $this->render('pins/index.html.twig',['pins'=>$repo->findAll()]);  
    }

    /**
     * @Route("/pins/1")
     */
    public function show (PinRepository $repo):Response
    {
        $pin = $repo->find(1);
        
        return $this->render('pins/show.html.twig', compact('pin'));
    }

    /**
     * @Route("/pins/create", name="app_create", methods={"GET","POST"})
     */
    public function create(Request $request, EntityManagerInterface $em):Response
    {
        $pin= new Pin;
        $form = $this->createFormBuilder($pin)
            ->add('title', null, ['attr'=>['autofocus'=>true]])
            ->add('description',null,['attr'=>['row'=>20, 'cols'=>50]])
            ->getForm()
        ;
        $form -> handleRequest($request);

        if($form->isSubmitted()&&$form-> isValid()){

            $form->getData();     
            $em->persist($pin);
            $em->flush();
            return $this-> redirectToRoute('app_home');
        }
        return $this->render('pins/create.html.twig',['form'=>$form->createView()]);
    }
}
