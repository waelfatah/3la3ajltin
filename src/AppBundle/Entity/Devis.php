<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devis
 *
 * @ORM\Table(name="devis", indexes={@ORM\Index(name="FK_devisProd", columns={"id_prod"}), @ORM\Index(name="FK_devisUser", columns={"id_user"})})
 * @ORM\Entity
 */
class Devis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_devis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDevis;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_total", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="code_promo", type="string", length=25, nullable=false)
     */
    private $codePromo;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_prod", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixProd;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prod", referencedColumnName="id_prod")
     * })
     */
    private $idProd;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;


}

