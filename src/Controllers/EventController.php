<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Entity\{Events};
use App\Core\EntityManager;

class EventController extends AbstractController
{
    public function getAllEvents()
    {

        if (!$_SESSION["ingreso"]) {
            header("location:/");
            exit();
        }

        $em = (new EntityManager())->get();
        $eventsRepository = $em->getRepository(Events::class);

        $this->render("events.html", [
            'events' => $eventsRepository->findAll()
        ]);
    }

    public function getAgentByEvent($id)
    {
        if (!$_SESSION["ingreso"]) {
            header("location:/");
            exit();
        }

        $em = (new EntityManager())->get();
        $events = $em->getRepository(Events::class)->find($id);
        $statsEvents = $events->getStatsEvents();
        // $agents = $statsEvents->getIdAgent();

        $arrayAgents = array();
        foreach ($statsEvents as $statEvent) {
            $agents = $statEvent->getIdAgent();
            array_push($arrayAgents,$agents);
        }

        $this->render("detailEvent.html", [
            'agentsEvents' => $arrayAgents,
            'event'=>$events
        ]);
        
    }
}
