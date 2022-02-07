<?php

namespace App\Controllers;

use App\Core\AbstractController;

class MainController extends AbstractController{

    //Carga la plantilla principal de la aplicacion
    public function main(){
        $this->render("index.html",[]);
    }
}