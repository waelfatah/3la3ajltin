<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservationE
 *
 * @ORM\Table(name="reservation_e", indexes={@ORM\Index(name="fk_id_evenement", columns={"id_evenement"})})
 * @ORM\Entity
 */
class ReservationE
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_reservationE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReservatione;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reservationE", type="date", nullable=false)
     */
    private $dateReservatione;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_reservationE", type="integer", nullable=false)
     */
    private $nbrReservatione;

    /**
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evenement", referencedColumnName="id_evenement")
     * })
     */
    private $idEvenement;


}

