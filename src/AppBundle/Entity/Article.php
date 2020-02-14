<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idArticle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticle;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=200, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=200, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbLike", type="integer", nullable=true)
     */
    private $nblike;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbDislike", type="integer", nullable=true)
     */
    private $nbdislike;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbCommentaire", type="integer", nullable=true)
     */
    private $nbcommentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="Photo", type="string", length=200, nullable=false)
     */
    private $photo;

    /**
     * @var integer
     *
     * @ORM\Column(name="Rating", type="integer", nullable=false)
     */
    private $rating;


}

