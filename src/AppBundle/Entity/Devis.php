<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devis
 *
 * @ORM\Table(name="devis")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DevisRepository")
 */
class Devis
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
     * @var \AppBundle\Entity\Entretien
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Entretien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEntretien", referencedColumnName="id")
     * })
     */
    private $idEntretien;

    /**
     * @var float
     *
     * @ORM\Column(name="prixTotal", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixTotal;
    /**
     * @var float
     *
     * @ORM\Column(name="prixPieces", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixPieces;

    /**
     * @var string
     *
     * @ORM\Column(name="nomPiece", type="string", length=255)
     */
    private $nomPieces;
    /**
     * @var int
     *
     * @ORM\Column(name="quantitePieces", type="integer")
     */
    private $quantitePieces ;

    /**
     * @var \AppBundle\Entity\Pieces
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pieces")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPieces", referencedColumnName="id")
     * })
     */
    private $idPieces;
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \AppBundle\Entity\Entretien
     */
    public function getIdEntretien()
    {
        return $this->idEntretien;
    }

    /**
     * @param \AppBundle\Entity\Entretien $idEntretien
     */
    public function setIdEntretien($idEntretien)
    {
        $this->idEntretien = $idEntretien;
    }

    /**
     * @return float
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * @param float $prixTotal
     */
    public function setPrixTotal($prixTotal)
    {
        $this->prixTotal = $prixTotal;
    }

    /**
     * @return float
     */
    public function getPrixPieces()
    {
        return $this->prixPieces;
    }

    /**
     * @param float $prixPieces
     */
    public function setPrixPieces($prixPieces)
    {
        $this->prixPieces = $prixPieces;
    }

    /**
     * @return string
     */
    public function getNomPieces()
    {
        return $this->nomPieces;
    }

    /**
     * @param string $nomPieces
     */
    public function setNomPieces($nomPieces)
    {
        $this->nomPieces = $nomPieces;
    }

    /**
     * @return int
     */
    public function getQuantitePieces()
    {
        return $this->quantitePieces;
    }

    /**
     * @param int $quantitePieces
     */
    public function setQuantitePieces($quantitePieces)
    {
        $this->quantitePieces = $quantitePieces;
    }

    /**
     * @return \AppBundle\Entity\Pieces
     */
    public function getIdPieces()
    {
        return $this->idPieces;
    }

    /**
     * @param \AppBundle\Entity\Pieces $idPieces
     */
    public function setIdPieces($idPieces)
    {
        $this->idPieces = $idPieces;
    }

    /**
     * @return FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param FosUser $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }




}

