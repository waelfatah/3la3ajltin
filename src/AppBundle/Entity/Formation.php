<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="FormationBundle\Repository\FormationRepository")
 * @Vich\Uploadable
 */
class Formation
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
     * @ORM\Column(name="titleF", type="string", length=255)
     */
    private $titleF;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutFormation", type="datetime")
     */
    private $dateDebutFormation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinFormation", type="datetime")
     */
    private $dateFinFormation;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrDePlaceF", type="integer")
     */
    private $nbrDePlaceF;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuFormation", type="string", length=255)
     */
    private $lieuFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionFormation", type="string", length=1000)
     */
    private $descriptionFormation;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

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
     * @return string
     */


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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titleF
     *
     * @param string $titleF
     *
     * @return Formation
     */
    public function setTitleF($titleF)
    {
        $this->titleF = $titleF;

        return $this;
    }

    /**
     * Get titleF
     *
     * @return string
     */
    public function getTitleF()
    {
        return $this->titleF;
    }

    /**
     * Set dateDebutFormation
     *
     * @param \DateTime $dateDebutFormation
     *
     * @return Formation
     */
    public function setDateDebutFormation($dateDebutFormation)
    {
        $this->dateDebutFormation = $dateDebutFormation;

        return $this;
    }

    /**
     * Get dateDebutFormation
     *
     * @return \DateTime
     */
    public function getDateDebutFormation()
    {
        return $this->dateDebutFormation;
    }

    /**
     * Set dateFinFormation
     *
     * @param \DateTime $dateFinFormation
     *
     * @return Formation
     */
    public function setDateFinFormation($dateFinFormation)
    {
        $this->dateFinFormation = $dateFinFormation;

        return $this;
    }

    /**
     * Get dateFinFormation
     *
     * @return \DateTime
     */
    public function getDateFinFormation()
    {
        return $this->dateFinFormation;
    }

    /**
     * Set nbrDePlaceF
     *
     * @param integer $nbrDePlaceF
     *
     * @return Formation
     */
    public function setNbrDePlaceF($nbrDePlaceF)
    {
        $this->nbrDePlaceF = $nbrDePlaceF;

        return $this;
    }

    /**
     * Get nbrDePlaceF
     *
     * @return int
     */
    public function getNbrDePlaceF()
    {
        return $this->nbrDePlaceF;
    }

    /**
     * Set lieuFormation
     *
     * @param string $lieuFormation
     *
     * @return Formation
     */
    public function setLieuFormation($lieuFormation)
    {
        $this->lieuFormation = $lieuFormation;

        return $this;
    }

    /**
     * Get lieuFormation
     *
     * @return string
     */
    public function getLieuFormation()
    {
        return $this->lieuFormation;
    }

    /**
     * Set descriptionFormation
     *
     * @param string $descriptionFormation
     *
     * @return Formation
     */
    public function setDescriptionFormation($descriptionFormation)
    {
        $this->descriptionFormation = $descriptionFormation;

        return $this;
    }

    /**
     * Get descriptionFormation
     *
     * @return string
     */
    public function getDescriptionFormation()
    {
        return $this->descriptionFormation;
    }



}

