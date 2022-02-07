<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\Agent;
use App\Core\EntityManager;

class AgentRepository extends EntityRepository
{
    public function loginAgent()
    {
        //Se realiza la peticion pasandole el usuario y contraseña
        return $this->findOneBy(array('agentName' => $_POST["agent_name"], 'password' => $_POST["password"]));
    }

    public function formatStatsTxt($statsTxt)
    {
        // Separa en un primer lugar por saltos de linea para separar los datos del encabezado y los valores
        $separacion = explode("\n", $statsTxt);
        //Separa por tabulaciones los datos del encabezado
        $encabezado = explode("\t", $separacion[0]);
        //Separa por tabulaciones los valores
        $datos = explode("\t", $separacion[1]);

        //Guardamos en un array los datos
        $arrayData = array("datosEncabezado" => $encabezado, "datosValores" => $datos);

        return $arrayData;
    }

    public function formatArrayStatsEvents($arrayDatos)
    {
        $idEvento = 0;
        $inicioArrayStats = [];
        $finalArrayStats = [];
        $arrayStats = [];

        foreach ($arrayDatos as $value) {
            $array = [];
            $estado = "";

            if ($idEvento === 0 || $idEvento !== $value["idEvento"]) {
                $idEvento = $value["idEvento"];
                $arrayStats[$idEvento] = [];
                $array["$idEvento"] = $value["stats"];
                $inicioArrayStats = $value["stats"];
                $estado = "Inicio";
            } else if ($idEvento === $value["idEvento"]) {
                $idEvento = $value["idEvento"];
                $array["$idEvento"] = $value["stats"];
                $estado = "Final";
                $finalArrayStats = $value["stats"];
                $arrayDifferenceStats["Diferencia"] = array_map(function ($x, $y) {
                    return $y - $x;
                }, $inicioArrayStats, $finalArrayStats);
                $arrayEventAlias["AliasEvent"] = $value["eventAlias"];
                array_push($arrayStats[$idEvento], $arrayDifferenceStats);
                array_push(($arrayStats[$idEvento]), $arrayEventAlias);
            }

            $arrayStats[$idEvento][$estado] = $array[$idEvento];
        }
        
        return $arrayStats;
    }

    public function getStatsOfAgentByEvent($statsEvents)
    {
        $arrayDatos = [];
        foreach ($statsEvents as $result) {
            $event = $result->getIdEvent();
            $arrayStats = [
                "idEvento" => $event->getIdEvent(),
                "eventAlias" => $event->getAliasEvent(),
                'idStats' => $result->getIdStats(),
                'stats' => [
                    $result->getLifetimeAp(),
                    $result->getUniquePortalsVisited(),
                    $result->getResonatorsDeployed(),
                    $result->getLinksCreated(),
                    $result->getControlFieldsCreated(),
                    $result->getXmRecharged(),
                    $result->getPortalsCaptured(),
                    $result->getHacks(),
                    $result->getResonatorsDestroyed()
                ]
            ];

            array_push($arrayDatos, $arrayStats);
        }
        // var_dump($arrayDatos);
        // die();

        $arrayStats = $this->formatArrayStatsEvents($arrayDatos);
        return $arrayStats;
    }

    public function registerAgent($datosAgent)
    {
        //Comprobamos si el usuario que viene por POST ya existe o no
        $checkAgent = $this->findOneBy(array('agentName' => $datosAgent["agent_name"]));
        if (is_null($checkAgent)) {
            $agent = new Agent();
            $agent->setAgentName($datosAgent["agent_name"]);
            $agent->setPassword($datosAgent["password"]);
            $agent->setFaction($datosAgent["faction"]);

            $this->getEntityManager()->persist($agent);
            $this->getEntityManager()->flush();
            return $agent->getIdAgent();
        } else {
            //Existe un agente con el usuario que hemos introducido
            return 0;
        }
    }
}
