<?php

namespace AppBundle\Entity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entretien
 * @Vich\Uploadable
 * @ORM\Table(name="entretien")
 * @ORM\Entity(repositoryClass="EntretienBundle\Repository\EntretienRepository")
 */
class Entretien
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
     * @ORM\Column(name="typeClient", type="string", length=255)
     */
    private $typeClient;

    /**
     * @var string
     *
     * @ORM\Column(name="typeVelo", type="string", length=255)
     */
    private $typeVelo;

    /**
     * @var int
     *
     * @ORM\Column(name="ageVelo", type="integer")
     */
    private $ageVelo;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $idUser;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set typeClient
     *
     * @param string $typeClient
     *
     * @return Entretien
     */
    public function setTypeClient($typeClient)
    {
        $this->typeClient = $typeClient;

        return $this;
    }

    /**
     * Get typeClient
     *
     * @return string
     */
    public function getTypeClient()
    {
        return $this->typeClient;
    }

    /**
     * Set typeVelo
     *
     * @param string $typeVelo
     *
     * @return Entretien
     */
    public function setTypeVelo($typeVelo)
    {
        $this->typeVelo = $typeVelo;

        return $this;
    }

    /**
     * Get typeVelo
     *
     * @return string
     */
    public function getTypeVelo()
    {
        return $this->typeVelo;
    }

    /**
     * Set ageVelo
     *
     * @param integer $ageVelo
     *
     * @return Entretien
     */
    public function setAgeVelo($ageVelo)
    {
        $this->ageVelo = $ageVelo;

        return $this;
    }

    /**
     * Get ageVelo
     *
     * @return int
     */
    public function getAgeVelo()
    {
        return $this->ageVelo;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Entretien
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Entretien
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

