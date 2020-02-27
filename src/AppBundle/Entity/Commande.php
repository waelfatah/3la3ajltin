<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={ @ORM\Index(name="commande_user", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\CommandeRepository")
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $Date;
    /**
     * @var float
     *
     * @ORM\Column(name="prix_total", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="code_promo", type="string", length=25, nullable=true)
     */
    private $codePromo;

    /**
     * @ORM\Column(type="string",nullable=true)
     *
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image;

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param \DateTime $Date
     */
    public function setDate($Date)
    {
        $this->Date = $Date;
    }

    /**
     *
     * @ORM\ManyToMany(targetEntity="Produit", cascade={"persist"})
     * @ORM\JoinTable(name="comamnde_produits",
     *   joinColumns={@ORM\JoinColumn(name="id_commande" ,referencedColumnName="id_commande")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_prod", referencedColumnName="id_prod")})
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

    /**
     * Add $idProd
     *
     * @param Produit $idProd
     *
     * @return $this
     */
    public function addProduit(Produit $idProd){
        $this->idProd[] = $idProd;

        return $this;
    }
    /**
     * Remove $idProd
     *
     * @param Produit $idProd
     */
    public function removeProduit(Produit $idProd){
        $this->idProd->removeElement($idProd);
    }
    /**
     * Get $idProd
     *
     * @return Collection
     */
    public function getIdProd(){
        return $this->idProd;
    }
    public function __construct()
    {
        $this->idProd = new ArrayCollection();
    }

}

