<?php

namespace ShopBundle\Controller;

use AppBundle\Entity\Images;
use AppBundle\Entity\Produit;
use ShopBundle\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function ajouterAction(Request $request)
    {
        $produit=new Produit();
        $form=$this->createForm(ProduitType::class,$produit);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute("produit_list");
        }
        return $this->render("@Shop/Produits/add.html.twig",array('formFormat'=>$form->createView()));
    }
    public function addAction()
    {
        return $this->render('@Shop/Produits/back/add.html.twig');
    }
    public function showAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produits=$em->getRepository(Produit::class)->findAll();
        return $this->render("@Shop/Produits/back/produits_list.html.twig",array('liste'=>$produits));
    }

    public function showImgAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $images=$em->getRepository(Images::class)->findBy($id);
        return $this->render("@Shop/Produits/back/produits_list.html.twig",array('imgs'=>$images));
    }

    public function updateAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository(Produit::class)->find($id);
        $form=$this->createForm(ProduitType::class,$produit);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em->flush();
            return $this->redirectToRoute("produit_list");
        }
        return $this->render("@Shop/Produits/back/updateProd.html.twig",array('produit'=>$form->createView()));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository(Produit::class)->find($id);
        $em->remove($produit);
        $em->flush();
        return $this->redirectToRoute("produit_list");
    }
}
