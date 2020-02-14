<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Images
 *
 * @ORM\Table(name="images", indexes={@ORM\Index(name="FK_imageProd", columns={"id_produit"})})
 * @ORM\Entity
 */
class Images
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
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     */
    private $idProduit;

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
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param int $idProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }


}

