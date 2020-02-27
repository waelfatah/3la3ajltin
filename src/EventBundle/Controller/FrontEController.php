<?php

namespace EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Event;
use AppBundle\Entity\Favorite;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FrontEController extends Controller
{
    /**
     * @Route("/display")
     */
    public function displayAction()
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository('AppBundle:Event');
        $event = $repository->getEvent($this->getUser());

        return $this->render('@Event/Default/Event.html.twig', array(
            'event' => $event,

            //
        ));
    }


    public function rateAction(Event $event, $type)
    { $em = $this->getDoctrine()->getManager();
        $rating = new Favorite();

        $m=$this->getDoctrine()->getManager();
        $user=$this->getUser();


        $doctrine = $this->getDoctrine();
        $repository =  $doctrine->getRepository('AppBundle:Favorite');

        $ratings = $repository->getFavorite($this->getUser()->getId(),$event);

        if ( $ratings != null )
        {

            if($ratings[0]->getType()==$type){

                $em->remove($ratings[0]);

                $em->flush();

            }

            else {

                $ratings[0]->setType($type);
                $em->persist($ratings[0]);

                $em->flush();
            }
        }
        else
        {



            $rating->setUser($user);
            $rating->setEvent($event);
            $rating->setType($type);
            $em->persist($rating);

            $em->flush();



        }

        return $this->redirectToRoute("Display_event");



    }

    public function displayEventSoloAction(Request $request,Event $event)
    {

        $event=$this->getDoctrine()->getManager()->getRepository(Event::class)->find($event->getId());


        {
            return $this->render('@Event/Default/EventSingle.html.twig', array(
                'event'=>$event,

            ));

        }

    }

    public function mapAction()
    {
        return $this->render('@Event/Default/Map.html.twig');
    }


}
