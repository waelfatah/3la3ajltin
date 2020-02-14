<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dislike
 *
 * @ORM\Table(name="dislike", indexes={@ORM\Index(name="fk_idArticle", columns={"idArticle"})})
 * @ORM\Entity
 */
class Dislike
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idDislike", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddislike;

    /**
     * @var integer
     *
     * @ORM\Column(name="idArticle", type="integer", nullable=false)
     */
    private $idarticle;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date", nullable=false)
     */
    private $date;


}

