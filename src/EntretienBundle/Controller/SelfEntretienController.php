<?php

namespace EntretienBundle\Controller;

use AppBundle\Entity\SelfEntretien;
use EntretienBundle\Form\SelfEntretienType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class SelfEntretienController extends Controller
{
    public function addAction(Request $request)
    {
        $app = new SelfEntretien();
        $form = $this->createForm(SelfEntretienType::class, $app);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($app);
            $em->flush();
            $this->addFlash('info', 'created Successfully ! ');
            return $this->redirectToRoute('entretien_Add_SelfEntretien');
        }
        return $this->render("@Entretien/back/addSelfEntretien.html.twig", array('SelfEntretien' => $form->createView()));
    }

    public function showAction()
    {


        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:SelfEntretien')->findAll();
        return $this->render('@Entretien/front/showSelfEntretien.html.twig', array(
            'SelfEntretien' => $app));
    }
    public function showBAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:SelfEntretien')->findAll();
        $app1  = $this->get('knp_paginator')->paginate(
            $app,
            $request->query->get('page', 1), 6
        );
        return $this->render('@Entretien/back/showSelfEntretienB.html.twig', array(
            'SelfEntretien' => $app1));
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:SelfEntretien')->find($id);
        $form = $this->createForm(SelfEntretienType::class, $app);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($app);
            $em->flush();
            $this->addFlash('info', 'Modificated Successfully !');
            return $this->redirectToRoute('entretien_Show_SelfEntretien');
        }
        return $this->render("@Entretien/back/editSelfEntretien.html.twig", array('SelfEntretien' => $form->createView()));

    }


    public function deleteAction($qdt)
    {

        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:SelfEntretien')->find($qdt);
        $em->remove($app);
        $em->flush();
        return $this->redirectToRoute('entretien_Show_SelfEntretien');


    }
}
