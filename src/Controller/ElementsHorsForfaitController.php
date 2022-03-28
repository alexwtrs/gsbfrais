<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ElementsHorsForfait;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\ElementsHorsForfaitType;

class ElementsHorsForfaitController extends AbstractController
{
    private $ManagerRegistry;

    public function __construct(ManagerRegistry $ManagerRegistry)
    {
        $this->ManagerRegistry = $ManagerRegistry;
    }
    /**
     * @Route("/elementshorsforfait", name="app_elements_hors_forfaits")
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