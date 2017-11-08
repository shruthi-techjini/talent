<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @author Shruhti
 * @ORM\Entity
 * @ORM\Table(name="likes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LikesRepository")
 */
class Likes{
	
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
     * @var integer
     * @ORM\Column(name="post_id", type="integer")
     */
    private $postId;
    
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
     * @return Likes
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
     * Set postId
     *
     * @param  $postId
     *
     * @return Likes
     */
    public function setPostId( $postId)
    {
        $this->postId = $postId;

        return $this;
    }

    /**
     * Get postId
     *
     * @return 
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * Set createdDateTime
     *
     * @param \DateTime $createdDateTime
     *
     * @return Likes
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
