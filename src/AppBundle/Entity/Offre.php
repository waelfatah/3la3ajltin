<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity
 */
class Offre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffre;

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
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Emplacement", type="string", length=255, nullable=false)
     */
    private $emplacement;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @return int
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * @param int $idOffre
     */
    public function setIdOffre($idOffre)
    {
        $this->idOffre = $idOffre;
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
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * @param string $emplacement
     */
    public function setEmplacement($emplacement)
    {
        $this->emplacement = $emplacement;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }


}

