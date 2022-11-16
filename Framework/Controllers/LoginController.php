<?php
namespace Controllers;

//use DAO\LoginDAO as LoginDAO;

class LoginController {


    private $LoginDAO;

    public function __construct (){
        //$this->loginDAO = new LoginDAO;
    }

    public function selection_type(){
        
        // Me causo risa que el traductor lo cambiara a hola soya de seleccion asi que lo dejo aca para sacarle captura echo "hola soy selection type";
        $type = $_POST ["Type"];

        if($type == "Guardian"){
            require_once(VIEWS_PATH."Guardian-section.php");
        }
        else{
            require_once(VIEWS_PATH."Duenio-section.php");
        }
    
    }

    public function registerGuardian_menu (){

        require_once(VIEWS_PATH."Guardian-add.php");
        
    }
    public function registerDuenio_menu (){

        require_once(VIEWS_PATH."Duenio-add.php");
        
    }
    public function registerMascota_menu (){

        require_once(VIEWS_PATH."Mascota-add.php");
        
    }


}



?>