<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating")

 * @ORM\Entity(repositoryClass="BlogBundle\Repository\RatingRepository")
 */
class Rating
{
    /**
     * @var int
     *
     * @ORM\Column(name="idrate", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idrate;


    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id")
     *})
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Article
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Article")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_article",referencedColumnName="idArticle")
     * })
     */
    private $article;


    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255)
     */
    private $type;

    /**
     * @return int
     */
    public function getIdrate()
    {
        return $this->idrate;
    }

    /**
     * @param int $idrate
     */
    public function setIdrate($idrate)
    {
        $this->idrate = $idrate;
    }

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




}