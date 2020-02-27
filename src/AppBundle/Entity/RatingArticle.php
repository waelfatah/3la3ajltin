<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Article;
use AppBundle\Entity\FosUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * RatingArticle
 *
 * @ORM\Table(name="rating_article")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\RatingRepository")
 */
class RatingArticle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id" , onDelete="CASCADE")
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Article
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Article")
     *
     * @ORM\JoinColumn(name="id_article",referencedColumnName="idArticle" , onDelete="CASCADE")
     */
    private $article;


    /**
     * @var string
     *
     *
     * @ORM\Column(name="Type", type="string", length=255)
     */
    private $type;

    /**
     * @return \FosUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \FosUser $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param Article $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

