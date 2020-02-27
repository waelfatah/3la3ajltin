<?php

namespace AppBundle\Entity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;


/**
 * Article
 *
 * @ORM\Table(name="article")
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\ArticleRepository")
 *
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idArticle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idarticle;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=200, nullable=false)
     */
    private $titre;


    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=200, nullable=false)
     */
    private $description;




    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=200, nullable=false)
     */
    private $etat;
    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
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
     * @return int
     */
    public function getIdarticle()
    {
        return $this->idarticle;
    }

    /**
     * @param int $idarticle
     */
    public function setIdarticle($idarticle)
    {
        $this->idarticle = $idarticle;
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="image_article", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

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

    // ...

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

    public function getImageFile()
    {
        return $this->imageFile;
    }

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





}

