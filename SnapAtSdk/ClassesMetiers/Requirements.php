<?php

namespace SnapAtSdk\ClassesMetiers;

/**
 * Requirements
 *
 * @ORM\Table(name="requirements")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RequirementsRepository")
 */
class Requirements implements ClasseMetierInterface
{

    public function serializeProperties()
    {
        $ksf2 = null;
        $ksf3 = null;
        $cns2 = null;
        $cns3 = null;
        $cns4 = null;
        $cns5 = null;
        if (isset($this->keySuccessFactorsList[2]))
            $ksf2 = $this->keySuccessFactorsList[2]->getText();
        if (isset($this->keySuccessFactorsList[3]))
            $ksf3 = $this->keySuccessFactorsList[2]->getText();
        if (isset($this->consultantsList[2]))
            $cns2 = $this->consultantsList[2]->getName();
        if (isset($this->consultantsList[3]))
            $cns3 = $this->consultantsList[3]->getName();
        if (isset($this->consultantsList[4]))
            $cns4 = $this->consultantsList[4]->getName();
        if (isset($this->consultantsList[5]))
            $cns5 = $this->consultantsList[5]->getName();
        return [
            "keySuccessFactor1" => $this->keySuccessFactorsList[1]->getText(),
            "keySuccessFactor2" => $ksf2,
            "keySuccessFactor3" => $ksf3,
            "consultant1" => $this->consultantsList[1]->getName(),
            "consultant2" => $cns2,
            "consultant3" => $cns3,
            "consultant4" => $cns4,
            "consultant5" => $cns5,
            "status" => $this->status->getId(),
            "commercial" => $this->commercial->getId(),
            "customer" => $this->customer->getId(),
            "shareTo" => $this->shareTo,
            "startDate" => $this->startDate,
            "title" => $this->title,
            "fullDescription" => $this->fullDescription,
            "contactName" => $this->contactName,
            "nbOfMonth" => $this->nbOfMonth,
            "dayByWeek" => $this->dayByWeek,
            "location" => $this->location,
            "rate" => $this->rate
        ];
    }

    public function iterateProperties()
    {
        $array_prop_valeurs = array();
        foreach($this as $key => $value) {
            $array_prop_valeurs[$key] = $value;
        }
        return $array_prop_valeurs;
    }

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


    public function __construct()
    {
        $this->commercial = new Commercials();
        $this->customer = new Customers();
        $this->status = new Status();
        $this->file = new Files();
        $this->keySuccessFactorsList = array(new KeySuccessFactors());
        $this->consultantsList = array(new Consultants());
    }

    /**
     * Set id
     *
     * @param int $id
     *
     * @return Status
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
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
        return $this->postDate;
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
        return $this->startDate;
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
    public function setCommercial(Commercials $commercial = null)
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
    public function setCustomer(Customers $customer = null)
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
    public function setFile(Files $file = null)
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
    public function setStatus(Status $status = null)
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
    public function addKeySuccessFactorsList(KeySuccessFactors $keySuccessFactorsList)
    {
        $this->keySuccessFactorsList[] = $keySuccessFactorsList;

        return $this;
    }

    /**
     * Remove keySuccessFactorsList
     *
     * @param \AppBundle\Entity\KeySuccessFactors $keySuccessFactorsList
     */
    public function removeKeySuccessFactorsList(KeySuccessFactors $keySuccessFactorsList)
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
    public function addConsultantsList(Consultants $consultantsList)
    {
        $this->consultantsList[] = $consultantsList;

        return $this;
    }

    /**
     * Remove consultantsList
     *
     * @param \AppBundle\Entity\Consultants $consultantsList
     */
    public function removeConsultantsList(Consultants $consultantsList)
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
