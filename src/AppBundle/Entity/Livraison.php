<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity
 */
class Livraison
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_l", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idL;

    /**
     * @var string
     *
     * @ORM\Column(name="Localisation", type="string", length=255, nullable=false)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_livreur", type="integer", nullable=false)
     */
    private $idLivreur;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_velo", type="integer", nullable=false)
     */
    private $idVelo;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_commande", type="integer", nullable=false)
     */
    private $idCommande;


}

