<?php

namespace App\Entity;

use App\Repository\SpanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpanRepository::class)
 * @ORM\Table(name="span")
 */
class Span
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id_span")
     * @ORM\GeneratedValue
     */
    private $idSpan;

    /**
     * @ORM\Column(type="string",length="100",name="time_span",unique="true")
     */
    private $timeSpan;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Uploads", mappedBy="span")
     */
    private $uploads;

    public function __construct()
    {
        $this->uploads = new ArrayCollection();
    }


    //<-------------GETTERS - SETTERS---------------->

    /**
     * Get the value of idSpan
     */
    public function getIdSpan()
    {
        return $this->idSpan;
    }

    /**
     * Get the value of timeSpan
     */
    public function getTimeSpan()
    {
        return $this->timeSpan;
    }

    /**
     * Set the value of timeSpan
     * @return self
     */
    public function setTimeSpan($timeSpan)
    {
        return $this->timeSpan = $timeSpan;
    }

    /**
     * Get one product has many features. This is the inverse side.
     */
    public function getUploads()
    {
        return $this->uploads;
    }

    /**
     * Set un span tiene muchas uploads. Este es el lado inverso.
     *
     * @return  self
     */
    public function addUploads(Uploads $uploads): self
    {
        if (!$this->uploads->contains($uploads)) {
            $this->uploads[] = $uploads;
            $uploads->setSpan($uploads);
        }
        return $this;
    }
}
