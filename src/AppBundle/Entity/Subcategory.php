<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @author Shruthi
 * @ORM\Entity
 * @ORM\Table(name="subcategory")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubcategoryRepository")
 */
class Subcategory{
	
	/**
	 * @var integer
	 * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;
    
    /**
     * @var string
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
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
     * @var integer
     * @ORM\Column(name="category_id", type="integer")
     */
    private $categoryId;
    
    /**
     * @var integer
     * @ORM\Column(name="created_by", type="integer")
     */
    private $createdBy;
    
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
     * @return 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Subcategory
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
     * Set description
     *
     * @param string $description
     *
     * @return Subcategory
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Subcategory
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
     * @return Subcategory
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
     * Set categoryId
     *
     * @param  $categoryId
     *
     * @return Subcategory
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
     * Set createdBy
     *
     * @param  $createdBy
     *
     * @return Subcategory
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
     * Set updatedDateTime
     *
     * @param \DateTime $updatedDateTime
     *
     * @return Subcategory
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
     * @return Subcategory
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
}
