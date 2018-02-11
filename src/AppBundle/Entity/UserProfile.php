<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use AppBundle\Constants\Constants;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * 
 * @author Shruthi
 * @ORM\Entity
 * @ORM\Table(name="user_profile")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserProfileRepository")
 * @ORM\HasLifecycleCallbacks
 */
class UserProfile{
	
	/**
	 * @var integer
	 * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="userId", type="string", length=100)
     */
    private $userId;
    
    /**
     * @var integer
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;
    
    /**
     * @var string
     * @ORM\Column(name="profile_pic", type="text", nullable = true)
     */
    private $profilePic;
    
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
   
	
    private $imageFile;
    
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
    }
    
    /**
     *
     * Action to be taken before update
     * @ORM\PreUpdate
     *
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
     * Set userId
     *
     * @param string $userId
     *
     * @return UserProfile
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return UserProfile
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
     * Set profilePic
     *
     * @param string $profilePic
     *
     * @return UserProfile
     */
    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;

        return $this;
    }

    /**
     * Get profilePic
     *
     * @return string
     */
    public function getProfilePic()
    {
        return $this->profilePic;
    }

    /**
     * Set createdDateTime
     *
     * @param \DateTime $createdDateTime
     *
     * @return UserProfile
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
     * @return UserProfile
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
    public function setImageFile($imageFile)
    {
    	$this->imageFile = $imageFile;
    }
    
    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getImageFile()
    {
    	return $this->imageFile;
    }
    
}
