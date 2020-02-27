<?php

namespace EventBundle\Controller;

use AppBundle\Entity\Event;
use EventBundle\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventAdminController extends Controller
{
    public function addEventAction(Request $request)
    {
        $Event= new Event();
        $form = $this->createForm(EventType::class, $Event);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $m = $this->getDoctrine()->getManager();
            $m->persist($Event);
            $m->flush();

            return $this->redirectToRoute('Event_list');
        }
        return $this->render("@Event/AdminEvent/ajouterEvent.html.twig", array(
            "FormE" => $form->createView()
        ));
    }

    public function updateEventAction(Request $request , Event $event)
    {
        $editEvent = $this->createForm('EventBundle\Form\EventType',$event);
        $editEvent->handleRequest($request);
        if ($editEvent->isSubmitted() && $editEvent->isValid())
        {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('Event_list');
        }

        return $this->render('@Event/AdminEvent/updateEvent.html.twig"', array(
            'event'    => $event,
            'FormE'    => $editEvent->createView(),

        ));
    }
    public function deleteEventAction($id)
    {
        $Event =new Event();
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository(  'AppBundle:Event');
        $event = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();

        return $this->forward('EventBundle:EventAdmin:listEvent');



    }
    public function listEventAction()
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository('AppBundle:Event');
        $events = $repository->findAll();
        return $this->render("@Event/AdminEvent/listEvent.html.twig", array(
            'listEvent' => $events
        ));
    }

}
