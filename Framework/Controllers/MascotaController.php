<?php
namespace Controllers;

use DAO\MascotaDAO as MascotaDAO;
use Models\Mascota as Mascota;



class MascotaController {

    private $MascotaDAO;
    public $MascotaList = array();


    function __construct (){

        $this->MascotaDAO = new MascotaDAO ();

    }

    public function add ($nombre, $raza, $tamaño, $observaciones,$urlimagen,$urlvacunacion,$urlvideo){

        //session_start();
        if(isset ($_SESSION["Duenio"])){
        $Duenio = $_SESSION["Duenio"];
        }


        $Mascota = new Mascota ();
        $Mascota->set_nombre ($nombre);
        $Mascota->set_raza ($raza);
        $Mascota->set_tamaño ($tamaño);
        $Mascota->set_observaciones ($observaciones);
        /*necesito pasarles las urls completas*/
        //$urlcompleta = realpath($urlimagen);
        //echo $urlcompleta;
        $Mascota->set_urlimagen ($urlimagen);
        $Mascota->set_urlvacunacion ($urlvacunacion);
        $Mascota->set_urlvideo ($urlvideo);
        $Mascota->set_DNI($Duenio->get_DNI());

        $this->MascotaDAO->add ($Mascota);

        require_once(VIEWS_PATH."Duenio-profile.php");

    }
    public function ShowListView()
    {
        //mostrarmascotaspordni(dnideldueño)
        $MascotatList = $this->MascotaDAO->GetAll();
        
        var_dump($MascotaList);
        //require_once(VIEWS_PATH."Mascota-list.php");

    }
    public function lista_mascotas_DNI ($DDNI){
        $MascotaListTotal = $this->MascotaDAO->GetAll();
        $MascotaList = array ();

        foreach($MascotaListTotal as $Mascota){
            if($Mascota->get_DNI() == $DDNI){
                array_push($MascotaList, $Mascota); 
                
            }
        }
        return $MascotaList;
    }
    public function mostrar_mascotas_DNI ($DDNI){

        $MascotaList = array ();
        $MascotaList = $this->lista_mascotas_DNI($DDNI);
        require_once(VIEWS_PATH."Mascota-list.php");


    }
    public function mascota_para_ingresar ($N, $DE, $DS){
        
        if(isset ($_SESSION["Duenio"])){
            $Duenio = $_SESSION["Duenio"];
        }

        
        $Mascota = $this->mascota_segun_nombre_y_DNI($Duenio->get_DNI(),$N);

        

        if ($Mascota == NULL){
            echo "la mascota no se encontro intente nuevamente";
            require_once(VIEWS_PATH."Duenio-profile.php");
        }

        $_SESSION["Mascota"] = $Mascota;
        $G = new GuardianController ();
        $G->mostrar_guardian_tamaño ($DE, $DS);
            
    }

    public function mascota_segun_nombre_y_DNI ($DuenioDNI, $nombre){
        $MascotaList = $this->lista_mascotas_DNI($DuenioDNI);

        foreach($MascotaList as $Mascota){
            //echo $Mascota->get_nombre();
            if($Mascota->get_nombre()== $nombre){
                return $Mascota;
            }
        }
    }

    public function contratar_guardian (){

        if(isset ($_SESSION["Duenio"])){
            $Duenio = $_SESSION["Duenio"];
        }
        //echo $Duenio->get_DNI();

        $this->mostrar_mascotas_DNI($Duenio->get_DNI());
        
        require_once(VIEWS_PATH."Seleccion-mascota.php");
        
        
    }



}

?> 
