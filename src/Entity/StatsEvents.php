<?php

namespace App\Entity;

use App\Repository\StatsEventsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatsEventsRepository::class)
 * @ORM\Table(name="stats_events")
 */
class StatsEvents
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id_stats")
     * @ORM\GeneratedValue
     */
    private $idStats;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Events", inversedBy="StatsEvents")
     * @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     */
    private $idEvent;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\OneToOne(targetEntity="Uploads", inversedBy="statsEvents")
     * @ORM\JoinColumn(name="id_upload", referencedColumnName="id_upload")
     */
    private $idUpload;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Agent", inversedBy="statsEvents")
     * @ORM\JoinColumn(name="id_agent", referencedColumnName="id_agent")
     */
    private $idAgent;

    /**
     * @ORM\Column(type="integer",name="lifetime_ap")
     */
    private $lifetimeAp;

    /**
     * @ORM\Column(type="integer",name="unique_portals_visited", nullable="true")
     */
    private $uniquePortalsVisited;

    /**
     * @ORM\Column(type="integer",name="resonators_deployed", nullable="true")
     */
    private $resonatorsDeployed;

    /**
     * @ORM\Column(type="integer",name="links_created",nullable="true")
     */
    private $linksCreated;

    /**
     * @ORM\Column(type="integer",name="control_fields_created",nullable="true")
     */
    private $controlFieldsCreated;

    /**
     * @ORM\Column(type="integer",name="xm_recharged",nullable="true")
     */
    private $xmRecharged;

    /**
     * @ORM\Column(type="integer",name="portals_captured",nullable="true")
     */
    private $portalsCaptured;

    /**
     * @ORM\Column(type="integer",name="hacks",nullable="true")
     */
    private $hacks;

    /**
     * @ORM\Column(type="integer",name="resonators_destroyed",nullable="true")
     */
    private $resonatorsDestroyed;



    //<-------------GETTERS - SETTERS---------------->

    /**
     * Get the value of idStats
     */
    public function getIdStats()
    {
        return $this->idStats;
    }

    /**
     * Get the value of idEvent
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Set the value of idEvent
     *
     * @return  self
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    /**
     * Get the value of idUpload
     */
    public function getIdUpload()
    {
        return $this->idUpload;
    }

    /**
     * Set the value of idUpload
     *
     * @return  self
     */
    public function setIdUpload($idUpload)
    {
        $this->idUpload = $idUpload;

        return $this;
    }

    /**
     * Get the value of idAgent
     */
    public function getIdAgent()
    {
        return $this->idAgent;
    }

    /**
     * Set the value of idAgent
     *
     * @return  self
     */
    public function setIdAgent($idAgent)
    {
        $this->idAgent = $idAgent;

        return $this;
    }

    /**
     * Get the value of lifetimeAp
     */
    public function getLifetimeAp()
    {
        return $this->lifetimeAp;
    }

    /**
     * Set the value of lifetimeAp
     *
     * @return  self
     */
    public function setLifetimeAp($lifetimeAp)
    {
        $this->lifetimeAp = $lifetimeAp;

        return $this;
    }

    /**
     * Get the value of uniquePortalsVisited
     */
    public function getUniquePortalsVisited()
    {
        return $this->uniquePortalsVisited;
    }

    /**
     * Set the value of uniquePortalsVisited
     *
     * @return  self
     */
    public function setUniquePortalsVisited($uniquePortalsVisited)
    {
        $this->uniquePortalsVisited = $uniquePortalsVisited;

        return $this;
    }

    /**
     * Get the value of resonatorsDeployed
     */
    public function getResonatorsDeployed()
    {
        return $this->resonatorsDeployed;
    }

    /**
     * Set the value of resonatorsDeployed
     *
     * @return  self
     */
    public function setResonatorsDeployed($resonatorsDeployed)
    {
        $this->resonatorsDeployed = $resonatorsDeployed;

        return $this;
    }

    /**
     * Get the value of linksCreated
     */
    public function getLinksCreated()
    {
        return $this->linksCreated;
    }

    /**
     * Set the value of linksCreated
     *
     * @return  self
     */
    public function setLinksCreated($linksCreated)
    {
        $this->linksCreated = $linksCreated;

        return $this;
    }

    /**
     * Get the value of controlFieldsCreated
     */
    public function getControlFieldsCreated()
    {
        return $this->controlFieldsCreated;
    }

    /**
     * Set the value of controlFieldsCreated
     *
     * @return  self
     */
    public function setControlFieldsCreated($controlFieldsCreated)
    {
        $this->controlFieldsCreated = $controlFieldsCreated;

        return $this;
    }

    /**
     * Get the value of xmRecharged
     */
    public function getXmRecharged()
    {
        return $this->xmRecharged;
    }

    /**
     * Set the value of xmRecharged
     *
     * @return  self
     */
    public function setXmRecharged($xmRecharged)
    {
        $this->xmRecharged = $xmRecharged;

        return $this;
    }

    /**
     * Get the value of portalsCaptured
     */
    public function getPortalsCaptured()
    {
        return $this->portalsCaptured;
    }

    /**
     * Set the value of portalsCaptured
     *
     * @return  self
     */
    public function setPortalsCaptured($portalsCaptured)
    {
        $this->portalsCaptured = $portalsCaptured;

        return $this;
    }

    /**
     * Get the value of hacks
     */
    public function getHacks()
    {
        return $this->hacks;
    }

    /**
     * Set the value of hacks
     *
     * @return  self
     */
    public function setHacks($hacks)
    {
        $this->hacks = $hacks;

        return $this;
    }

    /**
     * Get the value of resonatorsDestroyed
     */
    public function getResonatorsDestroyed()
    {
        return $this->resonatorsDestroyed;
    }

    /**
     * Set the value of resonatorsDestroyed
     *
     * @return  self
     */
    public function setResonatorsDestroyed($resonatorsDestroyed)
    {
        $this->resonatorsDestroyed = $resonatorsDestroyed;

        return $this;
    }
}
