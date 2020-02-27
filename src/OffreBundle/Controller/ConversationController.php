<?php

namespace OffreBundle\Controller;
use AppBundle\Entity\ConversationReply;
use AppBundle\Entity\FosUser;
use AppBundle\Entity\Conversation;
use AppBundle\Entity\Offre;
use OffreBundle\Form\ConversationType;
use OffreBundle\Form\OffreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ConversationController extends Controller
{
    public function startAction(Request $request,$id,$iduser)
    {   $conversation = new Conversation();

        $form = $this->createForm(ConversationType::class, $conversation);
        $form->handleRequest($request);


        if ($form->isValid()) {
            $D=new \DateTime('now');

            $userone = $this->container->get('security.token_storage')->getToken()->getUser();
            $conversation->setIdUserOne($userone);
            $userrepository=$this->getDoctrine()->getRepository(FosUser::class);
            $conversation->setIdUserTwo($userrepository->find($iduser));
            $offrerepository=$this->getDoctrine()->getRepository(Offre::class);
            $conversation->setIdOffre($offrerepository->find($id));
            $conversation->setTime($D);


            $em = $this->getDoctrine()->getManager();
            $em->persist($conversation);
            $em->flush();
            $this->addFlash('info', 'Created Successfully !');
            return $this->redirectToRoute('Conversation_show');
        }
        return $this->render('@Offre/Conversation/Conversationadd.html.twig',array(
            'Form'=> $form->createView()));

        //form

    }
    public function showAction(){

        $em= $this->getDoctrine()->getManager();
        $offer =$em->getRepository(Conversation::class)->findAll();
        return $this->render('@Offre/Conversation/conversationshow.html.twig',array(
            'list'=> $offer));
    }

}
