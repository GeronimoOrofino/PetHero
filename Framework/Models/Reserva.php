<?php
    namespace Models;

    class Reserva
    {
        private $Mascota;
        private $Duenio;
        private $Guardian;
        private $aceptada;
        private $arraydedates;

        private $id;

       /* public function __construct(){
            $this->Mascota = new Mascota();
            $this->Duenio = new Duenio();
            $this->Guardian = new Guardian();

        }*/

        public function get_mascota()
        {
            return $this->Mascota;
        }

        public function set_mascota($Mascota)
        {
            $this->Mascota = $Mascota;
        }

        public function get_duenio()
        {
            return $this->Duenio;
        }

        public function set_duenio($Duenio)
        {
            $this->Duenio = $Duenio;
        }

        public function get_guardian()
        {
            return $this->Guardian;
        }

        public function set_guardian($Guardian)
        {
            $this->Guardian = $Guardian;
        }
        public function get_aceptada()
        {
            return $this->aceptada;
        }

        public function set_aceptada($aceptada)
        {
            $this->aceptada = $aceptada;
        }

        public function get_arraydedates()
        {
            return $this->arraydedates;
        }

        public function set_arraydedates($arraydedates)
        {
            $this->arraydedates = $arraydedates;
        }

        public function get_id()
        {
            return $this->id;
        }

        public function set_id($id)
        {
            $this->id = $id;
        }

        public function mostrar_fechas ($arraydate){
            $x;
            $i=0;
           echo "<br> Fechas :   <br>";
            foreach($arraydate as $x){
                echo "·  $x  ·";
                $i++;
                if($i==7){
                    $i=0;
                    echo "<br>";
                }  
            }
       }
    }
?>