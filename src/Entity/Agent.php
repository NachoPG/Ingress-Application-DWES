<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentRepository::class)
 * @ORM\Table(name="agent")
 */

class Agent
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id_agent")
     * @ORM\GeneratedValue
     */
    private $idAgent;

    /**
     * @ORM\Column(type="string",length="100",name="agent_name",unique="true")
     */
    private $agentName;

    /**
     * @ORM\Column(type="string",length="50",name="`password`")
     */
    private $password;

    /**
     * @ORM\Column(type="text",length="100")
     */
    private $faction;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Stats", mappedBy="idAgent")
     */
    private $stats;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Uploads", mappedBy="agent")
     */
    private $uploads;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="StatsEvents", mappedBy="idAgent")
     */
    private $statsEvents;

    public function __construct()
    {
        $this->stats = new ArrayCollection();
        $this->uploads = new ArrayCollection();
        $this->statsEvents = new ArrayCollection();
    }


    //<-------------GETTERS - SETTERS---------------->

    /**
     * Get the value of id
     */
    public function getIdAgent()
    {
        return $this->idAgent;
    }

    /**
     * Get the value of agentName
     */
    public function getAgentName()
    {
        return $this->agentName;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of faction
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Set the value of agentName
     * @return self
     */
    public function setAgentName($agentName)
    {
        return $this->agentName = $agentName;
    }

    /**
     * Set the value of password
     * @return self
     */
    public function setPassword($password)
    {
        return $this->password = $password;
    }

    /**
     * Set the value of faction
     * @return self
     */
    public function setFaction($faction)
    {
        return $this->faction = $faction;
    }

    /**
     * Get one product has many features. This is the inverse side.
     */
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * Set un agente tiene muchas Stats. Este es el lado inverso.
     *
     * @return  self
     */
    public function addStats(Stats $stats): self
    {
        if (!$this->stats->contains($stats)) {
            $this->stats[] = $stats;
            $stats->setIdAgent($this);
        }
        return $this;
    }

    /**
     * Get one product has many features. This is the inverse side.
     */
    public function getUploads()
    {
        return $this->uploads;
    }

    /**
     * Set un agente tiene muchas Uploads. Este es el lado inverso.
     *
     * @return  self
     */
    public function addUploads(Uploads $uploads): self
    {
        if (!$this->uploads->contains($uploads)) {
            $this->uploads[] = $uploads;
            $uploads->setAgent($this);
        }
        return $this;
    }

    /**
     * Get one product has many features. This is the inverse side.
     */ 
    public function getStatsEvents()
    {
        return $this->statsEvents;
    }

    /**
     * Set un agente tiene muchas StatsEvents. Este es el lado inverso.
     *
     * @return  self
     */
    //Comprobamos si las propiedades del objeto que vengan ya estan definidas en el array
    //Si no estan, las añadimos al array
    ///Y luego agregamos la instancia del agente que haya hecho en este caso el statsEvents
    public function addStatsEvents(StatsEvents $statsEvents): self
    {
        if (!$this->statsEvents->contains($statsEvents)) {
            $this->statsEvents[] = $statsEvents;
            $statsEvents->setIdAgent($this);
        }
        return $this;
    }
}
