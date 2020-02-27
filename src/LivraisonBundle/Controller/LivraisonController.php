<?php

namespace LivraisonBundle\Controller;


use AppBundle\Entity\Livraison;
use AppBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use LivraisonBundle\Form\LivraisonType;


//use Symfony\Component\Form\Extension\Core\Type\LivraisonType;

class LivraisonController extends Controller
{
    public function ajouterLivraisonAction(Request $request)
    {
        $livraison=new Livraison();
        $form=$this->createForm(LivraisonType::class,$livraison);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $m=$this->getDoctrine()->getManager();
            $m->persist($livraison);
            $m->flush();
            return $this->redirect($this->generateUrl('cart_Validate'));
        }

        $formview=$form->createView();

        return $this->render('@Livraison/Default/form.html.twig', array('formLivraison' => $formview));
    }

    public function afficherLivraisonAction() {
        $mod = $this->getDoctrine()
            ->getRepository('AppBundle:Livraison')
            ->findAll();

        return $this->render('@Livraison/Livraison/afficher.livraison.html.twig', array('livraisons' => $mod));
    }

    public function modifierLivraisonAction(Request $request,$idLivraison)
    {
        $m=$this->getDoctrine()->getManager();
        $classe=$m->getRepository("AppBundle:Livraison")->find($idLivraison);
        $form=$this->createForm(LivraisonType::class,$classe);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $m->persist($classe);
            $m->flush();
            return $this->redirect($this->generateUrl('afficher_livraison'));
        }
        $formview = $form->createView();

        return $this->render('@Livraison/Livraison/modifier.livraison.html.twig', array('form' => $formview));
    }

    public function supprimerLivraisonAction($idLivraison) {
        $m=$this->getDoctrine()->getManager();
        $mod = $this->getDoctrine()
            ->getRepository('AppBundle:Livraison')
            ->find($idLivraison);

        $m->remove($mod);
        $m->flush();

        return $this->redirect($this->generateUrl('afficher_livraison'));
    }

    public function weatherAction()
    {
        $openWeather = $this->get('dwr_open_weather');
        $forecast = $openWeather->setType('Weather')->getByCityName('Gouvernorat de Tunis');
        return $this->render('@Livraison/Livraison/weather.html.twig', array('weather' => $forecast));

    }

    public function mapAction()
    {
        return $this->render('@Livraison/Livraison/map.livraison.html.twig');
    }

    public function calculerLivraisonAction()
    {

        $em=$this->getDoctrine()->getManager();
        $rating=$em->getRepository(Rating::class)->getstat();

        return $this->render("@Blog/Article/statistiques.html.twig",array('rating'=>$rating));
    }
}
