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
 * @UniqueEntity("email")
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 */
class User implements UserInterface{
	
	/**
	 * @var integer
	 * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     * @ORM\Column(name="first_name", type="string", length=100)
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(name="last_name", type="string", length=100)
     */
    private $lastName;

    /**
     * @var string
     * @ORM\Column(name="username", type="string", length=100)
     */
    private $username;
    
    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;
    
    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=100, unique=true)
     */
    private $email;
    
    /**
     * @var string
     * @ORM\Column(name="mobile", type="string", length=100, nullable = true)
     */
    private $mobile;

    /**
     * @var string
     * @ORM\Column(name="user_token", type="string", length=100, nullable = true)
     */
    private $userToken;
   
    /**
     * @var integer
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;
    
    /**
     * @var integer
     * @ORM\Column(name="type", type="smallint")
     */
    private $type;
    
    /**
     * @var integer
     * @ORM\Column(name="gender", type="smallint", nullable = true)
     */
    private $gender;

    /**
     * @var \DateTime
     * @ORM\Column(name="dob", type="date", nullable = true)
     */
    private $dob;
    
    /**
     * @var string
     * @ORM\Column(name="profile_pic", type="text", nullable = true)
     */
    private $profilePic;

    /**
     * @var string
     * @ORM\Column(name="cover_pic", type="text", nullable = true)
     */
    private $coverPic;
    
    /**
     * @var \DateTime
     * @ORM\Column(name="created_date_time", type="datetime")
     */
    private $createdDateTime;
    
    /**
     * @var integer
     * @ORM\Column(name="created_by", type="integer", nullable = true)
     */
    private $createdBy;

    /**
     * @var \DateTime
     * @ORM\Column(name="activated_date_time", type="datetime", nullable = true)
     */
    private $activatedDateTime;
    
    /**
     * @var integer
     * @ORM\Column(name="activated_by", type="integer", nullable = true)
     */
    private $activatedBy;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_date_time", type="datetime")
     */
    private $updatedDateTime;
    
    /**
     * @var integer
     * @ORM\Column(name="updated_by", type="integer",nullable = true)
     */
    private $updatedBy;
    
    /**
     * @var verificationToken
     * @ORM\column(name="verification_token", type="string", length=100, nullable = true)
     */
    private $verificationToken;
	
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
    
    	if (is_null($this->username)) {
    		$this->username = uniqid();
    	}
    	if (is_null($this->status)) {
    		$this->status = Constants::USER_STATUS_PENDING;
    	}
    	if (is_null($this->type)) {
    		$this->type = Constants::USER_TYPE_USER;
    	}

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
     * Set firstName
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set userToken
     *
     * @param string $userToken
     *
     * @return User
     */
    public function setUserToken($userToken)
    {
        $this->userToken = $userToken;

        return $this;
    }

    /**
     * Get userToken
     *
     * @return string
     */
    public function getUserToken()
    {
        return $this->userToken;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return User
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
     * Set type
     *
     * @param integer $type
     *
     * @return User
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
     * Set gender
     *
     * @param integer $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     *
     * @return User
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set profilePic
     *
     * @param string $profilePic
     *
     * @return User
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
     * Set coverPic
     *
     * @param string $coverPic
     *
     * @return User
     */
    public function setCoverPic($coverPic)
    {
        $this->coverPic = $coverPic;

        return $this;
    }

    /**
     * Get coverPic
     *
     * @return string
     */
    public function getCoverPic()
    {
        return $this->coverPic;
    }

    /**
     * Set createdDateTime
     *
     * @param \DateTime $createdDateTime
     *
     * @return User
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
     * Set createdBy
     *
     * @param  $createdBy
     *
     * @return User
     */
    public function setCreatedBy( $createdBy)
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
     * Set activatedDateTime
     *
     * @param \DateTime $activatedDateTime
     *
     * @return User
     */
    public function setActivatedDateTime($activatedDateTime)
    {
        $this->activatedDateTime = $activatedDateTime;

        return $this;
    }

    /**
     * Get activatedDateTime
     *
     * @return \DateTime
     */
    public function getActivatedDateTime()
    {
        return $this->activatedDateTime;
    }

    /**
     * Set activatedBy
     *
     * @param  $activatedBy
     *
     * @return User
     */
    public function setActivatedBy( $activatedBy)
    {
        $this->activatedBy = $activatedBy;

        return $this;
    }

    /**
     * Get activatedBy
     *
     * @return 
     */
    public function getActivatedBy()
    {
        return $this->activatedBy;
    }

    /**
     * Set updatedDateTime
     *
     * @param \DateTime $updatedDateTime
     *
     * @return User
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
     * @return User
     */
    public function setUpdatedBy( $updatedBy)
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

    /**
     * Set verificationToken
     *
     * @param string $verificationToken
     *
     * @return User
     */
    public function setVerificationToken($verificationToken)
    {
        $this->verificationToken = $verificationToken;

        return $this;
    }

    /**
     * Get verificationToken
     *
     * @return string
     */
    public function getVerificationToken()
    {
        return $this->verificationToken;
    }
    
    public function getSalt()
    {
    	// you *may* need a real salt depending on your encoder
    	// see section on salt below
    	return '';
    }
    
    public function getRoles()
    {
    	return array('ROLE_USER');
    }
    
    public function eraseCredentials()
    {
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
}
