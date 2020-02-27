<?php

namespace LivraisonBundle\Controller;

use AppBundle\Entity\Reclamation;
use LivraisonBundle\Form\ReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReclamationController extends Controller
{
    public function ajouterReclamationAction(Request $request)
    {
        $reclamation=new Reclamation();
        $form=$this->createForm(ReclamationType::class,$reclamation);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $m=$this->getDoctrine()->getManager();
            $reclamation->setDate(new \DateTime('now'));
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $reclamation->setUser($user);
            $m->persist($reclamation);
            $m->flush();
            return $this->redirect($this->generateUrl('afficher_reclamation'));
        }

        $formview=$form->createView();

        return $this->render('@Livraison/Reclamation/ajouter.reclamation.html.twig', array('form' => $formview));
    }
    public function afficherReclamationAction() {
        $mod = $this->getDoctrine()
            ->getRepository('AppBundle:Reclamation')
            ->findAll();
        return $this->render('@Livraison/Reclamation/afficher.reclamation.html.twig', array('reclamations' => $mod));
    }

    public function supprimerReclamationAction($idReclamation) {
        $m=$this->getDoctrine()->getManager();
        $mod = $this->getDoctrine()
            ->getRepository('AppBundle:Reclamation')
            ->find($idReclamation);

        $m->remove($mod);
        $m->flush();

        return $this->redirect($this->generateUrl('afficher_reclamation'));
    }

    public function modifierReclamationAction(Request $request,$idReclamation)
    {
        $m=$this->getDoctrine()->getManager();
        $classe=$m->getRepository("AppBundle:Reclamation")->find($idReclamation);
        $form=$this->createForm(ReclamationType::class,$classe);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $m->persist($classe);
            $m->flush();
            return $this->redirect($this->generateUrl('afficher_reclamation'));
        }
        $formview = $form->createView();

        return $this->render('@Livraison/Reclamation/modifier.reclamation.html.twig', array('form' => $formview));
    }
}
