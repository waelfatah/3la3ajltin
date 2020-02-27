<?php

namespace FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Formation;
use AppBundle\Entity\FormulaireInscription;
use FormationBundle\Form\FormulaireInscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class FrontFController extends Controller
{
    /**
     * @Route("/display")
     */
    public function displayAction()
    {
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('AppBundle:Formation');
        $formation = $repository->findAll();

        return $this->render('@Formation/Default/DisplayFormation.html.twig', array(
            'formation'=>$formation,

            //
        ));
    }
    public function displayFormationSoloAction(Request $request,Formation $formation)
    {
        $reservation =new FormulaireInscription();
        $formation=$this->getDoctrine()->getManager()->getRepository(Formation::class)->find($formation->getId());

        $formulairePForm = $this->createForm('FormationBundle\Form\FormulaireInscriptionType',$reservation);
        $formulairePForm->handleRequest($request);
        /*var_dump($salle);
        die();*/
        if ($formulairePForm->isSubmitted() && $formulairePForm->isValid()) {
            $user = $this->getUser();
            $reservation->setIdUser($user);
            $reservation->setDateInscription(new \DateTime('now'));

            $reservation->setIdFormation($formation);
            $reservation->setEtat('en cours');
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            return $this->forward('FormationBundle:FrontF:MesReservations');
        }

        {
            return $this->render('@Formation/Default/FormulaireParticipation.html.twig', array(
                'formation'=>$formation,
                'formulairePform' => $formulairePForm->createView(),
            ));

        }

    }


    public function DeleteReservationsAction($id)
    {
        $reservation =new FormulaireInscription();
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('AppBundle:FormulaireInscription');
        $reservation = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($reservation);
        $em->flush();

        return $this->forward('FormationBundle:FrontF:MesReservations');
    }

    public function MesReservationsAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $doctrine= $this->getDoctrine();
        $repository = $doctrine->getRepository('AppBundle:FormulaireInscription');
        $reservations = $repository->findBy(array('idUser'=>$user->getId()));

        return $this->render('@Formation/Default/MesReservations.html.twig', array(
            'reservations'=>$reservations,

            //
        ));
    }


}
