<?php
namespace Controllers;

use DAO\GuardianDAO as GuardianDAO;
use Models\Guardian as Guardian;



class GuardianController {

    private $GuardianDAO;
    public $GuardianList = array();


    function __construct (){

        $this->GuardianDAO = new GuardianDAO ();

    }

    public function add ($nombre, $direccion, $cuil, $disponibilidadE, $disponibilidadS, $TCH,$TME,$TGR,$PCH,$PME,$PGR ){

        $Guardian = new Guardian ();
        $Guardian->set_nombre ($nombre);
        $Guardian->set_direccion ($direccion);
        $Guardian->set_cuil ($cuil);
        
            $disponibilidad = $this->arraydedates($disponibilidadE, $disponibilidadS);
        $Guardian->set_disponibilidad ($disponibilidad);
            $tamaños = $this->tamaños_array($TCH,$TME,$TGR);
        $Guardian->set_tamaños ($tamaños);
            $precio = $this->precios_array($PCH,$PME,$PGR);
        $Guardian->set_precio ($precio);
        
      

        $this->GuardianDAO->add ($Guardian);

        require_once(VIEWS_PATH."Guardian-section.php");

    }
    public function ShowListView()
    {
        
        $GuardianList = $this->GuardianDAO->GetAll();
        
        
        require_once(VIEWS_PATH."Guardian-list.php");

    }

    public function enter_profile($Gname,$Gcuil){

        $GuardianList = $this->GuardianDAO->GetAll();
        $x=0;
        

        foreach($GuardianList as $Guardian){

            if(($Gname == $Guardian->get_nombre())&&($Gcuil == $Guardian->get_cuil())){
                $x=1;

                    //session_start();

                    $Guardian->get_nombre();
                    $Guardian->get_cuil();
                    $Guardian->get_direccion();
                    $Guardian->get_cuil();
                    $Guardian->get_disponibilidad();
                    $Guardian->get_tamaños();
                    $Guardian->get_precio();
                    $Guardian->get_puntos();
                    
                    $_SESSION["Guardian"] = $Guardian;

                    require_once(VIEWS_PATH."Guardian-profile.php");

            }
        }
        if($x==0){
            require_once(VIEWS_PATH."Guardian-list.php");
        }
    }

    public function arraydedates ($disponibilidadE, $disponibilidadS){
        $arraydate = array();
            //echo "<br> DE:     $disponibilidadE";
            //echo "<br> DS:     $disponibilidadS";
        array_push ($arraydate,$disponibilidadE);

        $DE = explode("-",$disponibilidadE);
        $DS = explode("-",$disponibilidadS);

            while ($DE[2] < $DS[2]){
                //echo "<br> DS 02:     $DS[2]";
                $x = $DE;
                $x[2] = $x[2]+1;

                $l =strlen($x[2]);
                if ($l==1){
                    $x[2]= "0" . $x[2];
                }
                $j = implode("-",$x);
                array_push($arraydate, $j);
                $DE = $x;

            }

        return $arraydate;
    }

    public function tamaños_array ($TCH,$TME,$TGR){
        $tamaños = array();

        if ($TCH !="NO"){
            array_push($tamaños,$TCH);
        }
        if ($TME !="NO"){
            array_push($tamaños,$TME);
        }
        if ($TGR !="NO"){
            array_push($tamaños,$TGR);
        }
        //$x = implode("-",$tamaños);
        
        return $tamaños;

    }
    public function precios_array ($PCH,$PME,$PGR){
        $precio = array();

            array_push($precio,$PCH);
            array_push($precio,$PME);  
            array_push($precio,$PGR);

        //$x = implode("-",$precio);
        //echo "X====   $x";
        
        return $precio;

    }
    public function horarios (){

        if(isset ($_SESSION["Guardian"])){
            //$Guardian = new Guardian();
            $Guardian = $_SESSION["Guardian"];
        }

        echo "<br> Nombre: " . $Guardian->get_nombre();
        $Guardian->mostrar_fechas($Guardian->get_disponibilidad());
        require_once(VIEWS_PATH."Guardian-modfechas.php");
        
    }
    public function addfechas ($DE,$DS){
        if(isset ($_SESSION["Guardian"])){
            //$Guardian = new Guardian();
            $Guardian = $_SESSION["Guardian"];
        }

        $nuevadiponibilidad = array();
        $nuevadiponibilidad = $Guardian->get_disponibilidad();
        $D2 = $this->arraydedates($DE, $DS);
        foreach($D2 as $nuevadate){
            if(in_array($nuevadate, $nuevadiponibilidad)){
                
            }
            else{
                array_push($nuevadiponibilidad,$nuevadate);
            }
            
        }
        sort($nuevadiponibilidad);

        $Guardian->set_disponibilidad($nuevadiponibilidad);
        $this->GuardianDAO->modify ($Guardian);
        $this->ShowListView();

        
        //require_once(VIEWS_PATH."Guardian-list.php");
        
    }

    public function mostrar_guardian_tamaño ($DE, $DS){
        $_SESSION["DE"] = $DE;
        $_SESSION["DS"] = $DS;

        $GuardianListTotal = $this->GuardianDAO->GetAll();
        $GuardianList = array ();
        
        if(isset ($_SESSION["Mascota"])){
            $Mascota = $_SESSION["Mascota"];
        }

        foreach($GuardianListTotal as $Guardian){
            foreach ($Guardian->get_tamaños() as $Tamaño){
                if ($Tamaño == $Mascota->get_tamaño()){
                    array_push($GuardianList,$Guardian);
                }
            }
        }

        $AD = $this->arraydedates($DE,$DS);

        $RC = new ReservaController ();
        $LR = $RC->lista_con_dates_a_eliminar($AD,$Mascota);


        $GuardianList= $this->modificar_dates_de_lista_de_guardianes ($GuardianList, $LR, $AD);
        $GuardianList = $this->comprobar_fechas_de_lista($GuardianList,$AD);

        //$x = $this->comprobar_fechas($DE,$DS,);
        //if ($x  ==  count($arraydedates)){

         
        if($GuardianList != NULL){
            require_once(VIEWS_PATH."Guardian-list.php");
            require_once(VIEWS_PATH."Seleccion-guardian.php");
         }
        else{
            echo "Lo sentimos no hay guardianes disponibles para tu mascota en estas fechas";
            require_once(VIEWS_PATH."Duenio-profile.php");
         }


    }

    public function get_by_cuil($Cuil){
        $GuardianListTotal = $this->GuardianDAO->GetAll();
        $x=0;
        foreach($GuardianListTotal as $Guardian){
            if ($Guardian->get_cuil() == $Cuil){
                $x=1;
                return $Guardian;
            }
        }
        if($x==0){
            echo "sorry no se encontro el guardian con este cuil";
            require_once(VIEWS_PATH."Duenio-profile.php");
        }
    }
    public function comprobar_fechas_de_lista($ListaG,$AD){
        ///retorna una lista con los guardianes que si tienen las fechas coincidentes

        $ListaGT = array();

        foreach($ListaG as $Guardian){
            $x = $this->comprobar_fechas($AD,$Guardian);
            if ($x == count($AD)){
                array_push($ListaGT,$Guardian);
            }           
        }
        return $ListaGT;

    }   


    public function comprobar_fechas($arraydedates,$Guardian){
        //$arraydedates = $this->arraydedates($DE,$DS);
        $x=0;
        
        foreach($arraydedates as $fecha){
           // echo "esto es fecha" . $fecha;
            if(in_array($fecha,$Guardian->get_disponibilidad())){
                $x++;
            }
        }
        return $x;
        //echo "esto es x" . $x;
        /*if ($x == count($arraydedates)){

            $x = count($arraydedates);
            return $x;
        }
        else{
            return $x;
            //echo "las fechas no coinciden, lo lamentamos";
            //require_once(VIEWS_PATH."Duenio-profile.php");
        }*/
    }

    public function enviar_solicitud ($Cuil){
        //fechas tienen que ser cargadas desde la funcion pasada, 
        $DE = $_SESSION["DE"];
        $DS = $_SESSION["DS"];

        
        $Guardian = $this->get_by_cuil($Cuil);
        $arraydedates = $this->arraydedates($DE,$DS);

        unset($_SESSION['DE']);
        unset($_SESSION['DS']);

        if(isset ($_SESSION["Duenio"])){
            $Duenio = $_SESSION["Duenio"];
            }
        if(isset ($_SESSION["Mascota"])){
            $Mascota = $_SESSION["Mascota"];
            }


        $Reseva = new ReservaController ();
        $Reseva->add($Duenio,$Mascota,$Guardian,$arraydedates);

    }
    public function logout (){
        unset($_SESSION['Guardian']);

        session_destroy();
        require_once(VIEWS_PATH."Choose.php");
    }
    public function quitar_dates($Guardian, $AD){
        $GD = $Guardian->get_disponibilidad();
        for($i=0; $i < count($GD); $i++){
            $fechaG = $GD[$i];
            foreach($AD as $fechaQ){
                if ($fechaG == $fechaQ){
                    unset($GD[$i]);
                }
            }
        }
        $Guardian->set_disponibilidad($GD);
        return $Guardian;
    }
    public function modificar_dates_de_lista_de_guardianes ($ListaGuardianes, $LDRQ, $AD){
        $GLT = array();
        foreach($ListaGuardianes as $Guardian){
            ///recorrer el rraydedates y comprobar si el guardian puede cuidar todos los dias del arraydd
            ///comprobar fechas 
            if ($LDRQ != NULL){
                foreach($LDRQ as $Reseva){
                if ($Guardian->get_cuil() == $Reseva->get_guardian()){
                    $Guardian = $this->quitar_dates($Guardian,$AD);
                }
                }
            }
            
            
            array_push($GLT, $Guardian);
        }
        return $GLT;

    }


}

?> 
