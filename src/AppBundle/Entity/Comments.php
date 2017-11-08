<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @author Shruhti
 * @ORM\Entity
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentsRepository")
 */
class Comments{
	
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
     * @var string
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;
    
    /**
     * @var integer
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;
    
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
     * @var integer
     * @ORM\Column(name="updated_by", type="integer")
     */
    private $updatedBy;
    
    
	

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
     * @return Comments
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
     * Set postId
     *
     * @param  $postId
     *
     * @return Comments
     */
    public function setPostId($postId)
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Comments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Comments
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
     * Set createdDateTime
     *
     * @param \DateTime $createdDateTime
     *
     * @return Comments
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
     * @return Comments
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

    /**
     * Set updatedBy
     *
     * @param  $updatedBy
     *
     * @return Comments
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}
