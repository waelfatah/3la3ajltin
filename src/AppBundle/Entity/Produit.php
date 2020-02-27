<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="FK_prodImage", columns={"id_image"})})
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_prod", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProd;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=50, nullable=false)
     */
    private $marque;

    /**
     * @var float
     *     @Assert\GreaterThan(
     *     value = 0
     * )
     * @ORM\Column(name="prix_prod", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixProd;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;
    /**
     * @var integer
     *
     * @ORM\Column(name="quantite_av", type="integer", nullable=true)
     */
    private $quantiteAV;
    /**
     * @var integer
     *
     * @ORM\Column(name="nb_ventes", type="integer", nullable=true)
     */
    private $NbVentes;

    /**
     * @return int
     */
    public function getNbVentes()
    {
        return $this->NbVentes;
    }

    /**
     * @param int $NbVentes
     */
    public function setNbVentes($NbVentes)
    {
        $this->NbVentes = $NbVentes;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="type_prod", type="string", length=25, nullable=false)
     */
    private $typeProd;

    /**
     * @var string
     * @Assert\Url(
     *     protocols = {"http", "https", "ftp"}
     *     )
     * @ORM\Column(name="url_image", type="string", length=255, nullable=false)
     */
    private $urlImage;

    /**
     * @var \Images
     *
     * @ORM\ManyToOne(targetEntity="Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_image", referencedColumnName="id_image")
     * })
     */
    private $idImage;
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
     * @return int
     */
    public function getIdProd()
    {
        return $this->idProd;
    }

    /**
     * @param int $idProd
     */
    public function setIdProd($idProd)
    {
        $this->idProd = $idProd;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param string $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return float
     */
    public function getPrixProd()
    {
        return $this->prixProd;
    }

    /**
     * @param float $prixProd
     */
    public function setPrixProd($prixProd)
    {
        $this->prixProd = $prixProd;
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
     * @return string
     */
    public function getTypeProd()
    {
        return $this->typeProd;
    }

    /**
     * @param string $typeProd
     */
    public function setTypeProd($typeProd)
    {
        $this->typeProd = $typeProd;
    }

    /**
     * @return string
     */
    public function getUrlImage()
    {
        return $this->urlImage;
    }

    /**
     * @param string $urlImage
     */
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;
    }

    /**
     * @return \Images
     */
    public function getIdImage()
    {
        return $this->idImage;
    }

    /**
     * @param \Images $idImage
     */
    public function setIdImage($idImage)
    {
        $this->idImage = $idImage;
    }

    /**
     * @return int
     */
    public function getQuantiteAV()
    {
        return $this->quantiteAV;
    }

    /**
     * @param int $quantiteAV
     */
    public function setQuantiteAV($quantiteAV)
    {
        $this->quantiteAV = $quantiteAV;
    }



}

