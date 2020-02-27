<?php
	// src/AppBundle/Entity/User.php

	namespace AppBundle\Entity;
    use Doctrine\Common\Collections\ArrayCollection;
    use Symfony\Component\Validator\Constraints as Assert;
	use FOS\MessageBundle\Model\ParticipantInterface;
    use FOS\UserBundle\Model\User as BaseUser;
	use Doctrine\ORM\Mapping as ORM;
    use Mgilet\NotificationBundle\NotifiableInterface;
    use Mgilet\NotificationBundle\Annotation\Notifiable;
    use Vich\UploaderBundle\Mapping\Annotation as Vich;
    use Symfony\Component\HttpFoundation\File\File;
	/**
	 * @ORM\Entity
	 * @ORM\Table(name="fos_user")
     * @Vich\Uploadable
     * @Notifiable(name="my_entity")
	 */
	class FosUser extends BaseUser implements ParticipantInterface,NotifiableInterface
	{

	    /**
	     * @ORM\Id
	     * @ORM\Column(type="integer")
	     * @ORM\GeneratedValue(strategy="AUTO")
	     */
	    protected $id;

        /**
         * @ORM\Column(type="string",length=255)
         */
        private $nom;
        /**
         * @ORM\Column(type="string",length=255)
         */
        private $prenom;

        /**
         * @return mixed
         */
        public function getNom()
        {
            return $this->nom;
        }

        /**
         * @param mixed $nom
         */
        public function setNom($nom)
        {
            $this->nom = $nom;
        }

        /**
         * @return mixed
         */
        public function getPrenom()
        {
            return $this->prenom;
        }

        /**
         * @param mixed $prenom
         */
        public function setPrenom($prenom)
        {
            $this->prenom = $prenom;
        }

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
         * @ORM\Column(type="string", length=255)
         * @var string
         */
        private $image;

        /**
         * @Vich\UploadableField(mapping="profile", fileNameProperty="image")
         * @var File
         */
        private $imageFile;

        /**
         * @ORM\Column(type="datetime",nullable=true)
         * @var \DateTime
         */
        private $updatedAt;
        /**
         *
         * @ORM\OneToMany(targetEntity="AppBundle\Entity\CommentaireArticle",mappedBy="fos_user")
         */
        private $commentaires;


        /**
         * @return ArrayCollection
         */
        public function getCommentaires()
        {
            return $this->commentaires;
        }

        /**
         * @param ArrayCollection $commentaires
         */
        public function setCommentaires($commentaires)
        {
            $this->commentaires = $commentaires;
        }
	    public function __construct()
	    {
	        parent::__construct();
	        // your own logic
	    }
	}
