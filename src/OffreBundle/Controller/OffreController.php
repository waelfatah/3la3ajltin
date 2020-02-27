<?php

namespace OffreBundle\Controller;
use AppBundle\Entity\FosUser;
use AppBundle\Entity\Offre;
use OffreBundle\Form\OffreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OffreController extends Controller
{
    public function indexAction()
    {
        return $this->render('OffreBundle:Default:index.html.twig');
    }
    public function addAction(Request $request)
    {
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);


        if ($form->isValid()) {


            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $offre->setIduser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();

            return $this->redirectToRoute('offre_show');
        }
        return $this->render('@Offre/Default/addoffre.html.twig',array(
            'Form'=> $form->createView()));

    }
    public function showAction(Request $request){

        $em= $this->getDoctrine()->getManager();
        $offer =$em->getRepository(Offre::class)->findAll();
        $offer1  = $this->get('knp_paginator')->paginate(
            $offer,
            $request->query->get('page', 1), 6);
        return $this->render('@Offre/Default/listoffre.html.twig',array(
            'list'=> $offer1));
    }
    public function showbyAction(Request $request,$id){

        $em= $this->getDoctrine()->getManager();
        $offer =$em->getRepository(Offre::class)->findBy(array('idUser' => $id));
        $offer1  = $this->get('knp_paginator')->paginate(
            $offer,
            $request->query->get('page', 1), 6);
        return $this->render('@Offre/Default/vosoffres.html.twig',array(
            'list'=> $offer1));
    }
    public function showdetailAction($id){

        $em= $this->getDoctrine()->getManager();
            $offer =$em->getRepository(Offre::class)->find($id);
        return $this->render('@Offre/Default/showoffredetail.html.twig',array(
            'list'=> $offer));
    }
    public function  DeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $offre=$this->getDoctrine()->getManager()->getRepository(Offre::class)->find($id);
        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('offre_show');


    }
    public function UpdateAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $offre=$this->getDoctrine()->getManager()->getRepository(Offre::class)->find($id);
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);


        if ($form->isValid()) {


            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $offre->setIduser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();
            $this->addFlash('info', 'Created Successfully !');
            return $this->redirectToRoute('offre_show');
        }
        return $this->render('@Offre/Default/Updateoffre.html.twig',array(
            'Form'=> $form->createView()));

    }
}
