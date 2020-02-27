<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mgilet\NotificationBundle\Annotation\Notifiable;
use Mgilet\NotificationBundle\NotifiableInterface;

/**
 * FormulaireInscription
 *
 * @ORM\Table(name="formulaire_inscription")
 * @ORM\Entity(repositoryClass="FormationBundle\Repository\FormulaireInscriptionRepository")
 * @Notifiable(name="FormulaireInscription")
 */
class FormulaireInscription implements NotifiableInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomParticipant", type="string", length=255)
     */
    private $nomParticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomParticipant", type="string", length=255)
     */
    private $prenomParticipant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscription", type="datetime")
     */
    private $dateInscription;

    /**
     * @var int
     *
     * @ORM\Column(name="nombrePlaceReservation", type="integer")
     */
    private $nombrePlaceReservation;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \Formation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Formation")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_formation",referencedColumnName="id")
     *})
     */
    private $idFormation;


    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id")
     *})
     */
    private $idUser;


    /**
     * @var String
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @return int
     */
    public function getNombrePlaceReservation()
    {
        return $this->nombrePlaceReservation;
    }

    /**
     * @param int $nombrePlaceReservation
     */
    public function setNombrePlaceReservation($nombrePlaceReservation)
    {
        $this->nombrePlaceReservation = $nombrePlaceReservation;
    }

    /**
     * @return String
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param String $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomParticipant
     *
     * @param string $nomParticipant
     *
     * @return FormulaireInscription
     */
    public function setNomParticipant($nomParticipant)
    {
        $this->nomParticipant = $nomParticipant;

        return $this;
    }

    /**
     * Get nomParticipant
     *
     * @return string
     */
    public function getNomParticipant()
    {
        return $this->nomParticipant;
    }

    /**
     * Set prenomParticipant
     *
     * @param string $prenomParticipant
     *
     * @return FormulaireInscription
     */
    public function setPrenomParticipant($prenomParticipant)
    {
        $this->prenomParticipant = $prenomParticipant;

        return $this;
    }

    /**
     * Get prenomParticipant
     *
     * @return string
     */
    public function getPrenomParticipant()
    {
        return $this->prenomParticipant;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return FormulaireInscription
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return FormulaireInscription
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return FormulaireInscription
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set idFormation
     *
     * @param integer $idFormation
     *
     * @return FormulaireInscription
     */
    public function setIdFormation($idFormation)
    {
        $this->idFormation = $idFormation;

        return $this;
    }

    /**
     * Get idFormation
     *
     * @return int
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return FormulaireInscription
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}

