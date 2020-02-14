<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversation
 *
 * @ORM\Table(name="conversation", indexes={@ORM\Index(name="conversation_user_one", columns={"id_user_one"}), @ORM\Index(name="conversation_user_two", columns={"id_user_two"})})
 * @ORM\Entity
 */
class Conversation
{
    /**
     * @return int
     */
    public function getIdConversation()
    {
        return $this->idConversation;
    }

    /**
     * @param int $idConversation
     */
    public function setIdConversation($idConversation)
    {
        $this->idConversation = $idConversation;
    }

    /**
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param int $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return \FosUser
     */
    public function getIdUserOne()
    {
        return $this->idUserOne;
    }

    /**
     * @param \FosUser $idUserOne
     */
    public function setIdUserOne($idUserOne)
    {
        $this->idUserOne = $idUserOne;
    }

    /**
     * @return \FosUser
     */
    public function getIdUserTwo()
    {
        return $this->idUserTwo;
    }

    /**
     * @param \FosUser $idUserTwo
     */
    public function setIdUserTwo($idUserTwo)
    {
        $this->idUserTwo = $idUserTwo;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id_conversation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConversation;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="date", nullable=false)
     */
    private $time;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user_one", referencedColumnName="id")
     * })
     */
    private $idUserOne;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user_two", referencedColumnName="id")
     * })
     */
    private $idUserTwo;


}

