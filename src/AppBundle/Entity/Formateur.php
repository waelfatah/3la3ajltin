<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formateur
 *
 * @ORM\Table(name="formateur")
 * @ORM\Entity
 */
class Formateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_formateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFormateur;

    /**
     * @var string
     *
     * @ORM\Column(name="disponibilitÃ©_F", type="string", length=250, nullable=false)
     */
    private $disponibilitã©F;

    /**
     * @var string
     *
     * @ORM\Column(name="experience_F", type="string", length=250, nullable=false)
     */
    private $experienceF;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_H", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixH;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;


}

