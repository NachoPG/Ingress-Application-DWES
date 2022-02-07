<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Entity\{Stats};
use App\Core\EntityManager;

class RankingController extends AbstractController
{

    public function getRankingAgents()
    {
        if (!$_SESSION["ingreso"]) {
            header("location:/");
            exit();
        }
        
        $em = (new EntityManager())->get();
        $statsRepository = $em->getRepository(Stats::class);
        // foreach($arrayRanking as $valor){
        //     var_dump($valor->getIdAgent()->getAgentName());
        // }
        
        
        
        //Renderiza la plantilla pasandole los datos de todos los agentes ordenados de mayor a menos a partir de los puntos que tienen cada uno
        
        $this->render("rankingAgents.html", [
            "ranking" => $statsRepository->findBy([],['currentAp'=>'DESC'])
        ]);
    }
}
