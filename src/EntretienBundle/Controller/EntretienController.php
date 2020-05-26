<?php

namespace EntretienBundle\Controller;

use AppBundle\Entity\Devis;
use AppBundle\Form\DevisType;
use AppBundle\Entity\Entretien;
use AppBundle\Entity\Pieces;
use EntretienBundle\Form\EntretienType;
use Swift_Mailer;
use Swift_SmtpTransport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class EntretienController extends Controller
{
    public function addAction(Request $request)
    {
        $app = new Entretien();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $form = $this->createForm(EntretienType::class, $app);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $app->setIdUser($user);
            $em->persist($app);
            $em->flush();
            $this->addFlash('info', 'created Successfully ! ');
            return $this->redirectToRoute('appointment_Show_Entretien');
        }
        return $this->render("@Entretien/Entretien/add.html.twig", array('Entretien' => $form->createView()));
    }

    public function showAction()
    {


        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:Entretien')->findAll();
        return $this->render('@Entretien/Entretien/show.html.twig', array(
            'Entretien' => $app));
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:Entretien')->find($id);
        $form = $this->createForm(EntretienType::class, $app);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($app);
            $em->flush();
            $this->addFlash('info', 'Modificated Successfully !');
            return $this->redirectToRoute('appointment_Show_Entretien');
        }
        return $this->render("@Entretien/Entretien/edit.html.twig", array('Entretien' => $form->createView()));

    }


    public function deleteAction($qdt)
    {

        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:Entretien')->find($qdt);
        $em->remove($app);
        $em->flush();
        return $this->redirectToRoute('appointment_Show_Entretien');


    }
    public function BestSellersAction()
    {
        $dataPoints = array();
        $em=$this->getDoctrine()->getManager();
        $entretien=$em->getRepository(Entretien::class)->findAll();
        foreach($entretien as $row){
            array_push($dataPoints, array("x"=> $row->getVille(), "y"=> $row->getAgeVelo()));
        }
        return $this->render("@Entretien/Entretien/velostat.html.twig",array('agevelo'=>$dataPoints));
    }

    public function devisAction($idEntretien, Request $request)
    {
        $devis = new Devis();
        $entretien=$this->getDoctrine()->getManager()->getRepository(Entretien::class)->find($idEntretien);
        $form=$this->createForm(DevisType::class,$devis);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465))
                ->setUsername('cliniclic@gmail.com')
                ->setPassword('cliniclic38')
                ->setEncryption('ssl');
            $mailer = new Swift_Mailer($transport);
            $devis ->setIdUser($entretien->getIdUser());
            $devis ->setIdEntretien($entretien);

            $piece=$form->get("idPieces")->getData();
            $quantite=$form->get("quantitePieces")->getData();
            $devis->setId($idEntretien);
            $devis->setPrixPieces($piece->getPrix());
            $devis ->setNomPieces($piece->getNom());
             $prixTot=25.600+$quantite*$piece->getPrix();
             $nomPiece=$piece->getNom();
             $devis->setNomPieces($nomPiece);
            $prixUnitaire=$piece->getPrix();
            $devis->setPrixPieces($prixUnitaire);
            $devis ->setPrixTotal($prixTot);
            $devis ->getQuantitePieces($quantite);

            $message = (new \Swift_Message('Hello Email'))
                ->setFrom('safa.maalej@esprit.tn')
                ->setTo($entretien->getIdUser()->getEmail())

                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        '/Emails/devis.html.twig',
                        ['name' => $entretien->getIdUser()->getUsername(),
                            'prixTot' => $prixTot,
                            'nomPiece' => $nomPiece,
                            'prixUnitaire' => $prixUnitaire,
                            'quantite' => $quantite,
                        ]

                    ),
                    'text/html'
                );
           $mailer->send($message);
            $em=$this->getDoctrine()->getManager();
            $em->persist($devis);
            $em->flush();
           echo $entretien->getIdUser()->getEmail();



        }
        return $this->render("@Entretien/Entretien/devisAdd.html.twig",array('form'=>$form->createView(),'entretien'=>$entretien));


    }

    public function showDAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $app = $em->getRepository('AppBundle:Devis')->findAll();
        return $this->render('@Entretien/Entretien/devisShow.html.twig', array(
            'devis' => $app));
    }

}

