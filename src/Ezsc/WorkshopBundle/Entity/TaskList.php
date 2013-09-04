<?php

namespace Ezsc\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TaskList
 */
class TaskList
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;
    
    private $users;
    
    private $tasks;

    /**
     * @var \DateTime
     */
    private $dateCreatedAt;
    
    public function __construct()
    {
        $this->dateCreatedAt = new \DateTime("now");
        $this->users = new ArrayCollection();
        $this->tasks = new ArrayCollection();
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
     * @return TaskList
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
     * @return TaskList
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
    
    public function setUsers(ArrayCollection $users) 
    {
        $this->users = $users;
        
        return $this;
    }
    
    public function getUsers()
    {
        return $this->users;
    }
    
    public function __toString() {
        return $this->name;
    }
    
    public function setTasks(ArrayCollection $tasks)
    {
        $this->tasks = $tasks;
        
        return $this;
    }
    
    public function getTasks()
    {
        return $this->tasks;
    }
}
