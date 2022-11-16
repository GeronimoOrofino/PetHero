<?php
namespace Controllers;

use DAO\DuenioDAO as DuenioDAO;
use Models\Duenio as Duenio;

//use DAO\GuardianController as GuardianController;
//use Models\Guardian as Guardian;



class DuenioController {

    private $DuenioDAO;
    public $DuenioList = array();


    function __construct (){

        $this->DuenioDAO = new DuenioDAO ();

    }

    public function add ($nombre, $direccion, $DNI, $telefono){

        $Duenio = new Duenio ();
        $Duenio->set_nombre ($nombre);
        $Duenio->set_direccion ($direccion);
        $Duenio->set_DNI ($DNI);
        $Duenio->set_telefono ($telefono);
       
        $this->DuenioDAO->add ($Duenio);

        require_once(VIEWS_PATH."Duenio-section.php");

    }
    public function ShowListView()
    {
        
        $DueniotList = $this->DuenioDAO->GetAll();
        
        var_dump($DuenioList);
        //require_once(VIEWS_PATH."Duenio-list.php");

    }
    public function enter_profile($Dname,$DDNI){

        $DuenioList = $this->DuenioDAO->GetAll();
        $x=0;
        

        foreach($DuenioList as $Duenio){

            if(($Dname == $Duenio->get_nombre())&&($DDNI == $Duenio->get_DNI())){
                $x=1;

                    //session_start();

                    $Duenio->get_nombre();
                    $Duenio->get_DNI();
                    $Duenio->get_direccion();
                    $Duenio->get_telefono();
                    
                    $_SESSION["Duenio"] = $Duenio;

                    require_once(VIEWS_PATH."Duenio-profile.php");

            }
        }
        if($x==0){
            require_once(VIEWS_PATH."Duenio-list.php");
        }
    }

    public function logout (){
        unset($_SESSION['Duenio']);

        session_destroy();
        require_once(VIEWS_PATH."Choose.php");
    }
    public function duenio_segun_DNI($DNI){
        $DuenioList = $this->DuenioDAO->GetAll();
        foreach($DuenioList as $Duenio){
            if ($Duenio->get_DNI() == $DNI){
                return $Duenio;
            }
        }
    }


}

?> 


