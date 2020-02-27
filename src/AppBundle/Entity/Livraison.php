<?php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity
 */
class Livraison
{
    /**
     * @return int
     */
    public function getIdL()
    {
        return $this->idL;
    }

    /**
     * @param int $idL
     */
    public function setIdL($idL)
    {
        $this->idL = $idL;
    }

    /**
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param string $localisation
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }

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

    /**
     * @return int
     */
    public function getIdLivreur()
    {
        return $this->idLivreur;
    }

    /**
     * @param int $idLivreur
     */
    public function setIdLivreur($idLivreur)
    {
        $this->idLivreur = $idLivreur;
    }

    /**
     * @return int
     */
    public function getIdVelo()
    {
        return $this->idVelo;
    }

    /**
     * @param int $idVelo
     */
    public function setIdVelo($idVelo)
    {
        $this->idVelo = $idVelo;
    }

    /**
     * @return \Commande
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param \Commande $idCommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }


    /**
     * @var integer
     *
     * @ORM\Column(name="Id_l", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idL;

    /**
     * @var string
     *
     * @ORM\Column(name="Localisation", type="string", length=255, nullable=false)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_livreur", type="integer", nullable=false)
     */
    private $idLivreur;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_velo", type="integer", nullable=false)
     */
    private $idVelo;

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
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commande", referencedColumnName="id_commande")
     * })
     */
    private $idCommande;

    /**
     * @ORM\Column(type="string",nullable=true)
     *
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image;


}
