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
    /**
     * @Route("/suivifrais/delete/{ef}", name="app_suivi_frais_delete_ef")
     * @Route("/suivifrais/delete/{ehf}", name="app_suivi_frais_delete_ehf")
     */
    public function frais_forfaitises_delete($ef):Response
    {
        $em = $this->getDoctrine()->getManager();
        $fef = $em->getRepository(ElementsForfaitises::class)->find($ef);
        $em->remove($fef);
        $em->flush();
        return $this->redirectToRoute('app_suivi_frais');
    }
    public function frais_hors_forfait_delete($ehf):Response
    {
        $em = $this->getDoctrine()->getManager();
        $fehf = $em->getRepository(ElementsHorsForfait::class)->find($ehf);
        $em->remove($fehf);
        $em->flush();
        return $this->redirectToRoute('app_suivi_frais');
    }
}