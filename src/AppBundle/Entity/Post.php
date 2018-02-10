<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Constants\Constants;

/**
 * 
 * @author Shruthi
 * @ORM\Entity
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * 
 * @ORM\HasLifecycleCallbacks
 */
class Post{
	
	/**
	 * @var integer
	 * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;
    
    /**
     * @var string
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var integer
     * @ORM\Column(name="category_id", type="integer")
     */
    private $categoryId;

    /**
     * @var integer
     * @ORM\Column(name="sub_category_id", type="integer")
     */
    private $subCategoryId;

    /**
     * @var integer
     * @ORM\Column(name="language", type="integer")
     */
    private $language;
    
    /**
     * @var integer
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;
    
    /**
     * @var string
     * @ORM\Column(name="image", type="text", nullable = true)
     */
    private $image;
    
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
     */
    private $file;

    /**
     *
     * Action to be taken before persist
     * @ORM\PrePersist
     *
     */
    public function prePersist()
    {
    	$this->createdDateTime = new \DateTime();
    	$this->updatedDateTime = new \DateTime();
    	if (is_null($this->status)) {
    		$this->status = Constants::POST_STATUS_PENDING;
    	}
    
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
     * @return 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set categoryId
     *
     * @param  $categoryId
     *
     * @return Post
     */
    public function setCategoryId( $categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set subCategoryId
     *
     * @param  $subCategoryId
     *
     * @return Post
     */
    public function setSubCategoryId( $subCategoryId)
    {
        $this->subCategoryId = $subCategoryId;

        return $this;
    }

    /**
     * Get subCategoryId
     *
     * @return 
     */
    public function getSubCategoryId()
    {
        return $this->subCategoryId;
    }

    /**
     * Set userId
     *
     * @param  $userId
     *
     * @return Post
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
     * Set image
     *
     * @param string $image
     *
     * @return Post
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Post
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
     * @return Post
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
     * @return Post
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
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile($file)
    {
    	$this->file = $file;
    }
    
    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
    	return $this->file;
    }

    /**
     * Set language
     *
     * @param integer $language
     *
     * @return Post
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return integer
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
