<?php

namespace App\Controller;

use App\Entity\Pin;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PinsController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        $pin= new Pin;
        $pin->setTitle('Titre 2');
        $pin->setDescription('Description 2');

        $em= $this->getDoctrine()->getManager();
        $em->persist($pin);
        $em->flush();

        dd($pin);

        return $this->render('pins/index.html.twig', [
            'controller_name' => 'PinsController',
        ]);
    }
}
