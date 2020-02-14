<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imageoffre
 *
 * @ORM\Table(name="imageoffre", indexes={@ORM\Index(name="fk_idOffre", columns={"id_offre"})})
 * @ORM\Entity
 */
class Imageoffre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_image", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idImage;

    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_offre", referencedColumnName="id_offre")
     * })
     */
    private $idOffre;

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
     * @return \Offre
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * @param \Offre $idOffre
     */
    public function setIdOffre($idOffre)
    {
        $this->idOffre = $idOffre;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255, nullable=false)
     */
    private $imageUrl;


}

