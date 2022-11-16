<?php
    
    require_once('nav.php');
    
?>

<main>

    <h2>Lista de Reservas</h2>
    <thead>
         
    </thead>
    <tbody>
                <?php
                 foreach($ReservaList as $Reserva)
                    {
                ?>
                    <tr>
                        <br>
                         <td>Dueño de la mascota: 
                            <?php echo $Reserva->get_duenio() ?></td>
                         <br>
                         <td>Guardian: 
                            <?php echo $Reserva->get_guardian() ?></td>
                         <br>
                         <td>Mascota: 
                            <?php echo $Reserva->get_mascota() ?></td>
                         <br>
                         <td>fechas en las que quiere dejar a su mascota: 
                            <?php echo $Reserva->mostrar_fechas($Reserva->get_arraydedates())   ?></td>
                         <br>
                         <td>Estado: 
                            <?php echo $Reserva->get_aceptada() ?></td>
                         <br>

                    </tr>
               <?php
                    }
                ?>
        </tr>
    </tbody>




</main>