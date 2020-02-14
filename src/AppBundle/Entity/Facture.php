<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture", indexes={@ORM\Index(name="fk_idPiece", columns={"idPiece"})})
 * @ORM\Entity
 */
class Facture
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFacture", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfacture;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var integer
     *
     * @ORM\Column(name="idPiece", type="integer", nullable=false)
     */
    private $idpiece;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbPiece", type="integer", nullable=false)
     */
    private $nbpiece;

    /**
     * @var float
     *
     * @ORM\Column(name="prixUnitaire", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixunitaire;

    /**
     * @var float
     *
     * @ORM\Column(name="Total", type="float", precision=10, scale=0, nullable=false)
     */
    private $total;


}

