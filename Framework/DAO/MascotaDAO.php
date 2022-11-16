<?php

namespace DAO;


use Models\Mascota as Mascota;

class MascotaDAO  {
    

    private $MascotaList = array ();

    public function add(Mascota $Mascota)
    {
        $this->RetrieveData();
            
        array_push($this->MascotaList, $Mascota);

        $this->SaveData();
    }

    public function GetAll()
    {

        $this->RetrieveData();
        
        return $this->MascotaList;

    }



    private function SaveData()
    {
        $arrayToEncode = array();

        foreach($this->MascotaList as $Mascota)
         {
            $valuesArray["nombre"] = $Mascota->get_nombre();
            $valuesArray["raza"] = $Mascota->get_raza();
            $valuesArray["tamaño"] = $Mascota->get_tamaño();
            $valuesArray["observaciones"] = $Mascota->get_observaciones();
            $valuesArray["urlimagen"] = $Mascota->get_urlimagen();
            $valuesArray["urlvacunacion"] = $Mascota->get_urlvacunacion();
            $valuesArray["urlvideo"] = $Mascota->get_urlvideo();
            $valuesArray["DNI"] = $Mascota->get_DNI();

            array_push($arrayToEncode, $valuesArray);
        }

         $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
        file_put_contents('Data/Mascota.json', $jsonContent);
    }

    private function RetrieveData()
    {
         $this->MascotaList = array();

         if(file_exists('Data/Mascota.json'))
        {
             $jsonContent = file_get_contents('Data/Mascota.json');

             $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

             foreach($arrayToDecode as $valuesArray)
             {
                $Mascota = new Mascota();
                
                $Mascota->set_nombre($valuesArray["nombre"]);
                $Mascota->set_raza($valuesArray["raza"]);
                $Mascota->set_tamaño($valuesArray["tamaño"]);
                $Mascota->set_observaciones($valuesArray["observaciones"]);
                $Mascota->set_urlimagen($valuesArray["urlimagen"]);
                $Mascota->set_urlvacunacion($valuesArray["urlvacunacion"]);
                $Mascota->set_urlvideo($valuesArray["urlvideo"]);
                $Mascota->set_DNI($valuesArray["DNI"]);

                array_push($this->MascotaList, $Mascota);
            }
        }
    }

    


}

?>