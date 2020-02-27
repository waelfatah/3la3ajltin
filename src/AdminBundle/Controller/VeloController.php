<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\VeloUtile;
use AdminBundle\Form\VeloUtileType;

class VeloController extends Controller
{
    public function ajouterAction(Request $request)
    {
        $VeloUtile=new VeloUtile();
        $form=$this->createForm(VeloUtileType::class,$VeloUtile);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($VeloUtile);
            $em->flush();
            return $this->redirectToRoute("velo_list");
        }
        return $this->render("@Admin/VeloUtiles/add.html.twig",array('formFormat'=>$form->createView()));
    }
    public function addAction()
    {
        return $this->render('@Admin/VeloUtiles/add.html.twig');
    }
    public function showAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $VeloUtiles=$em->getRepository("AppBundle:VeloUtile")->findAll();
        return $this->render("@Admin/VeloUtiles/produits_list.html.twig",array('liste'=>$VeloUtiles));
    }

    public function showImgAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $images=$em->getRepository("ApptBundle:Images")->findBy($id);
        return $this->render("@Admin/VeloUtiles/produits_list.html.twig",array('imgs'=>$images));
    }

    public function updateAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $VeloUtile=$em->getRepository("AppBundle:VeloUtile")->find($id);
        $form=$this->createForm(VeloUtileType::class,$VeloUtile);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em->flush();
            return $this->redirectToRoute("velo_list");
        }
        return $this->render("@Admin/VeloUtiles/updateProd.html.twig",array('VeloUtile'=>$form->createView()));
    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $VeloUtile=$em->getRepository("AppBundle:VeloUtile")->find($id);
        $em->remove($VeloUtile);
        $em->flush();
        return $this->redirectToRoute("velo_list");
    }
}
