<?php
    
    require_once('nav.php');
    
?>

<main>

    <h2>Lista de Mascotas</h2>
    <thead>
         
    </thead>
    <tbody>
                <?php
                 foreach($MascotaList as $Mascota)
                    {
                ?>
                    <tr>
                        <br>
                         <td>Nombre: <?php echo $Mascota->get_nombre() ?></td>
                         <br>
                         <td>Raza: <?php echo $Mascota->get_raza() ?></td>
                         <br>
                         <td>Tamaño: <?php echo $Mascota->get_tamaño() ?></td>
                         <br>
                         <td>Observaciones: <?php echo $Mascota->get_observaciones() ?></td>
                         <br>
                         <td>Foto:  <img src="<?php echo $Mascota->get_urlimagen() ?>" alt="No se ve man"></td>
                         <br>
                         <td>Vacunas:  <img src="<?php echo $Mascota->get_urlvacunacion() ?>" alt="No se ve man"></td>
                         <br>
                         <td>Video: <video src="<?php echo $Mascota->get_urlvideo() ?>" ></video></td>
                         <br>
                    </tr>
               <?php
                    }
                ?>
        </tr>
    </tbody>




</main>