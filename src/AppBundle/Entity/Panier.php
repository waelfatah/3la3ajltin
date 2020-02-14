<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity
 */
class Panier
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     */
    private $idProduit;

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
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;


}

