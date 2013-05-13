<?php
namespace Atc\Bundle\HouseShareBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DateReg
 *
 * @ORM\Table()
 * @ORM\Entity
 */

class DateReg  
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var mixed Unique identifier of this event (optional).
     */
    protected $id;
    
    /**
     * @var string Title/label of the calendar event.
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;
    
    /**
     * @var string URL Relative to current path.
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    protected $url;
    
    /**
     * @var string HTML color code for the bg color of the event label.
     * @ORM\Column(name="bg_color", type="string", length=8 , nullable=true)
     */
    protected $bgColor;
    
    /**
     * @var string HTML color code for the foregorund color of the event label.
     * @ORM\Column(name="fg_color", type="string", length=8 , nullable=true)
     */
    protected $fgColor;
    
    /**
     * @var string css class for the event label
     * @ORM\Column(name="css_class", type="string", length=255, nullable=true)
     */
    protected $cssClass;
    
    /**
     * @var \DateTime DateTime object of the event start date/time.
     * @ORM\Column(name="start_date", type="datetime")
     */
    protected $startDatetime;
    
    /**
     * @var \DateTime DateTime object of the event end date/time.
     * @ORM\Column(name="end_date", type="datetime")
     */
    protected $endDatetime;
    
    /**
     * @var boolean Is this an all day event?
     * @ORM\Column(name="all_day", type="boolean" , nullable=true)
     */
    protected $allDay = false;
    
    /**
     * @var string
     *
		 * @ORM\ManyToOne(targetEntity="User")
		 * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="nb_person", type="integer" , nullable=true)
     */
     private $nbPerson;

//    public function __construct($title, \DateTime $startDatetime, \DateTime $endDatetime = null, $allDay = false)
    public function __construct()
    {
       // $this->title = $title;
       // $this->startDatetime = $startDatetime;
       // $this->setAllDay($allDay);
        
       // if ($endDatetime === null && $this->allDay === false) {
       //     throw new \InvalidArgumentException("Must specify an event End DateTime if not an all day event.");
       // }
        
       // $this->endDatetime = $endDatetime;
    }
    /**
     * Convert calendar event details to an array
     * 
     * @return array $event 
     */
    public function toArray()
    {
        $event = array();
        
        if ($this->id !== null) {
            $event['id'] = $this->id;
        }
        
        $event['title'] = $this->title;
        $event['start'] = $this->startDatetime->format("Y-m-d\TH:i:sP");
        
        if ($this->url !== null) {
            $event['url'] = $this->url;
        }
        
        if ($this->bgColor !== null) {
            $event['backgroundColor'] = $this->bgColor;
            $event['borderColor'] = $this->bgColor;
        }
        
        if ($this->fgColor !== null) {
            $event['textColor'] = $this->fgColor;
        }
        
        if ($this->cssClass !== null) {
            $event['cssClass'] = $this->cssClass;
        }

        if ($this->endDatetime !== null) {
            $event['end'] = $this->endDatetime->format("Y-m-d\TH:i:sP");
        }
        
        $event['allDay'] = $this->allDay;
        
        return $event;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setTitle($title) 
    {
        $this->title = $title;
    }
    
    public function setUrl($url)
    {
        $this->url = $url;
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    
    public function setBgColor($color)
    {
        $this->bgColor = $color;
    }
    
    public function getBgColor()
    {
        return $this->bgColor;
    }
    
    public function setFgColor($color)
    {
        $this->fgColor = $color;
    }
    
    public function getFgColor()
    {
        return $this->fgColor;
    }
    
    public function setCssClass($class)
    {
        $this->cssClass = $class;
    }
    
    public function getCssClass()
    {
        return $this->cssClass;
    }
    
    public function setStartDatetime(\DateTime $start)
    {
        $this->startDatetime = $start;
    }
    
    public function getStartDatetime()
    {
        return $this->startDatetime;
    }
    
    public function setEndDatetime(\DateTime $end)
    {
        $this->endDatetime = $end;
    }
    
    public function getEndDatetime()
    {
        return $this->endDatetime;
    }
    
    public function setAllDay($allDay = false)
    {
        $this->allDay = (boolean) $allDay;
    }
    
    public function getAllDay()
    {
        return $this->allDay;
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
     * Set author
     *
     * @param \Atc\Bundle\HouseShareBundle\Entity\User $author
     * @return DateReg
     */
    public function setAuthor(\Atc\Bundle\HouseShareBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Atc\Bundle\HouseShareBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set nbPerson
     *
     * @param integer $nbPerson
     * @return DateReg
     */
    public function setNbPerson($nbPerson)
    {
        $this->nbPerson = $nbPerson;
    
        return $this;
    }

    /**
     * Get nbPerson
     *
     * @return integer 
     */
    public function getNbPerson()
    {
        return $this->nbPerson;
    }
}