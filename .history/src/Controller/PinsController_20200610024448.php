<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PinsController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        $pin= new Pin;

        return $this->render('pins/index.html.twig', [
            'controller_name' => 'PinsController',
        ]);
    }
}
