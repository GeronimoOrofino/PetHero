<?php

namespace DAO;


use Models\Reserva as Reserva;

class ReservaDAO  {
    

    private $ReservaList = array ();

    public function add(Reserva $Reserva)
    {
        
        $this->RetrieveData();

        //conseguir el ultimo valor de id actual en la lista y crear una variable para sumarle un valor
        
        $id = count($this->ReservaList);
        if ($this->ReservaList == NULL){
            $id=0;
        }
        $id++;
        $Reserva->set_id($id);
        //y despues asignarselo a reserva en el id


        array_push($this->ReservaList, $Reserva);

        $this->SaveData();
    }

    public function modify(Reserva $Reserva)
    {
        $this->RetrieveData();

            for($i=0; $i < count($this->ReservaList); $i++){
                $RM = $this->ReservaList[$i];
                //echo "aca esta";
                if ($RM->get_id() == $Reserva->get_id()){

                    $this->ReservaList[$i]->set_aceptada($Reserva->get_aceptada());
                    //echo "aca esta".$this->ReservaList[$i]->get_aceptada();
                }
            }

        $this->SaveData();
    }

    public function GetAll()
    {

        $this->RetrieveData();
        
        return $this->ReservaList;

    }



    private function SaveData()
    {
        $arrayToEncode = array();

        

        foreach($this->ReservaList as $Reserva)
         {
            

            $valuesArray["Duenio"] = $Reserva->get_duenio();
            $valuesArray["Mascota"] = $Reserva->get_mascota();
            $valuesArray["Guardian"] = $Reserva->get_guardian();
            $valuesArray["aceptada"] = $Reserva->get_aceptada();
            $valuesArray["arraydedates"] = $Reserva->get_arraydedates();
            $valuesArray["id"] = $Reserva->get_id();

            array_push($arrayToEncode, $valuesArray);
            
        }

         $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
        file_put_contents('Data/Reserva.json', $jsonContent);
    }

    private function RetrieveData()
    {
         $this->ReservaList = array();

         if(file_exists('Data/Reserva.json'))
        {
             $jsonContent = file_get_contents('Data/Reserva.json');

             $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();


             foreach($arrayToDecode as $valuesArray)
             {

                $Reserva = new Reserva();
                $Reserva->set_duenio($valuesArray["Duenio"]);
                $Reserva->set_mascota($valuesArray["Mascota"]);
                $Reserva->set_guardian($valuesArray["Guardian"]);
                $Reserva->set_aceptada($valuesArray["aceptada"]);
                $Reserva->set_arraydedates($valuesArray["arraydedates"]);
                $Reserva->set_id($valuesArray["id"]);

                array_push($this->ReservaList, $Reserva);
            }
        }
    }


    


}

?>