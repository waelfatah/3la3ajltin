<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation", indexes={@ORM\Index(name="fk_id_formateur", columns={"id_formateur"})})
 * @ORM\Entity
 */
class Formation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_formation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_formation", type="string", length=250, nullable=false)
     */
    private $nomFormation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_formation", type="date", nullable=false)
     */
    private $dateFormation;

    /**
     * @var integer
     *
     * @ORM\Column(name="heure_formation", type="integer", nullable=false)
     */
    private $heureFormation;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacitÃ©_formation", type="integer", nullable=false)
     */
    private $capacitã©Formation;

    /**
     * @var string
     *
     * @ORM\Column(name="emplacement_formation", type="string", length=250, nullable=false)
     */
    private $emplacementFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="description_formation", type="string", length=250, nullable=false)
     */
    private $descriptionFormation;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_formation", type="integer", nullable=false)
     */
    private $typeFormation;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_formation", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="image_Formation", type="string", length=250, nullable=false)
     */
    private $imageFormation;

    /**
     * @var \Formateur
     *
     * @ORM\ManyToOne(targetEntity="Formateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_formateur", referencedColumnName="id_formateur")
     * })
     */
    private $idFormateur;


}

