<?php

namespace App\Controllers;

use App\Core\{AbstractController,EntityManager};
use App\Entity\{Agent, Stats, Events, Span, StatsEvents, Uploads};
use Exception;

class AgentController extends AbstractController
{

    // Funcion para registrar un jugador
    public function registerAgent()
    {
        if (isset($_SESSION["ingreso"])) {
            header("location:/agentProfile");
            exit();
        }

        $em = (new EntityManager())->get();
        $agentRepository = $em->getRepository(Agent::class);
        $error = false;
        $error2 = false;
        //Si contiene algo la variable POST, ejecuta este codigo
        if (count($_POST)) {
            //Comprobamos que no venga ningun campo vacio. Si no salta un error en pantalla
            if ($_POST["agent_name"] !== '' && $_POST["password"] !== '' && $_POST["faction"] !== '') {
                //Si no se ha registrado correctamente, salta una excepcion
                if ($agentRepository->registerAgent($_POST) !== 0) {

                    //Guardamos en una variable de session el usuario y establecemos ingreso a true para que pueda acceder a las demas rutas
                    $_SESSION["agent_name"] = $_POST["agent_name"];
                    $_SESSION["ingreso"] = true;
                    $error2 = false;
                    //Redirige a la pestaña del perfil del jugador
                    header("location:/agentProfile");
                } else {
                    $error2 = true;
                }
                // var_dump($_SESSION["agent_name"]);


            } else {
                $error = true;
            }
        }

        $this->render("register.html", [
            'error' => $error,
            'errorAgentRegistred' => $error2
        ]);
    }

    public function loginAgent()
    {
        if (isset($_SESSION["ingreso"])) {
            header("location:/agentProfile");
            exit();
        }

        $error = false;
        $em = (new EntityManager())->get();
        $agentRepository = $em->getRepository(Agent::class);

        if (count($_POST)) {
            if ($_POST["agent_name"] !== "" && $_POST["password"] !== "") {
                //Se realiza la peticion pasandole el usuario y contraseña
                $login = $agentRepository->loginAgent();
                // var_dump($agent);
                //Si el usuario se loguea correctamente, guardamos la id y el nombre de usuario en variables de sesion
                //Establecemos ingreso a true y redirigimos
                if (isset($login)) {
                    $_SESSION["agent_id"] = $login->getIdAgent();
                    $_SESSION["agent_name"] = $login->getAgentName();
                    $_SESSION["ingreso"] = true;
                    $error = false;
                    // var_dump($_SESSION["agent_id"]);
                    // var_dump($_SESSION["agent_name"]);

                    header("location:/agentProfile");
                } else {
                    $error = true;
                }
            } else {
                $error = true;
            }
        }

        $this->render('login.html', [
            'error' => $error
        ]);
    }

    public function agentProfileStats()
    {
        //Con esta variable de sesion comprobamos si un usuario no ha sido registrado o logueado, no pueda acceder a las rutas del perfil del jugador,
        //Subida de estadisticas o el ranking de jugadores
        //Comprobamos si esa variable es true o false
        if (!$_SESSION["ingreso"]) {
            header("location:/");
            exit();
        }
        $em = (new EntityManager())->get();
        $agentRepository = $em->getRepository(Agent::class);

        //Si no existe agent_id, es porque se ha registrado el usuario
        //Obtenemos la informacion del usuario a traves del nombre de usuario
        //Sacamos las estadisticas del usuario registrado a traves de la id
        if (!isset($_SESSION["agent_id"])) {
            $agent = $agentRepository->findOneBy(array('agentName' => $_SESSION["agent_name"]));
            // $agentName = $result["agent_name"];
            $_SESSION["agent_id"] = $agent->getIdAgent();

            $this->render('agent.html', [
                "agent" => $agent,
                "stats" => $agentRepository->find($_SESSION["agent_id"])->getStats() //Revisar y optimizar este codigo
            ]);

            /*En este caso, el usuario ha hecho login,obtenemos las estadisticas de ese jugador a partir
        del id que tenemos guardado en SESSION*/
        } else {
            $this->render('agent.html', [
                "agent" => $agentRepository->findOneBy(array('agentName' => $_SESSION["agent_name"])),
                "stats" => $agentRepository->find($_SESSION["agent_id"])->getStats()
            ]);
        }
    }

    public function uploadStats()
    {
        $em = (new EntityManager())->get();
        $statsRepository = $em->getRepository(Stats::class);
        $eventsRepository = $em->getRepository(Events::class);
        $agentRepository = $em->getRepository(Agent::class);
        $spanRepository = $em->getRepository(Span::class);
        $uploadsRepository = $em->getRepository(Uploads::class);
        $statsEventsRepository = $em->getRepository(StatsEvents::class);
        $error = false;
        // $error2 = false;

        if (!$_SESSION["ingreso"]) {
            header("location:/");
            exit();
        }


        if (count($_POST)) {
            //Formateamos las estadisticas que vienen del TextArea
            $arrayData = $agentRepository->formatStatsTxt($_POST["stats"]);
            $agent = $agentRepository->findOneBy(array('agentName' => $_SESSION["agent_name"]));
            // Comprobacion para detectar tramposos. Si no se obtiene el mismo numero de elementos de cada uno de los arrays,
            // significa que se esta haciendo trampas o que ha habido un error en la entrada de datos
            if (count($arrayData["datosEncabezado"]) === count($arrayData["datosValores"])) {
                if (!empty($_POST["listEvents"])) {
                    // echo("Corresponde con el evento ".$_POST["listEvents"]);
                    $event = $eventsRepository->find($_POST["listEvents"]);
                    $span = $spanRepository->findOneBy(array('timeSpan' => $arrayData["datosValores"][0]));
                    $upload = $uploadsRepository->insertUpload($agent, $span, $checkEvent = true);
                    $statsEventsRepository->insertStats($arrayData, $event, $upload, $agent);
                    header("location:/agentProfile");
                } else {
                    // echo("No corresponde con ningun evento");
                    $span = $spanRepository->findOneBy(array('timeSpan' => $arrayData["datosValores"][0]));
                    $upload = $uploadsRepository->insertUpload($agent, $span, $checkEvent = false);
                    $statsRepository->insertStats($arrayData, $upload, $agent);
                    header("location:/agentProfile");
                }
            } else {
                $error = true;
            }
        }

        $this->render('uploadStats.html', [
            "error" => $error,
            // "error2" => $error2,
            "events" => $eventsRepository->findAll()
        ]);
    }

    public function getStatsEventsForCompare()
    {
        if (!$_SESSION["ingreso"]) {
            header("location:/");
            exit();
        }
        $error = false;
        $em = (new EntityManager())->get();
        $agentRepository = $em->getRepository(Agent::class);
        $agent = $em->getRepository(Agent::class)->find($_SESSION["agent_id"]);
        // $statsEvents = $statsEventsRepository->findBy(["idAgent"=>$_SESSION["agent_id"]])
        $statsEvents = $agent->getStatsEvents();
        $arrayDatos = $agentRepository->getStatsOfAgentByEvent($statsEvents);


        $this->render('evolutionAgents.html', [
            'error' => $error,
            'arrayDatos' => $arrayDatos
        ]);
    }

    //Funcion para destruir la sesion del usuario logueado/registrado (Cerrar Sesion)
    public function logoutAgent()
    {
        session_destroy();
        header("location:/");
    }
}
