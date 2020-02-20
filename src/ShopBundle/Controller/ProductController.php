<?php

namespace ShopBundle\Controller;

use AppBundle\Entity\Images;
use AppBundle\Entity\Produit;
use ShopBundle\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        return $this->render("@Shop/Produits/back/add.html.twig",array('formFormat'=>$form->createView()));
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

    public function searchAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $requestString=$request->get('q');
        $produit=$em->getRepository(Produit::class)->findEntitiesByString($requestString);
        if(!$produit)
        {
            $result['produits']['error']="Produit inexistent :(";
        }
        else{
            $result['produits']=$this->getRealEntities($produit);
        }

        return new Response(json_encode($result));
    }

    public function getRealEntities($produit)
    {
        foreach ($produit as $produit){
            $realEntities[$produit->getIdProd()]=[$produit->getNom(),$produit->getMarque(), $produit->getPrixProd(), $produit->getQuantite(), $produit->getTypeProd(), $produit->getUrlImage()];
        }
        return $realEntities;
    }
}
