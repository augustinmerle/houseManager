<?php

namespace Atc\Bundle\HouseShareBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="family", type="string", length=255)
     * 
     */
     private $family;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set family
     *
     * @param string $family
     * @return User
     */
    public function setFamily($family)
    {
        $this->family = $family;
    
        return $this;
    }

    /**
     * Get family
     *
     * @return string 
     */
    public function getFamily()
    {
        return $this->family;
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
}