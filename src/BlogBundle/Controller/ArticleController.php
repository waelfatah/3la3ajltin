<?php

namespace BlogBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\CommentaireArticle;
use AppBundle\Entity\Rating;
use AppBundle\Entity\RatingArticle;
use BlogBundle\Form\CommentaireArticleType;
use BlogBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ArticleController extends Controller
{
    public function ajouterAction(Request $request)
    { $em = $this->getDoctrine()->getManager();
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {   $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $article->setUser($user);
            $article->setEtat('En cours');
            $em->persist($article);
            $article->setDate(new \DateTime('now'));
        $em->flush();



            return $this->redirectToRoute("Afficher_homepage");
        }

        return $this->render("@Blog/Article/Ajouter.html.twig", array('form' => $form->createView()));
    }
    public function blogAction(){
        return $this->render("@Blog/Article/blog.html.twig");
    }


    public function backAction()
    {
        return $this->render("@Blog/Article/back.html.twig");
    }

    public function blogsoloAction(Article $article,Request $request )
    {
        $em=$this->getDoctrine()->getManager();
        $doctrine= $this->getDoctrine();
        $art=$em->getRepository("AppBundle:Article")->getarticle($this->getUser(),$article->getIdarticle());
        $repository = $doctrine->getRepository('AppBundle:CommentaireArticle');
        $commentaires = $repository->findAll();
        $commentaire=new \AppBundle\Entity\CommentaireArticle();
        $form=$this->createForm(\BlogBundle\Form\CommentaireArticleType::class,$commentaire);
        $doctrine= $this->getDoctrine();

        $repository = $doctrine->getRepository('AppBundle:Article');
        $Articles = $repository->getarticle($this->getUser(),$article);
        $nbcoment = $repository->getcoments($article->getIdarticle());
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $commentaire->setUser($this->getUser());
            $commentaire->setArticle($article);
            $commentaire->setDate(new \DateTime('now'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush();
            $doctrine= $this->getDoctrine();
            $repository = $doctrine->getRepository('AppBundle:CommentaireArticle');
            $commentaires = $repository->findAll();
            $repository = $doctrine->getRepository('AppBundle:Article');
            $nbcoment = $repository->getcoments($article->getIdarticle() );
            return $this->render('@Blog/Article/blogsolo.html.twig', array(
                'Articles'=>$Articles[0],'f'=>$form->createView(),'Commentaires'=>$commentaires,'nbcomment'=>$nbcoment[0]
            , 'article'    => $art[0]
            ));

        }
        $form=$this->createForm(CommentaireArticleType::class,$commentaire);
        return $this->render('@Blog/Article/blogsolo.html.twig', array(
            'Articles'=>$Articles[0],'f'=>$form->createView(),'Commentaires'=>$commentaires,'nbcomment'=>$nbcoment[0],
            'article'    => $art[0]

        ));
    }


    public function MostlikedAction()
    {

        $em=$this->getDoctrine()->getManager();
        $rating=$em->getRepository(Rating::class)->getstat();

        return $this->render("@Blog/Article/statistiques.html.twig",array('rating'=>$rating));
    }


    public function afficherAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();

        $article=$em->getRepository("AppBundle:Article")->getarticles($this->getUser());
        $doctrine = $this->getDoctrine();
        $repository =  $doctrine->getRepository('AppBundle:Rating');

//        $ratings = $repository->getRating($this->getUser()->getId());
        return $this->render("@Blog/Article/Afficher.html.twig",array('article'=>$article));

    }


    public function controlerAction()
    {

        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository("AppBundle:Article")->getarticles($this->getUser());

        return $this->render("@Blog/Article/Controle.html.twig",array('article'=>$article));

    }

    public function gestionAction()
    {

        $em=$this->getDoctrine()->getManager();
        $article=$em->getRepository("AppBundle:Article")->getarticles($this->getUser());

        return $this->render("@Blog/Article/admin.html.twig",array('article'=>$article));

    }
    public function modifierAction(Request $request ,Article $articles)
    {
        $editFormArticle = $this->createForm('BlogBundle\Form\ArticleType',$articles);
        $editFormArticle->handleRequest($request);
        if ($editFormArticle->isSubmitted() && $editFormArticle->isValid())
        {
            //$events->setDateUpdate(new \DateTime('now'));
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('Afficher_homepage');
        }

        return $this->render('@Blog/Article/Modifier.html.twig', array(
            'articles'    => $articles,
            'form'    => $editFormArticle->createView(),

        ));


    }

    public function ConfirmerAction(Article $article)
    {
        $article->setEtat("Confirmé");

        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('Control_homepage');

    }

    public function rejeterAction(Article $article)
    {
        $article->setEtat("Rejeté");

        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('Control_homepage');



    }


    public function SupprimerAction(Request $request,Article $article)
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute("Afficher_homepage");

    }
    public function rateAction(Article $article, $type)
    { $em = $this->getDoctrine()->getManager();
        $rating = new Rating();

        $m=$this->getDoctrine()->getManager();
        $user=$this->getUser();


        $doctrine = $this->getDoctrine();
        $repository =  $doctrine->getRepository('AppBundle:Rating');

        $ratings = $repository->getRating($this->getUser()->getId(),$article);

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
                $rating->setArticle($article);
                $rating->setType($type);
                $em->persist($rating);

                $em->flush();



        }

            return $this->redirectToRoute("Afficher_homepage");



    }

    public function ajoutadminAction(Request $request)
    { $em = $this->getDoctrine()->getManager();
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $article->setUser($this->getUser());
            $article->setEtat('confirmé');
            $em->persist($article);
            $article->setDate(new \DateTime('now'));
            $em->flush();



            return $this->redirectToRoute("gestion_homepage");
        }

        return $this->render("@Blog/Article/adminajout.html.twig", array('form' => $form->createView()));
    }




    public function adminmodifAction(Request $request , Article $article)
    {
        $editFormArticle = $this->createForm('BlogBundle\Form\ArticleType',$article);
        $editFormArticle->handleRequest($request);
        if ($editFormArticle->isSubmitted() && $editFormArticle->isValid())
        {
            //$events->setDateUpdate(new \DateTime('now'));
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('gestion_homepage');
        }

        return $this->render('@Blog/Article/adminmodif.html.twig', array(
            'article'    => $article,
            'form'    => $editFormArticle->createView(),

        ));
    }

    public function adminsupAction(Request $request,Article $article)
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute("gestion_homepage");

    }





}
