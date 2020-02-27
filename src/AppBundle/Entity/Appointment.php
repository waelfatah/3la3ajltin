<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appointment
 *
 * @ORM\Table(name="appointment")
 * @ORM\Entity(repositoryClass="EntretienBundle\Repository\AppointmentRepository")
 */
class Appointment
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
     * @ORM\Column(name="prestation", type="string", length=255)
     */
    private $prestation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="quand", type="datetime")
     */
    private $quand;

    /**
     * @return \DateTime
     */
    public function getQuand()
    {
        return $this->quand;
    }

    /**
     * @param \DateTime $quand
     */
    public function setQuand($quand)
    {
        $this->quand = $quand;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="state", type="integer")
     */
    private $state = '0';

    /**
     * @var \AppBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @return \AppBundle\Entity\FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \AppBundle\Entity\FosUser $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
    /**
     * @return string
     */
    public function getPrestation()
    {
        return $this->prestation;
    }

    /**
     * @param string $prestation
     */
    public function setPrestation($prestation)
    {
        $this->prestation = $prestation;
        if ($prestation) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->date = new \DateTime('now');
        }
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
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     */
    public function setState($state)
    {
        $this->state = $state;
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
}

