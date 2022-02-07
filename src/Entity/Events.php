<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventsRepository::class)
 * @ORM\Table(name="events")
 */
class Events
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id_event")
     * @ORM\GeneratedValue
     */
    private $idEvent;

    /**
     * @ORM\Column(type="string",length="100",name="name_event",unique="true")
     */
    private $eventName;

    /**
     * @ORM\Column(type="string",length="100",name="alias_event")
     */
    private $aliasEvent;

    /**
     * @ORM\Column(type="text",length="250",name="descrip_event", nullable="true")
     */
    private $descriptionEvent;

    /**
     * @ORM\Column(type="date",name="date_event")
     */
    private $dateEvent;

    /**
     * @ORM\Column(type="string",length="250",name="place_event")
     */
    private $placeEvent;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="StatsEvents", mappedBy="idEvent")
     */
    private $statsEvents;


    public function __construct()
    {
        $this->statsEvents = new ArrayCollection();
    }

    //<-------------GETTERS - SETTERS---------------->

    /**
     * Get the value of id
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Get the value of nameEvent
     */
    public function getNameEvent()
    {
        return $this->eventName;
    }

    /**
     * Get the value of aliasEvent
     */
    public function getAliasEvent()
    {
        return $this->aliasEvent;
    }

    /**
     * Get the value of descriptionEvent
     */
    public function getDescriptionEvent()
    {
        return $this->descriptionEvent;
    }

    /**
     * Get the value of dateEvent
     */
    public function getDateEvent()
    {
        return $this->dateEvent;
    }

    /**
     * Get the value of placeEvent
     */
    public function getPlaceEvent()
    {
        return $this->placeEvent;
    }

    /**
     * Set the value of nameEvent
     * @return self
     */
    public function setNameEvent($eventName)
    {
        return $this->eventName = $eventName;
    }

    /**
     * Set the value of aliasEvent
     * @return self
     */
    public function setAliasEvent($aliasEvent)
    {
        return $this->aliasEvent = $aliasEvent;
    }

    /**
     * Set the value of DescriptionEvent
     * @return self
     */
    public function setDescriptionEvent($descripEvent)
    {
        return $this->descriptionEvent = $descripEvent;
    }

    /**
     * Set the value of DateEvent
     * @return self
     */
    public function setDateEvent($dateEvent)
    {
        return $this->dateEvent = $dateEvent;
    }

    /**
     * Set the value of placeEvent
     * @return self
     */
    public function setPlaceEvent($placeEvent)
    {
        return $this->placeEvent = $placeEvent;
    }

    /**
     * Get one product has many features. This is the inverse side.
     */ 
    public function getStatsEvents()
    {
        return $this->statsEvents;
    }

    /**
     * Set un evento tiene muchas StatsEvents. Este es el lado inverso.
     *
     * @return  self
     */
    public function addStatsEvents(StatsEvents $statsEvents): self
    {
        if (!$this->statsEvents->contains($statsEvents)) {
            $this->statsEvents[] = $statsEvents;
            $statsEvents->setIdEvent($this);
        }
        return $this;
    }
}
