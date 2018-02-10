<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @author Shruhti
 * @ORM\Entity
 * @ORM\Table(name="post_genre_mapping")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostGenreMappingRepository")
 * 
 * @ORM\HasLifecycleCallbacks
 */
class PostGenreMapping{
	
	/**
	 * @var integer
	 * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var integer
     * @ORM\Column(name="post_id", type="integer")
     */
    private $postId;

    /**
     * @var integer
     * @ORM\Column(name="genre_id", type="integer")
     */
    private $genreId;
    
    /**
     * @var integer
     * @ORM\Column(name="status", type="integer")
     */
    private $status;
    
    /**
     * @var \DateTime
     * @ORM\Column(name="created_date_time", type="datetime")
     */
    private $createdDateTime;
    
    /**
     * @var \DateTime
     * @ORM\Column(name="updated_date_time", type="datetime")
     */
    private $updatedDateTime;
    
    /**
    * Action to be taken before persist
    * @ORM\PrePersist
    *
    */
    public function prePersist()
    {
    	$this->updatedDateTime = new \DateTime();
    	$this->createdDateTime = new \DateTime();
    }
    
    /**
     *
     * Action to be taken before update
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
    	$this->updatedDateTime = new \DateTime();
    }

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
     * Set postId
     *
     * @param  $postId
     *
     * @return PostGenreMapping
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
     * Set genreId
     *
     * @param  $genreId
     *
     * @return PostGenreMapping
     */
    public function setGenreId( $genreId)
    {
        $this->genreId = $genreId;

        return $this;
    }

    /**
     * Get genreId
     *
     * @return 
     */
    public function getGenreId()
    {
        return $this->genreId;
    }

    /**
     * Set createdDateTime
     *
     * @param \DateTime $createdDateTime
     *
     * @return PostGenreMapping
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
     * @return Category
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
}
