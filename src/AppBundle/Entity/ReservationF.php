<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservationF
 *
 * @ORM\Table(name="reservation_f", indexes={@ORM\Index(name="fk_id_formation", columns={"id_formation"})})
 * @ORM\Entity
 */
class ReservationF
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reservationF", type="date", nullable=false)
     */
    private $dateReservationf;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_reservationF", type="integer", nullable=false)
     */
    private $nbrReservationf;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_reservationF", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReservationf;

    /**
     * @var \Formation
     *
     * @ORM\ManyToOne(targetEntity="Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_formation", referencedColumnName="id_formation")
     * })
     */
    private $idFormation;


}

