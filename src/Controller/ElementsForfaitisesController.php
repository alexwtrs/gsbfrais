<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ElementsForfaitises;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\ElementsForfaitisesType;

class ElementsForfaitisesController extends AbstractController
{
    private $ManagerRegistry;

    public function __construct(ManagerRegistry $ManagerRegistry)
    {
        $this->ManagerRegistry = $ManagerRegistry;
    }
    /**
     * @Route("/elementsforfaitises", name="app_elements_forfaitises")
     */
    public function index(Request $request): Response
    {
        $em = $this->ManagerRegistry->getManager();
        $ForfaitEtape = new ElementsForfaitises();
        $form = $this->createForm(ElementsForfaitisesType::class, $ForfaitEtape);
        $form->handleRequest($request);
        if($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()){
            $em->persist($ForfaitEtape);
            $em->flush();
            $this->addFlash('success', 'Élément forfaitisé transmis.');
        }
        return $this->render('elements_forfaitises/index.html.twig', [
            'ElementsForfaitises' => $form->createView(),
            ]);
    }
}