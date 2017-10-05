<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Requirements
 *
 * @ORM\Table(name="requirements")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RequirementsRepository")
 */
class Requirements
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_date", type="datetime")
     */
    private $postDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime")
     */
    private $startDate;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_name", type="string", length=255)
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="full_description", type="text")
     */
    private $fullDescription;

    /**
     * @var float
     *
     * @ORM\Column(name="rate", type="float")
     */
    private $rate;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_of_month", type="integer")
     */
    private $nbOfMonth;

    /**
     * @var int
     *
     * @ORM\Column(name="day_by_week", type="integer")
     */
    private $dayByWeek;

    /**
     * @var string
     *
     * @ORM\Column(name="share_to", type="string", length=255, nullable=true)
     */
    private $shareTo;

    /**
     * @var Commercials
     *
     * @ORM\ManyToOne(targetEntity="Commercials")
     */
    private $commercial;

    /**
     * @var Commercials
     *
     * @ORM\ManyToOne(targetEntity="Status")
     */
    private $status;

    /**
     * @var Commercials
     *
     * @ORM\ManyToMany(targetEntity="KeySuccessFactors")
     */
    private $keySuccessFactorsList;

    /**
     * @var Commercials
     *
     * @ORM\ManyToMany(targetEntity="Consultants")
     */
    private $consultantsList;

    /**
     * @var Commercials
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     */
    private $customer;

    /**
     * @var Commercials
     *
     * @ORM\ManyToOne(targetEntity="Files")
     */
    private $file;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set postDate
     *
     * @param \DateTime $postDate
     *
     * @return Requirements
     */
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;

        return $this;
    }

    /**
     * Get postDate
     *
     * @return \DateTime
     */
    public function getPostDate()
    {
        return $this->postDate->format("Y-m-d H:i:s");
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Requirements
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate->format("Y-m-d H:i:s");
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Requirements
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set rate
     *
     * @param float $rate
     *
     * @return Requirements
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set nbOfMonth
     *
     * @param integer $nbOfMonth
     *
     * @return Requirements
     */
    public function setNbOfMonth($nbOfMonth)
    {
        $this->nbOfMonth = $nbOfMonth;

        return $this;
    }

    /**
     * Get nbOfMonth
     *
     * @return integer
     */
    public function getNbOfMonth()
    {
        return $this->nbOfMonth;
    }

    /**
     * Set dayByWeek
     *
     * @param integer $dayByWeek
     *
     * @return Requirements
     */
    public function setDayByWeek($dayByWeek)
    {
        $this->dayByWeek = $dayByWeek;

        return $this;
    }

    /**
     * Get dayByWeek
     *
     * @return integer
     */
    public function getDayByWeek()
    {
        return $this->dayByWeek;
    }

    /**
     * Set commercial
     *
     * @param \AppBundle\Entity\Commercials $commercial
     *
     * @return Requirements
     */
    public function setCommercial(\AppBundle\Entity\Commercials $commercial = null)
    {
        $this->commercial = $commercial;

        return $this;
    }

    /**
     * Get commercial
     *
     * @return \AppBundle\Entity\Commercials
     */
    public function getCommercial()
    {
        return $this->commercial;
    }

    /**
     * Set customer
     *
     * @param \AppBundle\Entity\Customers $customer
     *
     * @return Requirements
     */
    public function setCustomer(\AppBundle\Entity\Customers $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \AppBundle\Entity\Customers
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set file
     *
     * @param \AppBundle\Entity\Files $file
     *
     * @return Requirements
     */
    public function setFile(\AppBundle\Entity\Files $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \AppBundle\Entity\Files
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->keySuccessFactorsList = new \Doctrine\Common\Collections\ArrayCollection();
        $this->consultantsList = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     *
     * @return Requirements
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;

        return $this;
    }

    /**
     * Get contactName
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Requirements
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
     * Set fullDescription
     *
     * @param string $fullDescription
     *
     * @return Requirements
     */
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    /**
     * Get fullDescription
     *
     * @return string
     */
    public function getFullDescription()
    {
        return $this->fullDescription;
    }

    /**
     * Set shareTo
     *
     * @param string $shareTo
     *
     * @return Requirements
     */
    public function setShareTo($shareTo)
    {
        $this->shareTo = $shareTo;

        return $this;
    }

    /**
     * Get shareTo
     *
     * @return string
     */
    public function getShareTo()
    {
        return $this->shareTo;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return Requirements
     */
    public function setStatus(\AppBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add keySuccessFactorsList
     *
     * @param \AppBundle\Entity\KeySuccessFactors $keySuccessFactorsList
     *
     * @return Requirements
     */
    public function addKeySuccessFactorsList(\AppBundle\Entity\KeySuccessFactors $keySuccessFactorsList)
    {
        $this->keySuccessFactorsList[] = $keySuccessFactorsList;

        return $this;
    }

    /**
     * Remove keySuccessFactorsList
     *
     * @param \AppBundle\Entity\KeySuccessFactors $keySuccessFactorsList
     */
    public function removeKeySuccessFactorsList(\AppBundle\Entity\KeySuccessFactors $keySuccessFactorsList)
    {
        $this->keySuccessFactorsList->removeElement($keySuccessFactorsList);
    }

    /**
     * Get keySuccessFactorsList
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeySuccessFactorsList()
    {
        return $this->keySuccessFactorsList;
    }

    /**
     * Add consultantsList
     *
     * @param \AppBundle\Entity\Consultants $consultantsList
     *
     * @return Requirements
     */
    public function addConsultantsList(\AppBundle\Entity\Consultants $consultantsList)
    {
        $this->consultantsList[] = $consultantsList;

        return $this;
    }

    /**
     * Remove consultantsList
     *
     * @param \AppBundle\Entity\Consultants $consultantsList
     */
    public function removeConsultantsList(\AppBundle\Entity\Consultants $consultantsList)
    {
        $this->consultantsList->removeElement($consultantsList);
    }

    /**
     * Get consultantsList
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConsultantsList()
    {
        return $this->consultantsList;
    }
}
