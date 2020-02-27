<?php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @return int
     */
    public function getIdReclamation()
    {
        return $this->idReclamation;
    }

    /**
     * @param int $idReclamation
     */
    public function setIdReclamation($idReclamation)
    {
        $this->idReclamation = $idReclamation;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * @param string $sujet
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_reclamation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReclamation;


    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Sujet", type="string", length=255, nullable=false)
     */

    private $sujet;

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
     * @ORM\Column(type="string",nullable=true)
     *
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date", nullable=false)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     */
    private $user;


    /**
     * Set user
     *
     * @param \AppBundle\Entity\FosUser $user
     *
     * @return Reclamation
     */


    public function setUser(\AppBundle\Entity\FosUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\FosUser
     */
    public function getUser()
    {
        return $this->user;
    }
}
