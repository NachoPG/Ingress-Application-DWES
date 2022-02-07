<?php

namespace App\Core;

use App\Core\Interfaces\IRequest;
use App\Core\Interfaces\IRoutes;

class Dispatcher
{
    private $routeList;
    private IRequest $currentRequest;
    public function __construct(IRoutes $routeCollection, IRequest $request)
    {
        $this->routeList = $routeCollection->getRoutes();
        $this->currentRequest = $request;
        $this->dispatch();
    }
    private function dispatch()
    {
        // $this->routeList["/detalle"]
        $route = $this->currentRequest->getRoute(); // "/detalle"
        if (isset($this->routeList[$route])) {
            $controllerClass = "App\\Controllers\\" . $this->routeList[$route]["controller"]; 
            // App\Controllers\DetailController
            $controller =  new $controllerClass; 
            // new App\Controllers\DetailController
            $action = $this->routeList[$route]["action"]; // "detalleTarea"
            $controller->$action(...$this->currentRequest->getParams());
            // $controller->detalleTarea()
        } else {
            echo "ruta no existe";
        }
    }
}
