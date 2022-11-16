<?php
namespace Models;

class Guardian {

    private $nombre;
    private $direccion;
    private $cuil;
    private $disponibilidad;
    private $puntos = 0;
    private $precio; /* En el caso del precio habra una variable de control segun si es gr,med,chic */
    private $tamaños;  /*tamaños es el tamaño de los perros que quiere cuidar, como pueden ser varios 
    tendran que ser pasados con un string concatenado y luego sera dividido a traves de un explode*/

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

    function get_cuil (){
        return $this->cuil;
    }

    function set_cuil ($x){
        $this->cuil = $x;
    }

    function get_disponibilidad (){
        return $this->disponibilidad;
    }

    function set_disponibilidad ($x){
        $this->disponibilidad = $x;
    }

    function get_precio (){
        return $this->precio;
    }

    function set_precio ($x){
        $this->precio = $x;
    }

    function get_tamaños (){
        return $this->tamaños;
    }

    function set_tamaños ($x){
        $this->tamaños = $x;
    }

    function get_puntos (){
        return $this->puntos;
    }

    function set_puntos ($x){
        $this->puntos = $x;
    }

    public function mostrar_fechas ($arraydate){
        $x;
        $i=0;
       echo "<br> Fechas disponibles:   <br>";
        foreach($arraydate as $x){
            echo "·  $x  ·";
            $i++;
            if($i==7){
                $i=0;
                echo "<br>";
            }  
        }
   }
   public function mostrar_tamaños ($arraytamaño){
        $x;
        echo "<br> Tamaños que cuida:   ";
        foreach($arraytamaño as $x){
        
            echo "<br>  $x";
        }
    
    }
    public function mostrar_precios ($arrayprecio, $arraytamaño){
        $x;
       echo "<br> Precios:   ";
        foreach($arraytamaño as $x){
            
            if($x == "Chico"){
                echo "<br>  Precio animal chico $arrayprecio[0]";
            }
            if($x == "Mediano"){
                echo "<br>  Precio animal mediano $arrayprecio[1]";
            }
            if($x == "Grande"){
                echo "<br>  Precio animal grande $arrayprecio[2]";
            }
           
        }
   }

}

?>

