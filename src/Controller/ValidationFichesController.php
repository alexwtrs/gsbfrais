<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValidationFichesController extends AbstractController
{
    /**
     * @Route("/validationfiches", name="app_validation_fiches")
     */
    public function index(): Response
    {
        return $this->render('validation_fiches/index.html.twig', [
            'controller_name' => 'ValidationFichesController',
        ]);
    }
}
