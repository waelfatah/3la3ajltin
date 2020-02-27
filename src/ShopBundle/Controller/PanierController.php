<?php

namespace ShopBundle\Controller;

use AppBundle\Entity\Commande;
use AppBundle\Entity\Livraison;
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
    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository(Produit::class)->find($id);
        $em->remove($produit);
        $em->flush();
    }

    public function validateAction(SessionInterface $session)
    {
        $D= new \DateTime();
        $livraison=$this->getDoctrine()->getRepository(Livraison::class)->find(6);
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
            if(is_null($item['product']->getQuantiteAV())){
                $item['product']->setQuantiteAV($item['product']->getQuantite());
            }
            if($item['product']->getQuantiteAV() != 0){
            $quantiteAV=$item['product']->getQuantiteAV() - $item['quantity'];
            $item['product']->setQuantiteAV($quantiteAV);
            $nbVentes=$item['product']->getQuantite()-$item['product']->getQuantiteAV();
            $item['product']->setNbVentes($nbVentes);
            }
        }
        $nbcommande=$this->getDoctrine()->getRepository(Commande::class)->CountCommande($iduser->getId());
        $codePromo= $iduser->getUsername()."25%".$iduser->getId();
            if($nbcommande == 4){
                $commande->setCodePromo($codePromo);
                $message = (new \Swift_Message('Hello Email'))
                    ->setFrom('wael.fatah@esprit.tn')
                    ->setTo($iduser->getEmail())
                    ->setBody(
                        $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                        '/Emails/coupon.html.twig',
                        ['name' => $iduser->getUsername(),
                            'coupon' => $codePromo]

                    ),
            'text/html'
        );
                $this->get('mailer')->send($message);
            }
            else{
                $commande->setCodePromo(null);
            }
            if($nbcommande == 5){
                $totalred = $total*0.75;
                $commande->setPrixTotal($totalred);
            }
            else{
                $commande->setPrixTotal($total);
            }

            $commande->setIdUser($iduser);
            $commande->setDate($D);
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();
        
        $panierWithData=[];
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