<?php
namespace Models;

class Mascota {
    private $nombre; 
    private $raza;
    private $tamaño;
    private $observaciones;
    private $urlimagen;/* cuando reciban el href en el formulario, tendra que ser pasado a la calse mascota*/ 
    private $urlvacunacion;
    private $urlvideo;
    private $DNI;


    function get_nombre (){
        return $this->nombre;
    }

    function set_nombre ($x){
        $this->nombre = $x;
    }

    function get_raza (){
        return $this->raza;
    }

    function set_raza ($x){
        $this->raza = $x;
    }

    function get_tamaño (){
        return $this->tamaño;
    }

    function set_tamaño ($x){
        $this->tamaño = $x;
    }
    function get_observaciones (){
        return $this->observaciones;
    }

    function set_observaciones ($x){
        $this->observaciones = $x;
    }

    function get_urlimagen (){
        return $this->urlimagen;
    }

    function set_urlimagen ($x){
        $this->urlimagen = $x;
    }
    function get_urlvideo (){
        return $this->urlvideo;
    }

    function set_urlvideo ($x){
        $this->urlvideo = $x;
    }
    function get_urlvacunacion (){
        return $this->urlvacunacion;
    }

    function set_urlvacunacion ($x){
        $this->urlvacunacion = $x;
    }
    function get_DNI (){
        return $this->DNI;
    }

    function set_DNI ($x){
        $this->DNI = $x;
    }


}






?>
