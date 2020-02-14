<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConversationReply
 *
 * @ORM\Table(name="conversation_reply", indexes={@ORM\Index(name="reply_user", columns={"id_user"}), @ORM\Index(name="reply_conver", columns={"id_conversation"})})
 * @ORM\Entity
 */
class ConversationReply
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_reply", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReply;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=true)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="date", nullable=false)
     */
    private $time;

    /**
     * @var \Conversation
     *
     * @ORM\ManyToOne(targetEntity="Conversation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_conversation", referencedColumnName="id_conversation")
     * })
     */
    private $idConversation;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @return int
     */
    public function getIdReply()
    {
        return $this->idReply;
    }

    /**
     * @param int $idReply
     */
    public function setIdReply($idReply)
    {
        $this->idReply = $idReply;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
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
     * @return \Conversation
     */
    public function getIdConversation()
    {
        return $this->idConversation;
    }

    /**
     * @param \Conversation $idConversation
     */
    public function setIdConversation($idConversation)
    {
        $this->idConversation = $idConversation;
    }

    /**
     * @return \FosUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \FosUser $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }


}

