<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Likes
 *
 * @ORM\Table(name="likes", indexes={@ORM\Index(name="fk_idArticle", columns={"idArticle"})})
 * @ORM\Entity
 */
class Likes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idLike", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlike;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var integer
     *
     * @ORM\Column(name="idArticle", type="integer", nullable=false)
     */
    private $idarticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date", nullable=false)
     */
    private $date;


}

