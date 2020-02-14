<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VeloUtile
 *
 * @ORM\Table(name="velo_utile")
 * @ORM\Entity
 */
class VeloUtile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_velo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVelo;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255, nullable=false)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="type_velo", type="string", length=255, nullable=false)
     */
    private $typeVelo;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_location", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixLocation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_image", type="integer", nullable=true)
     */
    private $idImage;

    /**
     * @var string
     *
     * @ORM\Column(name="url_image", type="string", length=255, nullable=false)
     */
    private $urlImage;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=20, nullable=false)
     */
    private $etat;

    /**
     * @return int
     */
    public function getIdVelo()
    {
        return $this->idVelo;
    }

    /**
     * @param int $idVelo
     */
    public function setIdVelo($idVelo)
    {
        $this->idVelo = $idVelo;
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
     * @return string
     */
    public function getTypeVelo()
    {
        return $this->typeVelo;
    }

    /**
     * @param string $typeVelo
     */
    public function setTypeVelo($typeVelo)
    {
        $this->typeVelo = $typeVelo;
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
     * @return float
     */
    public function getPrixLocation()
    {
        return $this->prixLocation;
    }

    /**
     * @param float $prixLocation
     */
    public function setPrixLocation($prixLocation)
    {
        $this->prixLocation = $prixLocation;
    }

    /**
     * @return int
     */
    public function getIdImage()
    {
        return $this->idImage;
    }

    /**
     * @param int $idImage
     */
    public function setIdImage($idImage)
    {
        $this->idImage = $idImage;
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
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }


}

