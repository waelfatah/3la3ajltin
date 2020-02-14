<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rdv
 *
 * @ORM\Table(name="rdv")
 * @ORM\Entity
 */
class Rdv
{
    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="email", type="integer", nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="Prestation", type="string", length=255, nullable=false)
     */
    private $prestation;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_RDV", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRdv;


}

