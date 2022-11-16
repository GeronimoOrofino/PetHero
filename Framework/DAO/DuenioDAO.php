<?php

namespace DAO;


use Models\Duenio as Duenio;

class DuenioDAO  {
    

    private $DuenioList = array ();

    public function add(Duenio $Duenio)
    {
        $this->RetrieveData();
            
        array_push($this->DuenioList, $Duenio);

        $this->SaveData();
    }

    public function GetAll()
    {

        $this->RetrieveData();
        
        return $this->DuenioList;

    }



    private function SaveData()
    {
        $arrayToEncode = array();

        foreach($this->DuenioList as $Duenio)
         {
            $valuesArray["nombre"] = $Duenio->get_nombre();
            $valuesArray["direccion"] = $Duenio->get_direccion();
            $valuesArray["DNI"] = $Duenio->get_DNI();
            $valuesArray["telefono"] = $Duenio->get_telefono();

            array_push($arrayToEncode, $valuesArray);
        }

         $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
        file_put_contents('Data/Duenio.json', $jsonContent);
    }

    private function RetrieveData()
    {
         $this->DuenioList = array();

         if(file_exists('Data/Duenio.json'))
        {
             $jsonContent = file_get_contents('Data/Duenio.json');

             $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

             foreach($arrayToDecode as $valuesArray)
             {
                $Duenio = new Duenio();
                
                $Duenio->set_nombre($valuesArray["nombre"]);
                $Duenio->set_direccion($valuesArray["direccion"]);
                $Duenio->set_DNI($valuesArray["DNI"]);
                $Duenio->set_telefono($valuesArray["telefono"]);

                array_push($this->DuenioList, $Duenio);
            }
        }
    }

    


}

?>