<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Piece
 *
 * @ORM\Table(name="piece")
 * @ORM\Entity
 */
class Piece
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPiece", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpiece;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbPiece", type="integer", nullable=false)
     */
    private $nbpiece;


}

