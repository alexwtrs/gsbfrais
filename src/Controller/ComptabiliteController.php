<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ElementsForfaitises;
use App\Entity\ElementsHorsForfait;

class ComptabiliteController extends AbstractController
{
    /**
     * @Route("/comptabilite", name="app_comptabilite")
     */
    public function index(): Response
    {
        $elementsforfaitises = $this->getDoctrine()->getRepository(ElementsForfaitises::class)->findAll();
        $elementshorsforfait = $this->getDoctrine()->getRepository(ElementsHorsForfait::class)->findAll();
        return $this->render('suivi_frais/index.html.twig', [
            'ElementsForfaitises' => $elementsforfaitises,
            'ElementsHorsForfait' => $elementshorsforfait
        ]);
    }
}
