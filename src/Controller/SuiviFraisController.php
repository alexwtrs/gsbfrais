<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\SuiviFrais;
use App\Entity\ElementsForfaitises;
use App\Entity\ElementsHorsForfait;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class SuiviFraisController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

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

    /**
     * @Route("/suivifrais/forfaitises/delete/{ef}", name="app_suivi_frais_forfaitises_delete_ef")
     */
    public function frais_forfaitises_delete($ef):Response
    {
        $fef = $this->getDoctrine()->getRepository(ElementsForfaitises::class)->findOneById($ef);

        $this->em->remove($fef);
        $this->em->flush();
        return $this->redirectToRoute('app_suivi_frais');
    }

    /**
     * @Route("/suivifrais/horsforfait/delete/{ehf}", name="app_suivi_frais_horsforfait_delete_ehf")
     */
    public function frais_hors_forfait_delete($ehf):Response
    {
        $fehf = $this->getDoctrine()->getRepository(ElementsHorsForfait::class)->findOneById($ehf);

        $this->em->remove($fehf);
        $this->em->flush();
        return $this->redirectToRoute('app_suivi_frais');
    }
}