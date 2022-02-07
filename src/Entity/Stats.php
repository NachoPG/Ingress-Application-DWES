<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatsRepository::class)
 * @ORM\Table(name="stats")
 */
class Stats
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name="id_stats")
     * @ORM\GeneratedValue
     */
    private $idStats;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\OneToOne(targetEntity="Uploads", inversedBy="stats")
     * @ORM\JoinColumn(name="id_upload", referencedColumnName="id_upload")
     * 
     */
    private $idUpload;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Agent", inversedBy="stats")
     * @ORM\JoinColumn(name="id_agent", referencedColumnName="id_agent")
     */
    private $idAgent;

    /**
     * @ORM\Column(type="integer",name="level")
     */
    private $level;

    /**
     * @ORM\Column(type="integer",name="lifetime_ap")
     */
    private $lifetimeAp;

    /**
     * @ORM\Column(type="integer",name="current_ap")
     */
    private $currentAp;

    /**
     * @ORM\Column(name="unique_portals_visited", type="integer", nullable="true")
     */
    private $uniquePortals;

    /**
     * @ORM\Column(name="unique_portals_drone_visited", type="integer", nullable="true")
     */
    private $uniquePortalsDrone;

    /**
     * @ORM\Column(name="furthest_drone_distance", type="integer", nullable="true")
     */
    private $furthestDrone;

    /**
     * @ORM\Column(name="seer", type="integer", nullable="true")
     */
    private $seer;

    /**
     * @ORM\Column(name="portals_discovered", type="integer", nullable="true")
     */
    private $portalsDiscovered;

    /**
     * @ORM\Column(name="xm_collected", type="integer", nullable="true")
     */
    private $xmCollected;

    /**
     * @ORM\Column(name="opr_agreements", type="integer", nullable="true")
     */
    private $opr;

    /**
     * @ORM\Column(name="portal_scans_uploaded", type="integer", nullable="true")
     */
    private $portalScans;

    /**
     * @ORM\Column(name="uniques_scout_controlled", type="integer", nullable="true")
     */
    private $uniqueScoutControlled;

    /**
     * @ORM\Column(name="resonators_deployed", type="integer", nullable="true")
     */
    private $resonatorsDeployed;

    /**
     * @ORM\Column(name="links_created", type="integer", nullable="true")
     */
    private $linksCreated;

    /**
     * @ORM\Column(name="control_fields_created", type="integer", nullable="true")
     */
    private $contolFieldsCreated;

    /**
     * @ORM\Column(name="mind_units_captured", type="integer", nullable="true")
     */
    private $mindUnitsCaptured;
    
    /**
     * @ORM\Column(name="longest_link_ever_created", type="integer", nullable="true")
     */
    private $longestLink;

    /**
     * @ORM\Column(name="largest_control_field", type="integer", nullable="true")
     */
    private $largestControlField;

    /**
     * @ORM\Column(name="xm_recharged", type="integer", nullable="true")
     */
    private $xmRecharged;

    /**
     * @ORM\Column(name="portals_captured", type="integer", nullable="true")
     */
    private $portalCaptured;

    /**
     *  @ORM\Column(name="unique_portals_captured",type="integer", nullable="true")
     */
    private $uniquePortalsCaptured;

    /**
     * @ORM\Column(name="mods_deployed", type="integer", nullable="true")
     */
    private $modsDeployed;

    /**
     * @ORM\Column(name="hacks", type="integer", nullable="true")
     */
    private $hacks;

    /**
     * @ORM\Column(name="drone_hacks", type="integer", nullable="true")
     */
    private $droneHacks;

    /**
     * @ORM\Column(name="glyph_hack_points", type="integer", nullable="true")
     */
    private $glyph;

    /**
     * @ORM\Column(name="completed_hackstreaks", type="integer", nullable="true")
     */
    private $hackstreaks;

    /**
     * @ORM\Column(name="longest_sojourner_streak", type="integer", nullable="true")
     */
    private $sojourner;
    
    /**
     * @ORM\Column(name="resonators_destroyed", type="integer", nullable="true")
     */
    private $resonatorsDestroyed;

    /**
     * @ORM\Column(name="portals_neutralized", type="integer", nullable="true")
     */
    private $portalsNeutralizad;

    /**
     * @ORM\Column(name="enemy_links_destroyed", type="integer", nullable="true")
     */
    private $linksDestroyed;

    /**
     * @ORM\Column(name="enemy_fields_destroyed", type="integer", nullable="true")
     */
    private $fieldsDestroyed;

    /**
     * @ORM\Column(name="battle_beacon_combatant", type="integer", nullable="true" )
     */
    private $battleBeacon;
    
    /**
     * @ORM\Column(name="drones_returned", type="integer", nullable="true")
     */
    private $dronesReturned;

    /**
     * @ORM\Column(name="max_time_portal_held", type="integer", nullable="true")
     */
    private $timePortalHeld;

    /**
     * @ORM\Column(name="max_time_link_maintained", type="integer", nullable="true")
     */
    private $timeLinkMaintained;

    /**
     * @ORM\Column(name="max_link_length_x_days", type="integer", nullable="true")
     */
    private $linkLengthDays;

    /**
     * @ORM\Column(name="max_time_field_held", type="integer", nullable="true")
     */
    private $timeFieldHeld;

    /**
     * @ORM\Column(name="largest_field_mus_x_days", type="integer", nullable="true")
     */
    private $fieldMusDays;

    /**
     * @ORM\Column(name="forced_drone_recalls", type="integer", nullable="true")
     */
    private $forcedDrone;

    /**
     * @ORM\Column(name="distance_walked", type="integer", nullable="true")
     */
    private $distanceWalked;

    /**
     * @ORM\Column(name="kinetic_capsules_completed", type="integer", nullable="true")
     */
    private $kinectCapsules;

    /**
     * @ORM\Column(name="unique_missions_completed", type="integer", nullable="true")
     */
    private $missionCompleted;

    /**
     * @ORM\Column(type="integer",name="`mission_day(s)_attended`",nullable="true")
     */
    private $missionsDaysAttended;

    /**
     * @ORM\Column(type="integer",name="`nl-1331_meetup(s)_attended`",nullable="true")
     */
    private $meetupAttended;

    /**
     * @ORM\Column(name="first_saturday_events", type="integer", nullable="true")
     */
    private $firstSaturday;
    
    /**
     * @ORM\Column(name="agents_recruited", type="integer", nullable="true")
     */
    private $agentsRecluited;

    /**
     * @ORM\Column(name="recursions", type="integer", nullable="true")
     */
    private $recursions;

    /**
     * @ORM\Column(name="months_subscribed", type="integer", nullable="true")
     */
    private $mouthsSubscribed;

    /**
     * @ORM\Column(name="links_active", type="integer", nullable="true")
     */
    private $linksActive;

    /**
     * @ORM\Column(name="portals_owned", type="integer", nullable="true")
     */
    private $portalsOwned;

    /**
     * @ORM\Column(name="control_fields_active", type="integer", nullable="true")
     */
    private $fieldsActive;

    /**
     * @ORM\Column(name="mind_unit_control", type="integer", nullable="true")
     */
    private $mindUnitControl;

    /**
     * @ORM\Column(name="current_hackstreak", type="integer", nullable="true")
     */
    private $currentHackstreaks;

    /**
     * @ORM\Column(name="current_sojourner_streak", type="integer", nullable="true")
     */
    private $currentSojourner;


    //<-------------GETTERS - SETTERS---------------->

    /**
     * Get the value of idStats
     */
    public function getIdStats()
    {
        return $this->idStats;
    }

    /**
     * Get the value of idUpload
     */
    public function getIdUpload()
    {
        return $this->idUpload;
    }

    /**
     * Get the value of level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get the value of lifetimeAP
     */
    public function getLifetimeAp()
    {
        return $this->lifetimeAp;
    }

    /**
     * Get the value of currentAp
     */
    public function getCurrentAp()
    {
        return $this->currentAp;
    }

    /**
     * Get the value of MissionsDaysAttended
     */
    public function getMissionsDaysAttended()
    {
        return $this->missionsDaysAttended;
    }

    /**
     * Get the value of MissionsDaysAttended
     */
    public function getMeetupAttended()
    {
        return $this->meetupAttended;
    }

    /**
     * Set the value of idUpload
     * @return self
     */
    public function setIdUpload($idUpload)
    {
        return $this->idUpload = $idUpload;
    }

    /**
     * Set the value of level
     * @return self
     */
    public function setLevel($level)
    {
        return $this->level = $level;
    }

    /**
     * Set the value of lifetimeAp
     * @return self
     */
    public function setLifetimeAp($lifetimeAp)
    {
        return $this->lifetimeAp = $lifetimeAp;
    }

    /**
     * Set the value of currentAp
     * @return self
     */
    public function setCurrentAp($currentAp)
    {
        return $this->currentAp = $currentAp;
    }

    /**
     * Set the value of missionsDaysAttended
     * @return self
     */
    public function setMissionsDaysAttended($missionsDaysAttended)
    {
        return $this->missionsDaysAttended = $missionsDaysAttended;
    }

    /**
     * Set the value of meetupAttended
     * @return self
     */
    public function setMeetupAttended($meetupAttended)
    {
        return $this->meetupAttended = $meetupAttended;
    }

    /**
     * Get many features have one product. This is the owning side.
     */
    public function getIdAgent()
    {
        return $this->idAgent;
    }

    /**
     * Set many features have one product. This is the owning side.
     *
     * @return  self
     */
    public function setIdAgent($idAgent)
    {
        $this->idAgent = $idAgent;

        return $this;
    }

    /**
     * Get the value of uniquePortals
     */
    public function getUniquePortals()
    {
        return $this->uniquePortals;
    }

    /**
     * Set the value of uniquePortals
     *
     * @return  self
     */
    public function setUniquePortals($uniquePortals)
    {
        $this->uniquePortals = $uniquePortals;

        return $this;
    }

    /**
     * Get the value of uniquePortalsDrone
     */
    public function getUniquePortalsDrone()
    {
        return $this->uniquePortalsDrone;
    }

    /**
     * Set the value of uniquePortalsDrone
     *
     * @return  self
     */
    public function setUniquePortalsDrone($uniquePortalsDrone)
    {
        $this->uniquePortalsDrone = $uniquePortalsDrone;

        return $this;
    }

    /**
     * Get the value of furthestDrone
     */
    public function getFurthestDrone()
    {
        return $this->furthestDrone;
    }

    /**
     * Set the value of furthestDrone
     *
     * @return  self
     */
    public function setFurthestDrone($furthestDrone)
    {
        $this->furthestDrone = $furthestDrone;

        return $this;
    }

    /**
     * Get the value of seer
     */ 
    public function getSeer()
    {
        return $this->seer;
    }

    /**
     * Set the value of seer
     *
     * @return  self
     */ 
    public function setSeer($seer)
    {
        $this->seer = $seer;

        return $this;
    }

    /**
     * Get the value of portalsDiscovered
     */ 
    public function getPortalsDiscovered()
    {
        return $this->portalsDiscovered;
    }

    /**
     * Set the value of portalsDiscovered
     *
     * @return  self
     */ 
    public function setPortalsDiscovered($portalsDiscovered)
    {
        $this->portalsDiscovered = $portalsDiscovered;

        return $this;
    }

    /**
     * Get the value of xmCollected
     */ 
    public function getXmCollected()
    {
        return $this->xmCollected;
    }

    /**
     * Set the value of xmCollected
     *
     * @return  self
     */ 
    public function setXmCollected($xmCollected)
    {
        $this->xmCollected = $xmCollected;

        return $this;
    }

    /**
     * Get the value of opr
     */ 
    public function getOpr()
    {
        return $this->opr;
    }

    /**
     * Set the value of opr
     *
     * @return  self
     */ 
    public function setOpr($opr)
    {
        $this->opr = $opr;

        return $this;
    }

    /**
     * Get the value of portalScans
     */ 
    public function getPortalScans()
    {
        return $this->portalScans;
    }

    /**
     * Set the value of portalScans
     *
     * @return  self
     */ 
    public function setPortalScans($portalScans)
    {
        $this->portalScans = $portalScans;

        return $this;
    }

    /**
     * Get the value of uniqueScoutControlled
     */ 
    public function getUniqueScoutControlled()
    {
        return $this->uniqueScoutControlled;
    }

    /**
     * Set the value of uniqueScoutControlled
     *
     * @return  self
     */ 
    public function setUniqueScoutControlled($uniqueScoutControlled)
    {
        $this->uniqueScoutControlled = $uniqueScoutControlled;

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
     * Get the value of contolFieldsCreated
     */ 
    public function getContolFieldsCreated()
    {
        return $this->contolFieldsCreated;
    }

    /**
     * Set the value of contolFieldsCreated
     *
     * @return  self
     */ 
    public function setContolFieldsCreated($contolFieldsCreated)
    {
        $this->contolFieldsCreated = $contolFieldsCreated;

        return $this;
    }

    /**
     * Get the value of mindUnitsCaptured
     */ 
    public function getMindUnitsCaptured()
    {
        return $this->mindUnitsCaptured;
    }

    /**
     * Set the value of mindUnitsCaptured
     *
     * @return  self
     */ 
    public function setMindUnitsCaptured($mindUnitsCaptured)
    {
        $this->mindUnitsCaptured = $mindUnitsCaptured;

        return $this;
    }

    /**
     * Get the value of longestLink
     */ 
    public function getLongestLink()
    {
        return $this->longestLink;
    }

    /**
     * Set the value of longestLink
     *
     * @return  self
     */ 
    public function setLongestLink($longestLink)
    {
        $this->longestLink = $longestLink;

        return $this;
    }

    /**
     * Get the value of largestControlField
     */ 
    public function getLargestControlField()
    {
        return $this->largestControlField;
    }

    /**
     * Set the value of largestControlField
     *
     * @return  self
     */ 
    public function setLargestControlField($largestControlField)
    {
        $this->largestControlField = $largestControlField;

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
     * Get the value of portalCaptured
     */ 
    public function getPortalCaptured()
    {
        return $this->portalCaptured;
    }

    /**
     * Set the value of portalCaptured
     *
     * @return  self
     */ 
    public function setPortalCaptured($portalCaptured)
    {
        $this->portalCaptured = $portalCaptured;

        return $this;
    }

    /**
     * Get the value of uniquePortalsCaptured
     */ 
    public function getUniquePortalsCaptured()
    {
        return $this->uniquePortalsCaptured;
    }

    /**
     * Set the value of uniquePortalsCaptured
     *
     * @return  self
     */ 
    public function setUniquePortalsCaptured($uniquePortalsCaptured)
    {
        $this->uniquePortalsCaptured = $uniquePortalsCaptured;

        return $this;
    }

    /**
     * Get the value of modsDeployed
     */ 
    public function getModsDeployed()
    {
        return $this->modsDeployed;
    }

    /**
     * Set the value of modsDeployed
     *
     * @return  self
     */ 
    public function setModsDeployed($modsDeployed)
    {
        $this->modsDeployed = $modsDeployed;

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
     * Get the value of droneHacks
     */ 
    public function getDroneHacks()
    {
        return $this->droneHacks;
    }

    /**
     * Set the value of droneHacks
     *
     * @return  self
     */ 
    public function setDroneHacks($droneHacks)
    {
        $this->droneHacks = $droneHacks;

        return $this;
    }

    /**
     * Get the value of glyph
     */ 
    public function getGlyph()
    {
        return $this->glyph;
    }

    /**
     * Set the value of glyph
     *
     * @return  self
     */ 
    public function setGlyph($glyph)
    {
        $this->glyph = $glyph;

        return $this;
    }

    /**
     * Get the value of hackstreaks
     */ 
    public function getHackstreaks()
    {
        return $this->hackstreaks;
    }

    /**
     * Set the value of hackstreaks
     *
     * @return  self
     */ 
    public function setHackstreaks($hackstreaks)
    {
        $this->hackstreaks = $hackstreaks;

        return $this;
    }

    /**
     * Get the value of sojourner
     */ 
    public function getSojourner()
    {
        return $this->sojourner;
    }

    /**
     * Set the value of sojourner
     *
     * @return  self
     */ 
    public function setSojourner($sojourner)
    {
        $this->sojourner = $sojourner;

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

    /**
     * Get the value of portalsNeutralizad
     */ 
    public function getPortalsNeutralizad()
    {
        return $this->portalsNeutralizad;
    }

    /**
     * Set the value of portalsNeutralizad
     *
     * @return  self
     */ 
    public function setPortalsNeutralizad($portalsNeutralizad)
    {
        $this->portalsNeutralizad = $portalsNeutralizad;

        return $this;
    }

    /**
     * Get the value of linksDestroyed
     */ 
    public function getLinksDestroyed()
    {
        return $this->linksDestroyed;
    }

    /**
     * Set the value of linksDestroyed
     *
     * @return  self
     */ 
    public function setLinksDestroyed($linksDestroyed)
    {
        $this->linksDestroyed = $linksDestroyed;

        return $this;
    }

    /**
     * Get the value of fieldsDestroyed
     */ 
    public function getFieldsDestroyed()
    {
        return $this->fieldsDestroyed;
    }

    /**
     * Set the value of fieldsDestroyed
     *
     * @return  self
     */ 
    public function setFieldsDestroyed($fieldsDestroyed)
    {
        $this->fieldsDestroyed = $fieldsDestroyed;

        return $this;
    }

    /**
     * Get the value of battleBeacon
     */ 
    public function getBattleBeacon()
    {
        return $this->battleBeacon;
    }

    /**
     * Set the value of battleBeacon
     *
     * @return  self
     */ 
    public function setBattleBeacon($battleBeacon)
    {
        $this->battleBeacon = $battleBeacon;

        return $this;
    }

    /**
     * Get the value of dronesReturned
     */ 
    public function getDronesReturned()
    {
        return $this->dronesReturned;
    }

    /**
     * Set the value of dronesReturned
     *
     * @return  self
     */ 
    public function setDronesReturned($dronesReturned)
    {
        $this->dronesReturned = $dronesReturned;

        return $this;
    }

    /**
     * Get the value of timePortalHeld
     */ 
    public function getTimePortalHeld()
    {
        return $this->timePortalHeld;
    }

    /**
     * Set the value of timePortalHeld
     *
     * @return  self
     */ 
    public function setTimePortalHeld($timePortalHeld)
    {
        $this->timePortalHeld = $timePortalHeld;

        return $this;
    }

    /**
     * Get the value of timeLinkMaintained
     */ 
    public function getTimeLinkMaintained()
    {
        return $this->timeLinkMaintained;
    }

    /**
     * Set the value of timeLinkMaintained
     *
     * @return  self
     */ 
    public function setTimeLinkMaintained($timeLinkMaintained)
    {
        $this->timeLinkMaintained = $timeLinkMaintained;

        return $this;
    }

    /**
     * Get the value of linkLengthDays
     */ 
    public function getLinkLengthDays()
    {
        return $this->linkLengthDays;
    }

    /**
     * Set the value of linkLengthDays
     *
     * @return  self
     */ 
    public function setLinkLengthDays($linkLengthDays)
    {
        $this->linkLengthDays = $linkLengthDays;

        return $this;
    }

    /**
     * Get the value of timeFieldHeld
     */ 
    public function getTimeFieldHeld()
    {
        return $this->timeFieldHeld;
    }

    /**
     * Set the value of timeFieldHeld
     *
     * @return  self
     */ 
    public function setTimeFieldHeld($timeFieldHeld)
    {
        $this->timeFieldHeld = $timeFieldHeld;

        return $this;
    }

    /**
     * Get the value of fieldMusDays
     */ 
    public function getFieldMusDays()
    {
        return $this->fieldMusDays;
    }

    /**
     * Set the value of fieldMusDays
     *
     * @return  self
     */ 
    public function setFieldMusDays($fieldMusDays)
    {
        $this->fieldMusDays = $fieldMusDays;

        return $this;
    }

    /**
     * Get the value of forcedDrone
     */ 
    public function getForcedDrone()
    {
        return $this->forcedDrone;
    }

    /**
     * Set the value of forcedDrone
     *
     * @return  self
     */ 
    public function setForcedDrone($forcedDrone)
    {
        $this->forcedDrone = $forcedDrone;

        return $this;
    }

    /**
     * Get the value of distanceWalked
     */ 
    public function getDistanceWalked()
    {
        return $this->distanceWalked;
    }

    /**
     * Set the value of distanceWalked
     *
     * @return  self
     */ 
    public function setDistanceWalked($distanceWalked)
    {
        $this->distanceWalked = $distanceWalked;

        return $this;
    }

    /**
     * Get the value of kinectCapsules
     */ 
    public function getKinectCapsules()
    {
        return $this->kinectCapsules;
    }

    /**
     * Set the value of kinectCapsules
     *
     * @return  self
     */ 
    public function setKinectCapsules($kinectCapsules)
    {
        $this->kinectCapsules = $kinectCapsules;

        return $this;
    }

    /**
     * Get the value of missionCompleted
     */ 
    public function getMissionCompleted()
    {
        return $this->missionCompleted;
    }

    /**
     * Set the value of missionCompleted
     *
     * @return  self
     */ 
    public function setMissionCompleted($missionCompleted)
    {
        $this->missionCompleted = $missionCompleted;

        return $this;
    }

    /**
     * Get the value of firstSaturday
     */ 
    public function getFirstSaturday()
    {
        return $this->firstSaturday;
    }

    /**
     * Set the value of firstSaturday
     *
     * @return  self
     */ 
    public function setFirstSaturday($firstSaturday)
    {
        $this->firstSaturday = $firstSaturday;

        return $this;
    }

    /**
     * Get the value of agentsRecluited
     */ 
    public function getAgentsRecluited()
    {
        return $this->agentsRecluited;
    }

    /**
     * Set the value of agentsRecluited
     *
     * @return  self
     */ 
    public function setAgentsRecluited($agentsRecluited)
    {
        $this->agentsRecluited = $agentsRecluited;

        return $this;
    }

    /**
     * Get the value of recursions
     */ 
    public function getRecursions()
    {
        return $this->recursions;
    }

    /**
     * Set the value of recursions
     *
     * @return  self
     */ 
    public function setRecursions($recursions)
    {
        $this->recursions = $recursions;

        return $this;
    }

    /**
     * Get the value of mouthsSubscribed
     */ 
    public function getMouthsSubscribed()
    {
        return $this->mouthsSubscribed;
    }

    /**
     * Set the value of mouthsSubscribed
     *
     * @return  self
     */ 
    public function setMouthsSubscribed($mouthsSubscribed)
    {
        $this->mouthsSubscribed = $mouthsSubscribed;

        return $this;
    }

    /**
     * Get the value of linksActive
     */ 
    public function getLinksActive()
    {
        return $this->linksActive;
    }

    /**
     * Set the value of linksActive
     *
     * @return  self
     */ 
    public function setLinksActive($linksActive)
    {
        $this->linksActive = $linksActive;

        return $this;
    }

    /**
     * Get the value of portalsOwned
     */ 
    public function getPortalsOwned()
    {
        return $this->portalsOwned;
    }

    /**
     * Set the value of portalsOwned
     *
     * @return  self
     */ 
    public function setPortalsOwned($portalsOwned)
    {
        $this->portalsOwned = $portalsOwned;

        return $this;
    }

    /**
     * Get the value of fieldsActive
     */ 
    public function getFieldsActive()
    {
        return $this->fieldsActive;
    }

    /**
     * Set the value of fieldsActive
     *
     * @return  self
     */ 
    public function setFieldsActive($fieldsActive)
    {
        $this->fieldsActive = $fieldsActive;

        return $this;
    }

    /**
     * Get the value of mindUnitControl
     */ 
    public function getMindUnitControl()
    {
        return $this->mindUnitControl;
    }

    /**
     * Set the value of mindUnitControl
     *
     * @return  self
     */ 
    public function setMindUnitControl($mindUnitControl)
    {
        $this->mindUnitControl = $mindUnitControl;

        return $this;
    }

    /**
     * Get the value of currentHackstreaks
     */ 
    public function getCurrentHackstreaks()
    {
        return $this->currentHackstreaks;
    }

    /**
     * Set the value of currentHackstreaks
     *
     * @return  self
     */ 
    public function setCurrentHackstreaks($currentHackstreaks)
    {
        $this->currentHackstreaks = $currentHackstreaks;

        return $this;
    }

    /**
     * Get the value of currentSojourner
     */ 
    public function getCurrentSojourner()
    {
        return $this->currentSojourner;
    }

    /**
     * Set the value of currentSojourner
     *
     * @return  self
     */ 
    public function setCurrentSojourner($currentSojourner)
    {
        $this->currentSojourner = $currentSojourner;

        return $this;
    }
}
