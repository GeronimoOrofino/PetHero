<?php

namespace DAO;


use Models\Guardian as Guardian;

class GuardianDAO  {
    

    private $GuardianList = array ();

    public function add(Guardian $Guardian)
    {
        $this->RetrieveData();

        array_push($this->GuardianList, $Guardian);

        $this->SaveData();
    }

    public function modify(Guardian $Guardian)
    {
        $this->RetrieveData();

            for($i=0; $i < count($this->GuardianList); $i++){
                $GN = $this->GuardianList[$i];
                if (($GN->get_nombre() == $Guardian->get_nombre())&&($GN->get_cuil() == $Guardian->get_cuil())){
                    unset($this->GuardianList[$i]);
                }
            }
        array_push($this->GuardianList, $Guardian);

        $this->SaveData();
    }

    public function GetAll()
    {

        $this->RetrieveData();
        
        return $this->GuardianList;

    }



    private function SaveData()
    {
        $arrayToEncode = array();

        foreach($this->GuardianList as $Guardian)
         {
            $valuesArray["nombre"] = $Guardian->get_nombre();
            $valuesArray["direccion"] = $Guardian->get_direccion();
            $valuesArray["cuil"] = $Guardian->get_cuil();
            $valuesArray["disponibilidad"] = $Guardian->get_disponibilidad();
            $valuesArray["precio"] = $Guardian->get_precio();
            $valuesArray["tamaños"] = $Guardian->get_tamaños();
            $valuesArray["puntos"] = $Guardian->get_puntos();

            array_push($arrayToEncode, $valuesArray);
        }

         $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
        file_put_contents('Data/Guardian.json', $jsonContent);
    }

    private function RetrieveData()
    {
         $this->GuardianList = array();

         if(file_exists('Data/Guardian.json'))
        {
             $jsonContent = file_get_contents('Data/Guardian.json');

             $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

             foreach($arrayToDecode as $valuesArray)
             {
                $Guardian = new Guardian();
                
                $Guardian->set_nombre($valuesArray["nombre"]);
                $Guardian->set_direccion($valuesArray["direccion"]);
                $Guardian->set_cuil($valuesArray["cuil"]);
                $Guardian->set_disponibilidad($valuesArray["disponibilidad"]);
                $Guardian->set_precio($valuesArray["precio"]);
                $Guardian->set_tamaños($valuesArray["tamaños"]);
                $Guardian->set_puntos($valuesArray["puntos"]);

                

                array_push($this->GuardianList, $Guardian);
            }
        }
    }

    


}

?>