<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\{Stats};
use App\Core\EntityManager;


class StatsRepository extends EntityRepository
{
    public function insertStats($data, $currentUpload, $agent)
    {
        $stats = new Stats();
        $stats->setIdUpload($currentUpload);
        $stats->setIdAgent($agent);

        foreach ($data["datosEncabezado"] as $indice => $valor) {
            switch ($valor) {
                case "Level":
                    $stats->setLevel($data["datosValores"][$indice]);
                    break;
                case "Lifetime AP":
                    $stats->setLifetimeAp($data["datosValores"][$indice]);
                    break;
                case "Current AP":
                    $stats->setCurrentAp($data["datosValores"][$indice]);
                    break;
                case "Unique Portals Visited":
                    $stats->setUniquePortals($data["datosValores"][$indice]);
                    break;
                case "Unique Portals Drone Visited":
                    $stats->setUniquePortalsDrone($data["datosValores"][$indice]);
                    break;
                case "Furthest Drone Distance":
                    $stats->setFurthestDrone($data["datosValores"][$indice]);
                    break;
                case "Mission Day(s) Attended":
                    $stats->setMissionsDaysAttended($data["datosValores"][$indice]);
                    break;
                case "NL-1331 Meetup(s) Attended":
                    $stats->setMeetupAttended($data["datosValores"][$indice]);
                    break;
                default:
                    break;
            }
        }

        $this->getEntityManager()->persist($stats);
        $this->getEntityManager()->flush();
    }
}
