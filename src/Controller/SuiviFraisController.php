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

    public function showvisiteur():Response
    {
        $elementsforfaitises = $this->getDoctrine()->getRepository(ElementsForfaitises::class)->findBy(['user_id'=>$this->getUser()]);
        $elementshorsforfait = $this->getDoctrine()->getRepository(ElementsHorsForfait::class)->findBy(['user_id'=>$this->getUser()]);
        $comptable1 = $this->getDoctrine()->getRepository(ElementsForfaitises::class)->findAll();
        $comptable2 = $this->getDoctrine()->getRepository(ElementsHorsForfait::class)->findAll();
        return $this->render('suivi_frais/index.html.twig', [
            'ElementsForfaitises' => $elementsforfaitises,
            'ElementsHorsForfait' => $elementshorsforfait,
            'comptable1' => $comptable1,
            'comptable2' => $comptable2,
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
        $this->addFlash('supprime1', 'Élément forfaitisé supprimé.');
        return $this->redirectToRoute('app_suivi_frais');
    }

    /**
     * @Route("/suivifrais/forfaitises/etat/valide{valide11}", name = "app_suivi_frais_forfaitises_etat_valide")
    */
    public function frais_forfaitises_valide($valide11):Response
    {
        $valide22 = $this->getDoctrine()->getRepository(ElementsForfaitises::class)->findOneById($valide11);

        $valide22->setEtat('Validé');
        $this->em->flush();
        $this->addFlash('valide1', 'Élément forfaitisé validé.');
        return $this->redirectToRoute('app_suivi_frais');
    }

    /**
     * @Route("/suivifrais/forfaitises/etat/attente{attente11}", name = "app_suivi_frais_forfaitises_etat_attente")
    */
    public function frais_forfaitises_attente($attente11):Response
    {
        $attente22 = $this->getDoctrine()->getRepository(ElementsForfaitises::class)->findOneById($attente11);

        $attente22->setEtat('En attente');
        $this->em->flush();
        $this->addFlash('attente1', 'Élément forfaitisé mis en attente.');
        return $this->redirectToRoute('app_suivi_frais');
    }

    /**
     * @Route("/suivifrais/forfaitises/etat/rejete{rejete11}", name = "app_suivi_frais_forfaitises_etat_rejete")
    */
    public function frais_forfaitises_rejette($rejete11):Response
    {
        $rejette22 = $this->getDoctrine()->getRepository(ElementsForfaitises::class)->findOneById($rejete11);

        $rejette22->setEtat('Rejeté');
        $this->em->flush();
        $this->addFlash('rejete1', 'Élément forfaitisé rejeté.');
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
        $this->addFlash('supprime2', 'Élément hors forfait supprimé.');
        return $this->redirectToRoute('app_suivi_frais');
    }

    /**
     * @Route("/suivifrais/horsforfait/etat/valide{valide1}", name = "app_suivi_frais_horsforfait_etat_valide")
    */
    public function frais_hors_forfait_valide($valide1):Response
    {
        $valide2 = $this->getDoctrine()->getRepository(ElementsHorsForfait::class)->findOneById($valide1);

        $valide2->setEtat('Validé');
        $this->em->flush();
        $this->addFlash('valide2', 'Élément hors forfait validé.');
        return $this->redirectToRoute('app_suivi_frais');
    }

    /**
     * @Route("/suivifrais/horsforfait/etat/attente{attente1}", name = "app_suivi_frais_horsforfait_etat_attente")
    */
    public function frais_hors_forfait_attente($attente1):Response
    {
        $attente2 = $this->getDoctrine()->getRepository(ElementsHorsForfait::class)->findOneById($attente1);

        $attente2->setEtat('En attente');
        $this->em->flush();
        $this->addFlash('attente2', 'Élément hors forfait mis en attente.');
        return $this->redirectToRoute('app_suivi_frais');
    }

    /**
     * @Route("/suivifrais/horsforfait/etat/rejete{rejete1}", name = "app_suivi_frais_horsforfait_etat_rejete")
    */
    public function frais_hors_forfait_rejette($rejete1):Response
    {
        $rejete2 = $this->getDoctrine()->getRepository(ElementsHorsForfait::class)->findOneById($rejete1);

        $rejete2->setEtat('Rejeté');
        $this->em->flush();
        $this->addFlash('rejete2', 'Élément hors forfait rejeté.');
        return $this->redirectToRoute('app_suivi_frais');
    }
}