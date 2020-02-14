<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_evenement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvenement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_evenement", type="string", length=250, nullable=false)
     */
    private $nomEvenement;

    /**
     * @var integer
     *
     * @ORM\Column(name="heure_evenement", type="integer", nullable=false)
     */
    private $heureEvenement;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacitÃ©_evenement", type="integer", nullable=false)
     */
    private $capacitã©Evenement;

    /**
     * @var string
     *
     * @ORM\Column(name="description_evenement", type="string", length=250, nullable=false)
     */
    private $descriptionEvenement;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_evenement", type="integer", nullable=false)
     */
    private $typeEvenement;

    /**
     * @var integer
     *
     * @ORM\Column(name="emplacement_evenement", type="integer", nullable=false)
     */
    private $emplacementEvenement;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_evenement", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixEvenement;


}

