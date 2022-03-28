<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\SuiviFrais;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\ElementsForfaitises;
use App\Entity\ElementsHorsForfait;

class SuiviFraisController extends AbstractController
{
    /**
     * @Route("/suivifrais", name="app_suivi_frais")
     */

    public function show():Response
    {
        $elementsforfaitises = $this->getDoctrine()->getRepository(ElementsForfaitises::class)->findAll();
        $elementshorsforfait = $this->getDoctrine()->getRepository(ElementsHorsForfait::class)->findAll();
        return $this->render('suivi_frais/index.html.twig', [
            'ElementsForfaitises' => $elementsforfaitises,
            'ElementsHorsForfait' => $elementshorsforfait
        ]);
    }
}
