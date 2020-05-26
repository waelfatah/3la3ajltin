<?php

namespace EntretienBundle\Controller;

use AppBundle\Entity\Appointment;
use EntretienBundle\Form\AppointmentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AppointmentController extends Controller
{
    public function addAction(Request $request)
    {
        $app = new Appointment();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $form = $this->createForm(AppointmentType::class, $app);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $app->setIdUser($user);
            $em->persist($app);

            $em->flush();
            $this->addFlash('info', 'created Successfully ! ');
            return $this->redirectToRoute('appointment_Show_Appointment');
        }
        return $this->render("@Entretien/Appointment/add.html.twig", array('appointment' => $form->createView()));
    }

    public function showAction()
    {


        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:Appointment')->findAll();
        return $this->render('@Entretien/Appointment/show.html.twig', array(
            'appointment' => $app));
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:Appointment')->find($id);
        $form = $this->createForm(AppointmentType::class, $app);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($app);
            $em->flush();
            $this->addFlash('info', 'Modificated Successfully !');
            return $this->redirectToRoute('appointment_Show_Appointment');
        }
        return $this->render("@Entretien/Appointment/edit.html.twig", array('appointment' => $form->createView()));

    }


    public function deleteAction($qdt)
    {

        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:Appointment')->find($qdt);
        $em->remove($app);
        $em->flush();
        return $this->redirectToRoute('appointment_Show_Appointment');


    }

}
