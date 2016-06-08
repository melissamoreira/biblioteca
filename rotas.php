<?php

class Controller{

    private $met;
    public function __construct($met){
        $this->met = $met;
    }
    
    public function gerarRota(){
        require_once "recursos.php";
        $request = $_SERVER['REQUEST_METHOD'];
        $class = "GeneralResource".$request;
        $resource = new $class();
        $method = $this->met;
        $resource->$method();
    }
    
}

$metodo = $_GET['metodo'];
$recurso = new Controller($metodo);
$recurso->gerarRota();