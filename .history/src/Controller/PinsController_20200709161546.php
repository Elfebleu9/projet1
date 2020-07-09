<?php

namespace App\Controller;

use App\Repository\PinRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PinsController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(PinRepository $repo):Response
    {
        
        return $this->render('pins/index.html.twig',['pins'=>$repo->findAll()]);
       
     
    }
    /**
     * @Route("/pins/create", methods={"GET","POST"})
     */
    public function create():Response
    {
        return $this->render('pins/create.html.twig');
    }
}
