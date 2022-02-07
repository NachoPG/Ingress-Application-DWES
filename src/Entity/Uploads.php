<?php

namespace App\Entity;

use App\Repository\UploadsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UploadsRepository::class)
 * @ORM\Table(name="uploads")
 */
class Uploads
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id_upload")
     * @ORM\GeneratedValue
     */
    private $idUpload;

    /**
     * @ORM\Column(type="date",name="date")
     */
    private $dateUpload;

    /**
     * @ORM\Column(type="time",name="time")
     */
    private $timeUpload;

    /**
     * @ORM\Column(type="boolean",name="id_event")
     */
    private $idEventUpload;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Agent", inversedBy="uploads")
     * @ORM\JoinColumn(name="id_agent", referencedColumnName="id_agent")
     */
    private $agent;


    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToOne(targetEntity="Stats", mappedBy="idUpload")
     * @ORM\JoinColumn(name="id_upload", referencedColumnName="id_upload")
     */
    private $stats;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToOne(targetEntity="StatsEvents", mappedBy="idUpload")
     * @ORM\JoinColumn(name="id_upload", referencedColumnName="id_upload")
     */
    private $statsEvents;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Span", inversedBy="uploads")
     * @ORM\JoinColumn(name="time_span", referencedColumnName="id_span")
     */
    private $span;

    
    //<-------------GETTERS - SETTERS---------------->

    /**
     * Get the value of idUpload
     */
    public function getIdUpload()
    {
        return $this->idUpload;
    }

    /**
     * Get the value of dateUpload
     */
    public function getDateUpload()
    {
        return $this->dateUpload;
    }

    /**
     * Set the value of dateUpload
     *
     * @return  self
     */
    public function setDateUpload($dateUpload)
    {
        return $this->dateUpload = $dateUpload;
    }

    /**
     * Get the value of timeUpload
     */
    public function getTimeUpload()
    {
        return $this->timeUpload;
    }

    /**
     * Set the value of timeUpload
     *
     * @return  self
     */
    public function setTimeUpload($timeUpload)
    {
        return $this->timeUpload = $timeUpload;
    }


    /**
     * Get the value of idEventUpload
     */
    public function getIdEventUpload()
    {
        return $this->idEventUpload;
    }

    /**
     * Set the value of idEventUpload
     *
     * @return  self
     */
    public function setIdEventUpload($idEventUpload)
    {
        return $this->idEventUpload = $idEventUpload;
    }

    /**
     * Get many features have one product. This is the owning side.
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set many features have one product. This is the owning side.
     *
     * @return  self
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;

        return $this;
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
            $stats->setIdUpload($stats);
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
    public function addStatsEvents(StatsEvents $statsEvents): self
    {
        if (!$this->statsEvents->contains($statsEvents)) {
            $this->statsEvents[] = $statsEvents;
            $statsEvents->setIdUpload($statsEvents);
        }
        return $this;
    }

    /**
     * Get many features have one product. This is the owning side.
     */ 
    public function getSpan()
    {
        return $this->span;
    }

    /**
     * Set many features have one product. This is the owning side.
     *
     * @return  self
     */ 
    public function setSpan($span)
    {
        $this->span = $span;

        return $this;
    }
}
