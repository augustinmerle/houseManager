<?php

namespace Atc\Bundle\HouseShareBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShopList
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ShopList
{
			public function __construct()
		{
		    $this->addingDate = new \DateTime('now');
			$this->isBought = false;
		}
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="string", length=255)
     */
    private $article;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="adding_date", type="datetime")
     */
    private $addingDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_bought", type="boolean", nullable=true)
     */
    private $isBought;

    /**
     * @var string
     *
		 * @ORM\ManyToOne(targetEntity="User")
		 * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @var string
     *
		 * @ORM\ManyToOne(targetEntity="User")
		 * @ORM\JoinColumn(name="buyer_id", referencedColumnName="id")
     */
     private $buyer;


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
     * Set string
     *
     * @param string $string
     * @return ShopList
     */
    public function setString($string)
    {
        $this->string = $string;
    
        return $this;
    }

    /**
     * Get string
     *
     * @return string 
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * Set article
     *
     * @param string $article
     * @return ShopList
     */
    public function setArticle($article)
    {
        $this->article = $article;
    
        return $this;
    }

    /**
     * Get article
     *
     * @return string 
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set addingDate
     *
     * @param \DateTime $addingDate
     * @return ShopList
     */
    public function setAddingDate($addingDate)
    {
        $this->addingDate = $addingDate;
    
        return $this;
    }

    /**
     * Get addingDate
     *
     * @return \DateTime 
     */
    public function getAddingDate()
    {
        return $this->addingDate;
    }

    /**
     * Set isBought
     *
     * @param boolean $isBought
     * @return ShopList
     */
    public function setIsBought($isBought)
    {
        $this->isBought = $isBought;
    
        return $this;
    }

    /**
     * Get isBought
     *
     * @return boolean 
     */
    public function getIsBought()
    {
        return $this->isBought;
    }

    /**
     * Set author
     *
     * @param \Atc\Bundle\HouseShareBundle\Entity\User $author
     * @return ShopList
     */
    public function setAuthor(\Atc\Bundle\HouseShareBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set buyer
     *
     * @param string $buyer
     * @return ShopList
     */
    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;
    
        return $this;
    }

    /**
     * Get buyer
     *
     * @return string 
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

}