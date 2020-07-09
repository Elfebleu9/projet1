<?php

namespace App\Controller;

use App\Entity\Pin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PinsController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(EntityManagerInterface $em):Response
    {
        $pin= new Pin;
        $pin->setTitle('Titre 3');
        $pin->setDescription('Description 3');

       
        $em->persist($pin);
        $em->flush();

        dd($pin);

        return $this->render('pins/index.html.twig', [
            'controller_name' => 'PinsController',
        ]);
    }
}
