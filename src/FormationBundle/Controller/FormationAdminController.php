<?php

namespace FormationBundle\Controller;

use Doctrine\ORM\OptimisticLockException;
use AppBundle\Entity\Formation;
use AppBundle\Entity\FormulaireInscription;
use FormationBundle\Form\FormationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class FormationAdminController extends Controller
{
    public function addFormationAction(Request $request)
    {
        $Formation = new Formation();
        $form = $this->createForm(FormationType::class, $Formation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $m = $this->getDoctrine()->getManager();
            $m->persist($Formation);
            $m->flush();

            return $this->redirectToRoute('Formation_list');
        }
        return $this->render("@Formation/AdminFormation/ajouterFormation.html.twig", array(
            "FormF" => $form->createView()
        ));
    }

    public function updateFormationAction(Request $request, Formation $formation)
    {
        $editFormation = $this->createForm('FormationBundle\Form\FormationType', $formation);
        $editFormation->handleRequest($request);
        if ($editFormation->isSubmitted() && $editFormation->isValid()) {
            //$events->setDateUpdate(new \DateTime('now'));
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('Formation_list');
        }

        return $this->render('@Formation/AdminFormation/updateFormation.html.twig"', array(
            'formation' => $formation,
            'FormF' => $editFormation->createView(),

        ));
    }

    public function deleteFormationAction($id)
    {
        $Formation = new Formation();
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository('AppBundle:Formation');
        $formation = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($formation);
        $em->flush();

        return $this->forward('FormationBundle:FormationAdmin:listFormation');


    }

    public function listFormationAction()
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository('AppBundle:Formation');
        $formations = $repository->findAll();
        return $this->render("@Formation/AdminFormation/listFormation.html.twig", array(
            'listFormation' => $formations
        ));
    }

    public function DisplayReservationsAction()
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository('AppBundle:FormulaireInscription');
        $reservations = $repository->gettoutlesreservation();

        return $this->render('@Formation/AdminFormation/DisplayReservation.html.twig', array(
            'reservations' => $reservations,

            //
        ));
    }

    public function rejeterAction(FormulaireInscription $reservation)
    {
        $reservation->setEtat("Rejeté");
        //$events->setDateUpdate(new \DateTime('now'));
        $this->getDoctrine()->getManager()->flush();
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Votre demande a été rejetée');
        $notif->setMessage('This a notification.');
        $notif->setLink('http://symfony.com/');
        // or the one-line method :
        // $manager->createNotification('Notification subject','Some random text','http://google.fr');

        // you can add a notification to a list of entities
        // the third parameter ``$flush`` allows you to directly flush the entities
        try {
            $manager->addNotification(array($this->getUser()), $notif, true);
        } catch (OptimisticLockException $e) {
        }

        return $this->redirectToRoute('toutlesreservation');


    }

    public function ConfirmerAction(FormulaireInscription $reservation)
    {
        $reservation->setEtat("Confirmé");
        //$events->setDateUpdate(new \DateTime('now'));
        $this->getDoctrine()->getManager()->flush();
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Votre demande a été acceptée');
        $notif->setMessage('This a notification.');
        $notif->setLink('http://symfony.com/');
        // or the one-line method :
        // $manager->createNotification('Notification subject','Some random text','http://google.fr');

        // you can add a notification to a list of entities
        // the third parameter ``$flush`` allows you to directly flush the entities
        try {
            $manager->addNotification(array($this->getUser()), $notif, true);
        } catch (OptimisticLockException $e) {
        }
        return $this->redirectToRoute('toutlesreservation');


    }
}
