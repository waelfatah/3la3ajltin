<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location", indexes={@ORM\Index(name="location_velo", columns={"id_velo"}), @ORM\Index(name="location_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Location
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_location", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLocation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_heure_debut", type="datetime", nullable=false)
     */
    private $dateHeureDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_heure_fin", type="datetime", nullable=false)
     */
    private $dateHeureFin;

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
     * @var \VeloUtile
     *
     * @ORM\ManyToOne(targetEntity="VeloUtile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_velo", referencedColumnName="id_velo")
     * })
     */
    private $idVelo;

    /**
     * @return int
     */
    public function getIdLocation()
    {
        return $this->idLocation;
    }

    /**
     * @param int $idLocation
     */
    public function setIdLocation($idLocation)
    {
        $this->idLocation = $idLocation;
    }

    /**
     * @return \DateTime
     */
    public function getDateHeureDebut()
    {
        return $this->dateHeureDebut;
    }

    /**
     * @param \DateTime $dateHeureDebut
     */
    public function setDateHeureDebut($dateHeureDebut)
    {
        $this->dateHeureDebut = $dateHeureDebut;
    }

    /**
     * @return \DateTime
     */
    public function getDateHeureFin()
    {
        return $this->dateHeureFin;
    }

    /**
     * @param \DateTime $dateHeureFin
     */
    public function setDateHeureFin($dateHeureFin)
    {
        $this->dateHeureFin = $dateHeureFin;
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
     * @return \VeloUtile
     */
    public function getIdVelo()
    {
        return $this->idVelo;
    }

    /**
     * @param \VeloUtile $idVelo
     */
    public function setIdVelo($idVelo)
    {
        $this->idVelo = $idVelo;
    }


}

