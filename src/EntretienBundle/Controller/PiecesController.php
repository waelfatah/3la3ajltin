<?php

namespace EntretienBundle\Controller;

use AppBundle\Entity\Pieces;
use EntretienBundle\Form\PiecesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PiecesController extends Controller
{
    public function addAction(Request $request)
    {
        $pieces = new Pieces();
        $form = $this->createForm(PiecesType::class, $pieces);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pieces);
            $em->flush();
            $this->addFlash('info', 'created Successfully ! ');
            return $this->redirectToRoute('appointment_Show_Pieces');
        }
        return $this->render("@Entretien/Pieces/add.html.twig", array('pieces' => $form->createView()));
    }

    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pieces = $em->getRepository('AppBundle:Pieces')->findAll();
        return $this->render('@Entretien/Pieces/show.html.twig', array(
            'pieces' => $pieces));
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $pieces = $em->getRepository('AppBundle:Pieces')->find($id);
        $form = $this->createForm(PiecesType::class, $pieces);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pieces);
            $em->flush();
            $this->addFlash('info', 'Modificated Successfully !');
            return $this->redirectToRoute('appointment_Show_Pieces');
        }

        return $this->render("@Entretien/Pieces/edit.html.twig", array('pieces' => $form->createView()));

    }


    public function deleteAction($qdt)
    {

        $em = $this->getDoctrine()->getManager();
        $pieces = $em->getRepository('AppBundle:Pieces')->find($qdt);
        $em->remove($pieces);
        $em->flush();
        return $this->redirectToRoute('appointment_Show_Pieces');


    }
}
