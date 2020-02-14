<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="commande_prod", columns={"id_prod"}), @ORM\Index(name="commande_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

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
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

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

    /**
     * @return int
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param int $idCommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return float
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * @param float $prixTotal
     */
    public function setPrixTotal($prixTotal)
    {
        $this->prixTotal = $prixTotal;
    }

    /**
     * @return string
     */
    public function getCodePromo()
    {
        return $this->codePromo;
    }

    /**
     * @param string $codePromo
     */
    public function setCodePromo($codePromo)
    {
        $this->codePromo = $codePromo;
    }

    /**
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return \Produit
     */
    public function getIdProd()
    {
        return $this->idProd;
    }

    /**
     * @param \Produit $idProd
     */
    public function setIdProd($idProd)
    {
        $this->idProd = $idProd;
    }

    /**
     * @return \FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \FosUser $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }


}

