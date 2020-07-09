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
        $pin->setPin('Titre 1');
        $pin->setDescription('Description 1');

        dd($pin);

        return $this->render('pins/index.html.twig', [
            'controller_name' => 'PinsController',
        ]);
    }
}
