<?php
namespace Controllers;

use DAO\ReservaDAO as ReservaDAO;
use Models\Reserva as Reserva;

class ReservaController {


    private $ReservaDAO;

    public function __construct (){

        $this->ReservaDAO = new ReservaDAO();
    }

    public function add($Duenio,$Mascota,$Guardian,$arraydedates){
        $Reserva = new Reserva ();
        $Reserva->set_duenio ($Duenio->get_DNI());
        $Reserva->set_mascota ($Mascota->get_nombre());
        $Reserva->set_guardian ($Guardian->get_cuil());
        $Reserva->set_arraydedates ($arraydedates);

        //var_dump($Duenio);
        // $D = $Reserva->get_duenio();
        //echo $D->get_nombre();
         //var_dump($Reserva->get_duenio());

        $this->ReservaDAO->add ($Reserva);

        //$this->mostrar_json_reservas();

        require_once(VIEWS_PATH."Duenio-profile.php");

        

    }

    public function mostrar_json_reservas(){
        $ReservaList = $this->ReservaDAO->GetAll();

        foreach($ReservaList as $Reserva){
            echo " <br> Este dueño solicito una reserva : ";
            var_dump($Reserva->get_duenio());
            echo " <br> La reserva fue para este guardian : ";
            var_dump($Reserva->get_guardian());
            echo " <br> Quiere que cuiden de esta mascota : ";
            var_dump($Reserva->get_mascota());
            echo " <br> Esto es el aceptada : ";
            var_dump($Reserva->get_aceptada());
            echo " <br> Esto es el arraydedates : ";
            var_dump($Reserva->get_arraydedates());
        } 

    }

    public function lista_segun_guardian($GuardianCuil){
        $LT = $this->ReservaDAO->GetAll();
        $ListaRG = array();
        foreach($LT as $Reserva){
            
            if ($Reserva->get_guardian() == $GuardianCuil ){
                array_push($ListaRG, $Reserva);
            }
        }
        return $ListaRG;
    }

    public function lista_aceptadas($lista){
        $ListaA = array();
        foreach($lista as $Reserva){
            if ($Reserva->get_aceptada() == true){
                array_push($ListaA,$Reserva);
            }
        }
        return $ListaA;
    }

    public function lista_segun_dates($arraydedates){
        $LT = $this->ReservaDAO->GetAll();
        $LDD = array();
        foreach($LT as $Reserva){
            foreach($Reserva->get_arraydedates() as $Fdereserva){
                foreach($arraydedates as $Fingresar){
                    if ($Fingresar == $Fdereserva){
                        array_push($LDD,$Reserva);
                    }
                }
            }
        }
        return $LDD;

    }

    public function comparar_razas($LDRA,$Mascota){
        
        $LDRQ = array();
        $MC = new MascotaController ();
        foreach($LDRA as $Reserva){
            $M = $MC->mascota_segun_nombre_y_DNI($Reserva->get_Duenio(),$Reserva->get_Mascota());
            if ($M->get_raza() != $Mascota->get_raza()){
                array_push($LDRQ,$Reserva);
            }
        }
        return $LDRQ;

    }

    public function lista_con_dates_a_eliminar($AD,$Mascota){
        $LR = $this->lista_segun_dates($AD);
        $LR = $this->lista_aceptadas($LR);
        $LR = $this->comparar_razas($LR,$Mascota);

    }

    public function mostrar_reservas_de_guardian (){
        if(isset ($_SESSION["Guardian"])){
            $Guardian = $_SESSION["Guardian"];
        }

        $LT = $this->lista_segun_guardian($Guardian->get_cuil());
        $LT = $this->lista_no_aceptadas($LT);


        $M = new MascotaController();
        $D = new DuenioController();

        foreach ($LT as $Reserva){
            $Mascota = $M->mascota_segun_nombre_y_DNI ($Reserva->get_duenio(), $Reserva->get_mascota());
            $Duenio = $D->duenio_segun_DNI($Reserva->get_duenio());
            echo "mascota: ".$Mascota->get_nombre();
            
            require(VIEWS_PATH."Mostrar-duenio.php");
            require(VIEWS_PATH."Mostrar-mascota.php");
            echo "<br> Id de la reserva : ". $Reserva->get_id();
            

        }

        //require_once(VIEWS_PATH."Reserva-list.php");
        require_once(VIEWS_PATH."Mod-reserva.php");

        //require_once(VIEWS_PATH."Reserva-list.php");


        
    }
    public function lista_no_aceptadas($lista){
        $ListaNA = array();
        foreach($lista as $Reserva){
            if ($Reserva->get_aceptada() == NULL){
                array_push($ListaNA,$Reserva);
            }
        }
        return $ListaNA;
    }

    public function modificar_reserva($accion, $id){
        $ReservaList = $this->ReservaDAO->GetAll();
        //echo "esto es id en mod reser : ".$id;

        foreach($ReservaList as $Reserva){
            //echo "esto es id en mod reser : ".$id;
            if ($id == $Reserva->get_id()){
                
                if($accion == "Aceptar"){
                    $Reserva->set_aceptada("true");
                    $this->ReservaDAO->Modify($Reserva);                
                }
                if ($accion == "Rechazar"){
                    $Reserva->set_aceptada("false");
                    $this->ReservaDAO->Modify($Reserva);
                }
                
            }
        }

        $this->ShowListView($ReservaList);
        //require_once(VIEWS_PATH."Reserva-list.php");


    }
    public function ShowListView($ReservaList)
    {
        
        $ReservaList = $this->ReservaDAO->GetAll();
        require_once(VIEWS_PATH."Reserva-list.php");

    }


}



?>