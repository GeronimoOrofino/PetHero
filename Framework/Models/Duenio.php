<?php
namespace Models;


class Duenio{

    private $nombre;
    private $DNI;
    private $direccion;
    private $telefono;
    

    function get_nombre (){
        return $this->nombre;
    }

    function set_nombre ($x){
        $this->nombre = $x;
    }

    function get_direccion (){
        return $this->direccion;
    }

    function set_direccion ($x){
        $this->direccion = $x;
    }    

    function get_DNI (){
        return $this->DNI;
    }

    function set_DNI ($x){
        $this->DNI = $x;
    }

    function get_telefono (){
        return $this->telefono;
    }

    function set_telefono ($x){
        $this->telefono = $x;
    }    



}

?>