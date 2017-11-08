<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @author Shruhti
 * @ORM\Entity
 * @ORM\Table(name="genre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GenreRepository")
 */
class Genre{
	
	/**
	 * @var integer
	 * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;
    
    /**
     * @var integer
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;
    
    /**
     * @var integer
     * @ORM\Column(name="created_by", type="integer")
     */
    private $createdBy;
    
    /**
     * @var \DateTime
     * @ORM\Column(name="created_date_time", type="datetime")
     */
    private $createdDateTime;
    
	

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param  $userId
     *
     * @return Genre
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Genre
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Genre
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdBy
     *
     * @param  $createdBy
     *
     * @return Genre
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set createdDateTime
     *
     * @param \DateTime $createdDateTime
     *
     * @return Genre
     */
    public function setCreatedDateTime($createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;

        return $this;
    }

    /**
     * Get createdDateTime
     *
     * @return \DateTime
     */
    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }
}
