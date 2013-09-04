<?php

namespace Ezsc\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 */
class Task
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $dateCreatedAt;

    /**
     * @var \DateTime
     */
    private $dateDeadlineAt;
    
    private $taskList;

    /**
     * @var integer
     */
    private $priority;

    public function __construct()
    {
        $this->dateCreatedAt = new \DateTime("now");
        $this->dateDeadlineAt = new \DateTime("now");
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
     * Set name
     *
     * @param string $name
     * @return Task
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
     * Set dateCreatedAt
     *
     * @param \DateTime $dateCreatedAt
     * @return Task
     */
    public function setDateCreatedAt($dateCreatedAt)
    {
        $this->dateCreatedAt = $dateCreatedAt;
    
        return $this;
    }

    /**
     * Get dateCreatedAt
     *
     * @return \DateTime 
     */
    public function getDateCreatedAt()
    {
        return $this->dateCreatedAt;
    }

    /**
     * Set dateDeadlineAt
     *
     * @param \DateTime $dateDeadlineAt
     * @return Task
     */
    public function setDateDeadlineAt($dateDeadlineAt)
    {
        $this->dateDeadlineAt = $dateDeadlineAt;
    
        return $this;
    }

    /**
     * Get dateDeadlineAt
     *
     * @return \DateTime 
     */
    public function getDateDeadlineAt()
    {
        return $this->dateDeadlineAt;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     * @return Task
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    
        return $this;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getPriority()
    {
        return $this->priority;
    }
    
    public function setTaskList(TaskList $taskList)
    {
        $this->taskList = $taskList;
        
        return $this;
    }
    
    public function getTaskList()
    {
        return $this->taskList;
    }
    
}
