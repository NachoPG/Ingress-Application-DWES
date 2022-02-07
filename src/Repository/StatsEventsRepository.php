<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\StatsEvents;
use App\Core\EntityManager;

class StatsEventsRepository extends EntityRepository
{

    public function insertStats($data, $event, $currentUpload, $agent)
    {
        $statsEvent = new StatsEvents();
        $statsEvent->setIdEvent($event);
        $statsEvent->setIdUpload($currentUpload);
        $statsEvent->setIdAgent($agent);

        foreach ($data["datosEncabezado"] as $indice => $valor) {
            switch ($valor) {
                case "Lifetime AP":
                    $statsEvent->setLifetimeAp($data["datosValores"][$indice]);
                    break;
                case "Unique Portals Visited":
                    $statsEvent->setUniquePortalsVisited($data["datosValores"][$indice]);
                    break;
                case "Resonators Deployed":
                    $statsEvent->setResonatorsDeployed($data["datosValores"][$indice]);
                    break;
                case "Links Created":
                    $statsEvent->setLinksCreated($data["datosValores"][$indice]);
                    break;
                case "Control Fields Created":
                    $statsEvent->setControlFieldsCreated($data["datosValores"][$indice]);
                    break;
                case "XM Recharged":
                    $statsEvent->setXmRecharged($data["datosValores"][$indice]);
                    break;
                case "Portals Captured":
                    $statsEvent->setPortalsCaptured($data["datosValores"][$indice]);
                    break;
                case "Hacks":
                    $statsEvent->setHacks($data["datosValores"][$indice]);
                    break;
                case "Resonators Destroyed":
                    $statsEvent->setResonatorsDestroyed($data["datosValores"][$indice]);
                    break;
                default:
                    break;
            }
        }


        $this->getEntityManager()->persist($statsEvent);
        $this->getEntityManager()->flush();
    }
}
