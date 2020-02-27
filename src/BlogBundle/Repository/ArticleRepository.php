<?php

namespace BlogBundle\Repository;

use AppBundle\Entity\Article;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function getarticles($user)
    {

        $parameters = array(
            'user' => $user

        );

        $query = $this->getEntityManager()
            ->createQuery("SELECT u.id as id , a.etat , a.idarticle , a.date , a.titre , a.image, a.description ,CASE  WHEN r.user =:user THEN r.type ELSE 'none' END as Rated,SUM(CASE WHEN r.type = 'Like' THEN 1 ELSE 0 END ) as likes , SUM(CASE WHEN r.type = 'Dislike' THEN 1 ELSE 0 END ) as dislikes ,
            u.username as auteur from AppBundle:Article a LEFT JOIN AppBundle:Rating r with a.idarticle=r.article LEFT JOIN AppBundle:FosUser u with u.id = a.user  GROUP BY a.idarticle")
            ->setParameters($parameters);
        return $query->getResult();
    }
    public function Mostliked(Article $article)
    {
        $dql = $this->createQueryBuilder('article');
        $dql->orderBy('article.idarticle', 'ASC');
        $query = $dql->getQuery();
        $query->setMaxResults(3);
        return $query->getResult();
    }


    public function getarticle($user,$idArticle)
    {

        $parameters = array(
            'user' => $user,
            'idarticle' => $idArticle

        );

        $query = $this->getEntityManager()
            ->createQuery("SELECT u.id as id , a.etat , a.idarticle , a.date , a.titre , a.image, a.description ,CASE  WHEN r.user =:user THEN r.type ELSE 'none' END as Rated,SUM(CASE WHEN r.type = 'Like' THEN 1 ELSE 0 END ) as likes , SUM(CASE WHEN r.type = 'Dislike' THEN 1 ELSE 0 END ) as dislikes ,
            u.username as auteur from AppBundle:Article a LEFT JOIN AppBundle:Rating r with a.idarticle=r.article LEFT JOIN AppBundle:FosUser u with u.id = a.user WHERE a.idarticle =:idarticle GROUP BY a.idarticle")
            ->setParameters($parameters);
        return $query->getResult();
    }

    public function getcoments($id)
    {

        $parameters = array(
            'id' => $id


        );

        $query = $this->getEntityManager()
            ->createQuery("SELECT count(c) as nb from AppBundle:CommentaireArticle c WHERE c.Article =:id  ")
            ->setParameters($parameters);
        return $query->getResult();
    }

}