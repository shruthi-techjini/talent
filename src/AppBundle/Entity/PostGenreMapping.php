<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @author Shruhti
 * @ORM\Entity
 * @ORM\Table(name="post_genre_mapping")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostGenreMappingRepository")
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
}
