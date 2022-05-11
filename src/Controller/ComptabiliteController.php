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
    public function index(Request $request): Response
    {
        $em = $this->ManagerRegistry->getManager();
        $ElementsHorsForfait = new ElementsHorsForfait();
        $form = $this->createForm(ElementsHorsForfaitType::class, $ElementsHorsForfait);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($ElementsHorsForfait);
            $em->flush();
            $this->addFlash('success', 'Élément hors forfait transmis.');
        }
        return $this->render('elements_hors_forfait/index.html.twig', [
            'ElementsHorsForfait' => $form->createView(),
            ]);
    }
}
