<?php

namespace AppBundle\Entity;

use AppBundle\Entity\FosUser;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\EventRepository")
 * @Vich\Uploadable
 */
class Event
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutEvent", type="datetime")
     */
    private $dateDebutEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinEvent", type="datetime")
     */
    private $dateFinEvent;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrDePlace", type="integer")
     */
    private $nbrDePlace;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuEvent", type="string", length=255)
     */
    private $lieuEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionEvent", type="string", length=255)
     */
    private $descriptionEvent;

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }


    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="taswira", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * @var \FosUser
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id")
     *})
     */
    private $user;

    /**
     * @return \FosUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \FosUser $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
     * Set title
     *
     * @param string $title
     *
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set dateDebutEvent
     *
     * @param \DateTime $dateDebutEvent
     *
     * @return Event
     */
    public function setDateDebutEvent($dateDebutEvent)
    {
        $this->dateDebutEvent = $dateDebutEvent;

        return $this;
    }

    /**
     * Get dateDebutEvent
     *
     * @return \DateTime
     */
    public function getDateDebutEvent()
    {
        return $this->dateDebutEvent;
    }

    /**
     * Set dateFinEvent
     *
     * @param \DateTime $dateFinEvent
     *
     * @return Event
     */
    public function setDateFinEvent($dateFinEvent)
    {
        $this->dateFinEvent = $dateFinEvent;

        return $this;
    }

    /**
     * Get dateFinEvent
     *
     * @return \DateTime
     */
    public function getDateFinEvent()
    {
        return $this->dateFinEvent;
    }

    /**
     * Set nbrDePlace
     *
     * @param integer $nbrDePlace
     *
     * @return Event
     */
    public function setNbrDePlace($nbrDePlace)
    {
        $this->nbrDePlace = $nbrDePlace;

        return $this;
    }

    /**
     * Get nbrDePlace
     *
     * @return int
     */
    public function getNbrDePlace()
    {
        return $this->nbrDePlace;
    }

    /**
     * Set lieuEvent
     *
     * @param string $lieuEvent
     *
     * @return Event
     */
    public function setLieuEvent($lieuEvent)
    {
        $this->lieuEvent = $lieuEvent;

        return $this;
    }

    /**
     * Get lieuEvent
     *
     * @return string
     */
    public function getLieuEvent()
    {
        return $this->lieuEvent;
    }

    /**
     * Set descriptionEvent
     *
     * @param string $descriptionEvent
     *
     * @return Event
     */
    public function setDescriptionEvent($descriptionEvent)
    {
        $this->descriptionEvent = $descriptionEvent;

        return $this;
    }

    /**
     * Get descriptionEvent
     *
     * @return string
     */
    public function getDescriptionEvent()
    {
        return $this->descriptionEvent;
    }
}




