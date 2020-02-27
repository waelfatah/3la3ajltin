<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireArticle
 *
 * @ORM\Table(name="commentaire_article")
 * @ORM\Entity
 */
class CommentaireArticle
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
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Article")
     *
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="idArticle",referencedColumnName="idArticle" )
     * })
     */
    private $Article;


    /**

     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id" , onDelete="CASCADE")
     */
    private $user;

    /**
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->Article;
    }

    /**
     * @param mixed $Article
     */
    public function setArticle($Article)
    {
        $this->Article = $Article;
    }



    /**
     * @return \FosUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \FosUser $utilisateur
     */
    public function setUser($user)
    {
        $this->user = $user;
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

