<?php

namespace ShopBundle\Controller;

use AppBundle\Entity\Commande;
use ShopBundle\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use AppBundle\Entity\Produit;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use JMS\Payment\CoreBundle\Form\ChoosePaymentMethodType;

class PanierController extends AbstractController
{

    public function showPanierAction(SessionInterface $session)
    {
        $produitRepository=$this->getDoctrine()->getRepository(Produit::class);
        $panier = $session->get('panier', []);
        $panierWithData = array();
        foreach ($panier as $id => $quantity) {
            $panierWithData [] = array(
                'product' => $produitRepository->find($id),
                'quantity' => $quantity,
            );
        }

        $total = 0;
        foreach ($panierWithData as $item){
            $totalItem=$item['product']->getPrixProd() * $item['quantity'] ;
            $total += $totalItem;
        }

        return $this->render('/Front/cart.html.twig', array(
            'panier'=>$panierWithData,
            'total'=>$total
        ));
    }
    public function addAction($id, SessionInterface $session )
    {
       $panier = $session->get('panier', []);

       if(!empty($panier[$id])){
           $panier[$id]++;
       }else{
           $panier[$id] = 1;
       }

       $session->set('panier', $panier);
        return $this->redirectToRoute("prod_Panier");
    }

    public function removeAction($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        if($panier[$id]==1){
            unset($panier[$id]);
        }
        else{
            $panier[$id]--;
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute("prod_Panier");
    }
    public function startAction(Request $request,$id,$idUser)
    {   $conversation = new Conversation();



        $iduserone=$this->container->get('security.token_storage')->getToken()->getUser();
        $conversation->setIdUserOne($iduserone);
        $conversation->setIdUserTwo($idUser);
        $conversation->setIdOffre($id);

        $em = $this->getDoctrine()->getManager();
        $em->persist($conversation);
        $em->flush();
        $this->addFlash('info', 'Created Successfully !');
        return $this->redirectToRoute('Conversation_show');



    }


    public function validateAction(SessionInterface $session)
    {
        $D= new \DateTime();
        $produitRepository=$this->getDoctrine()->getRepository(Produit::class);
        $panier = $session->get('panier', []);
        $panierWithData = array();
        foreach ($panier as $id => $quantity) {
            $panierWithData [] = array(
                'product' => $produitRepository->find($id),
                'quantity' => $quantity,
            );
        }
        $total = 0;
        $commande = new Commande();
        $iduser=$this->container->get('security.token_storage')->getToken()->getUser();
        foreach ($panierWithData as $item) {
            $totalItem = $item['product']->getPrixProd() * $item['quantity'];
            $total += $totalItem;
            $commande->addProduit($item['product']);
        }
            $commande->setIdUser($iduser);
            $commande->setPrixTotal($total);
            $commande->setDate($D);
            $commande->setCodePromo(null);
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();
            return $this->redirectToRoute('commande_Show',['idUser'=>$iduser->getId()]);



    }

    public function afficherCommandeAction($idUser)
    {
        $em = $this->getDoctrine()->getManager();
        $comamndes=$em->getRepository(Commande::class)->findCommandeByUser($idUser);
        return $this->render("@Shop/Produits/users/histAchats.html.twig",array(
            'comms'=>$comamndes,
        ));
    }
    public function showPdfAction($id, Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $commande=$em->getRepository(Commande::class)->find($id);
        $template = $this->render('@Shop/Produits/Users/facture.html.twig',array(
            'comms' => $commande,
        ));
        $snappy=$this->get("knp_snappy.pdf");

        $filename="UserFacture";

        return new Response(
          $snappy->getOutputFromHtml($template),
            200,
            array(
                'Content-Type' => 'applciation/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'.pdf"'
            )
        );

    }
}