<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @author Shruthi
 * @ORM\Entity
 * @ORM\Table(name="subscription")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubscriptionRepository")
 */
class Subscription{
	
	/**
	 * @var integer
	 * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(name="type", type="smallint")
     */
    private $type;
    
    /**
     * @var integer
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;

    /**
     * @var integer
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;
    
    /**
     * @var integer
     * @ORM\Column(name="talent_id", type="integer")
     */
    private $talentId;
  
    /**
     * @var \DateTime
     * @ORM\Column(name="created_date_time", type="datetime")
     */
    private $createdDateTime;
    
    /**
     * @var \DateTime
     * @ORM\Column(name="updateed_date_time", type="datetime")
     */
    private $updatedDateTime;

    /**
     * Get id
     *
     * @return 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Subscription
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Subscription
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
     * Set userId
     *
     * @param  $userId
     *
     * @return Subscription
     */
    public function setUserId( $userId)
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
     * Set talentId
     *
     * @param  $talentId
     *
     * @return Subscription
     */
    public function setTalentId( $talentId)
    {
        $this->talentId = $talentId;

        return $this;
    }

    /**
     * Get talentId
     *
     * @return 
     */
    public function getTalentId()
    {
        return $this->talentId;
    }

    /**
     * Set createdDateTime
     *
     * @param \DateTime $createdDateTime
     *
     * @return Subscription
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

    /**
     * Set updatedDateTime
     *
     * @param \DateTime $updatedDateTime
     *
     * @return Subscription
     */
    public function setUpdatedDateTime($updatedDateTime)
    {
        $this->updatedDateTime = $updatedDateTime;

        return $this;
    }

    /**
     * Get updatedDateTime
     *
     * @return \DateTime
     */
    public function getUpdatedDateTime()
    {
        return $this->updatedDateTime;
    }
}
